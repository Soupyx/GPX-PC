<?php

declare(strict_types=1);

require 'config.php';  // contient RECAPTCHA_SITE_KEY et RECAPTCHA_SECRET_KEY

// 1. Récupérer la réponse reCAPTCHA
$response = $_POST['g-recaptcha-response'] ?? '';

// 2. Vérifier auprès de Google
$verifyUrl = 'https://www.google.com/recaptcha/api/siteverify'
           . '?secret='   . urlencode(RECAPTCHA_SECRET_KEY)
           . '&response=' . urlencode($response)
           . '&remoteip=' . $_SERVER['REMOTE_ADDR'];

$result     = file_get_contents($verifyUrl);
$data       = json_decode($result);

// 3. Contrôler le succès
if (empty($data->success) || $data->success !== true) {
    die('Erreur reCAPTCHA : cochez “Je ne suis pas un robot”.');
}

// 4. Si captcha validé, traiter le formulaire
$formType = $_POST['form_type'] ?? 'contact';

// -----------------------------------------------------------------------------
// CONFIGURATION
// -----------------------------------------------------------------------------
const MAX_FIELD_LENGTHS = [
    'name'                =>  50,
    'email'               => 100,
    'phone'               =>  20,
    'budget'              =>  10,
    'details'             => 1000,
    'service_value'       => 100,
    'osType'              =>  50,
    'windows_license_type' =>  50,
    'message'             => 2000,
];
const RATE_LIMIT_SECONDS   = 10;
const MAX_PAYLOAD_SIZE     = 10_000;  // octets
const MAX_FAILED_ATTEMPTS  = 10;
const FAILED_BLOCK_WINDOW  = 3600;    // 1 heure

// -----------------------------------------------------------------------------
// AUTOLOAD & ENV
// -----------------------------------------------------------------------------
require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// -----------------------------------------------------------------------------
// HEADERS SÉCURITÉ
// -----------------------------------------------------------------------------
header('Content-Type: application/json; charset=utf-8');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
header("Content-Security-Policy: default-src 'none'; script-src 'self'; style-src 'self'; img-src 'self' data:; font-src 'self'; connect-src 'self';");
header('Referrer-Policy: no-referrer');

// -----------------------------------------------------------------------------
// SESSION & ERREURS
// -----------------------------------------------------------------------------
session_set_cookie_params([
    'lifetime' => 0,
    'secure'   => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);
session_start();

ini_set('display_errors', '0');
ini_set('log_errors',     '1');
ini_set('error_log',      __DIR__ . '/logs/errors.log');

// -----------------------------------------------------------------------------
// UTILITAIRES JSON
// -----------------------------------------------------------------------------
function jsonError(string $msg, int $code = 400): void
{
    http_response_code($code);
    echo json_encode(['status' => 'error', 'message' => $msg]);
    exit;
}

function jsonSuccess(string $msg): void
{
    echo json_encode(['status' => 'success', 'message' => $msg]);
    exit;
}

// -----------------------------------------------------------------------------
// BLOCAGE PAYLOAD TROP LOURD
// -----------------------------------------------------------------------------
if (!empty($_SERVER['CONTENT_LENGTH']) && (int)$_SERVER['CONTENT_LENGTH'] > MAX_PAYLOAD_SIZE) {
    jsonError('Requête trop volumineuse.', 413);
}

// -----------------------------------------------------------------------------
// PROTECTION BRUTE FORCE
// -----------------------------------------------------------------------------
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
if (!isset($_SESSION['failed'][$ip])) {
    $_SESSION['failed'][$ip] = ['count' => 0, 'first' => time()];
}
$fail = &$_SESSION['failed'][$ip];
if (time() - $fail['first'] < FAILED_BLOCK_WINDOW) {
    if ($fail['count'] >= MAX_FAILED_ATTEMPTS) {
        jsonError('Trop de tentatives. Réessayez plus tard.', 429);
    }
} else {
    $fail = ['count' => 0, 'first' => time()];
}

// -----------------------------------------------------------------------------
// UNIQUEMENT POST
// -----------------------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonError('Méthode non autorisée.', 405);
}

// -----------------------------------------------------------------------------
// CSRF TOKEN
// -----------------------------------------------------------------------------
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$token = $_POST['csrf_token'] ?? '';
if (!hash_equals($_SESSION['csrf_token'], $token)) {
    $fail['count']++;
    jsonError('Requête invalide (CSRF).', 400);
}

// -----------------------------------------------------------------------------
// RATE LIMITING
// -----------------------------------------------------------------------------
if (
    isset($_SESSION['last_submit'])
    && (time() - $_SESSION['last_submit'] < RATE_LIMIT_SECONDS)
) {
    jsonError('Trop de requêtes. Ralentissez.', 429);
}
$_SESSION['last_submit'] = time();

// -----------------------------------------------------------------------------
// HONEYPOT ANTI-SPAM
// -----------------------------------------------------------------------------
if (!empty($_POST['website'])) {
    jsonError('Spam détecté.', 400);
}

// -----------------------------------------------------------------------------
// RÉCUPÉRATION DES CHAMPS
// -----------------------------------------------------------------------------
$formType = $_POST['formType'] ?? 'contact';
$name     = trim($_POST['name']    ?? '');
$email    = trim($_POST['email']   ?? '');

// Validation commune Nom / Email
if (
    $name === '' || mb_strlen($name) > MAX_FIELD_LENGTHS['name']
    || !preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ' -]+$/u", $name)
) {
    jsonError('Nom invalide.', 400);
}
if (
    $email === '' || mb_strlen($email) > MAX_FIELD_LENGTHS['email']
    || !filter_var($email, FILTER_VALIDATE_EMAIL)
) {
    jsonError('Email invalide.', 400);
}

// -----------------------------------------------------------------------------
// BRANCHE “CONTACT”
// -----------------------------------------------------------------------------
if ($formType === 'contact') {
    $message = trim($_POST['message'] ?? '');
    if ($message === '' || mb_strlen($message) > MAX_FIELD_LENGTHS['message']) {
        jsonError('Message requis ou trop long.', 400);
    }

    $subject = 'Nouveau message de contact';
    $htmlContent = "
        <h2>Contact</h2>
        <p><strong>Nom :</strong> " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "</p>
        <p><strong>Email :</strong> " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</p>
        <p><strong>Message :</strong><br>"
        . nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')) . "</p>
    ";

    // -----------------------------------------------------------------------------
    // BRANCHE “DEVIS”
    // -----------------------------------------------------------------------------
} elseif ($formType === 'devis') {

    $phone   = trim($_POST['phone']   ?? '');
    $budget  = trim($_POST['budget']  ?? '');
    $details = trim($_POST['details'] ?? '');
    $services = $_POST['services']     ?? [];

    // Téléphone (optionnel)
    if ($phone !== '' && (mb_strlen($phone) > MAX_FIELD_LENGTHS['phone']
        || !preg_match('/^[0-9+\s-]+$/', $phone))) {
        jsonError('Téléphone invalide.', 400);
    }

    // Budget (obligatoire)
    if (
        $budget === '' || mb_strlen($budget) > MAX_FIELD_LENGTHS['budget']
        || !preg_match('/^\d+(\.\d{1,2})?$/', $budget)
    ) {
        jsonError('Budget invalide.', 400);
    }

    // Détails (obligatoire)
    if ($details === '' || mb_strlen($details) > MAX_FIELD_LENGTHS['details']) {
        jsonError('Détails du projet requis.', 400);
    }

    // Services
    if (!is_array($services)) {
        $services = [$services];
    }
    if (count($services) > 20) {
        jsonError('Trop de services sélectionnés.', 400);
    }
    $servicesClean = [];
    foreach ($services as $svc) {
        $svc = trim($svc);
        if ($svc === '' || mb_strlen($svc) > MAX_FIELD_LENGTHS['service_value']) {
            jsonError('Valeur de service invalide.', 400);
        }
        $servicesClean[] = htmlspecialchars($svc, ENT_QUOTES, 'UTF-8');
    }
    $servicesHtml = $servicesClean
        ? '<ul><li>' . implode('</li><li>', $servicesClean) . '</li></ul>'
        : '<p>Aucun service sélectionné.</p>';

    // Options OS
    $osHtml = '';
    if (in_array('Installation OS', $servicesClean, true)) {
        $osType = trim($_POST['osType'] ?? '');
        if ($osType === '' || mb_strlen($osType) > MAX_FIELD_LENGTHS['osType']) {
            jsonError('Sélection d’OS requise.', 400);
        }
        $osTypeClean = htmlspecialchars($osType, ENT_QUOTES, 'UTF-8');

        $winNeeded = isset($_POST['windows_license_needed']);
        $winType   = trim($_POST['windows_license_type'] ?? '');
        if ($winNeeded && ($winType === '' || mb_strlen($winType) > MAX_FIELD_LENGTHS['windows_license_type'])) {
            jsonError('Licence Windows requise.', 400);
        }
        $winTypeClean = $winNeeded
            ? htmlspecialchars($winType, ENT_QUOTES, 'UTF-8')
            : '';

        $osHtml  = "<p><strong>Système d’exploitation :</strong> {$osTypeClean}</p>"
            . "<p><strong>Licence Windows :</strong> " . ($winNeeded ? 'Oui' : 'Non') . "</p>";
        if ($winNeeded) {
            $osHtml .= "<p><strong>Type de licence :</strong> {$winTypeClean}</p>";
        }
    }

    $subject = 'Nouvelle demande de devis';
    $htmlContent = "
        <h2>Demande de Devis</h2>
        <p><strong>Nom :</strong> " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "</p>
        <p><strong>Email :</strong> " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</p>
        <p><strong>Téléphone :</strong> " . htmlspecialchars($phone ?: 'Non fourni', ENT_QUOTES, 'UTF-8') . "</p>
        <p><strong>Budget :</strong> " . htmlspecialchars($budget, ENT_QUOTES, 'UTF-8') . " €</p>
        <p><strong>Détails :</strong><br>" . nl2br(htmlspecialchars($details, ENT_QUOTES, 'UTF-8')) . "</p>
        <p><strong>Services :</strong><br>{$servicesHtml}</p>
        {$osHtml}
    ";
} else {
    jsonError('Type de formulaire inconnu.', 400);
}

// -----------------------------------------------------------------------------
// PRÉPARATION & ENVOI CÂBLE-BREVO
// -----------------------------------------------------------------------------
$payload = [
    'sender'      => ['name' => 'GPX PC', 'email' => 'no-reply@tonsite.com'],
    'replyTo'     => ['email' => $email, 'name' => $name],
    'to'          => [['email' => 'baptiste.soupy@gmail.com']],
    'subject'     => $subject,
    'htmlContent' => $htmlContent
];

$apiKey = $_ENV['BREVO_API_KEY'] ?? getenv('BREVO_API_KEY') ?? '';
if ($apiKey === '') {
    jsonError('Erreur de configuration serveur.', 500);
}

$ch = curl_init('https://api.brevo.com/v3/smtp/email');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_HTTPHEADER     => [
        'api-key: '      . $apiKey,
        'Content-Type: ' . 'application/json'
    ],
    CURLOPT_POSTFIELDS     => json_encode($payload),
    CURLOPT_TIMEOUT        => 10
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode === 201) {
    unset($_SESSION['failed'][$ip]);  // reset brute‐force counter
    jsonSuccess('Message envoyé avec succès !');
}

// Erreur API
error_log("Brevo HTTP {$httpCode} – Réponse: {$response}");
jsonError('Erreur interne. Veuillez réessayer plus tard.', 500);
