<?php

declare(strict_types=1);

require 'config.php'; // contient RECAPTCHA_SITE_KEY et RECAPTCHA_SECRET_KEY

// -----------------------------------------------------------------------------
// CONFIGURATION
// -----------------------------------------------------------------------------
$contactEmail = $_ENV['CONTACT_EMAIL'] ?? getenv('CONTACT_EMAIL') ?? 'gpxpc13@gmail.com';
$brevoApiKey  = $_ENV['BREVO_API_KEY'] ?? getenv('BREVO_API_KEY') ?? '';
if (!$brevoApiKey) jsonError('Erreur de configuration serveur (clé API manquante).', 500);

// -----------------------------------------------------------------------------
// HEADERS DE SÉCURITÉ
// -----------------------------------------------------------------------------
header('Content-Type: application/json; charset=utf-8');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
header("Content-Security-Policy: default-src 'none'; script-src 'self'; style-src 'self'; img-src 'self' data:; font-src 'self'; connect-src 'self';");
header('Referrer-Policy: no-referrer');

// -----------------------------------------------------------------------------
// SESSION & LOGS
// -----------------------------------------------------------------------------
session_set_cookie_params([
    'lifetime' => 0,
    'secure'   => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);
session_start();

ini_set('display_errors', '0');
ini_set('log_errors',  '1');
ini_set('error_log',   __DIR__ . '/logs/errors.log');

// -----------------------------------------------------------------------------
// CONSTANTES
// -----------------------------------------------------------------------------
const MAX_FIELD_LENGTHS = [
    'name'          => 50,
    'email'         => 100,
    'phone'         => 20,
    'budget'        => 10,
    'details'       => 1000,
    'service_value' => 100,
    'osType'        => 50,
    'message'       => 2000,
    'pc_type'       => 20,
];
const RATE_LIMIT_SECONDS   = 0;
const MAX_PAYLOAD_SIZE     = 10_000;
const MAX_FAILED_ATTEMPTS  = 10;
const FAILED_BLOCK_WINDOW  = 3600;

// -----------------------------------------------------------------------------
// FONCTIONS JSON
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

function validateFieldLength(string $value, string $field, int $max): void
{
    if (!$value || mb_strlen($value) > $max) {
        jsonError("$field invalide.", 400);
    }
}

// -----------------------------------------------------------------------------
// PROTECTIONS : METHOD, PAYLOAD, BRUTE FORCE
// -----------------------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] !== 'POST') jsonError('Méthode non autorisée.', 405);

if (!empty($_SERVER['CONTENT_LENGTH']) && (int)$_SERVER['CONTENT_LENGTH'] > MAX_PAYLOAD_SIZE) {
    jsonError('Requête trop volumineuse.', 413);
}

$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
if (!isset($_SESSION['failed'][$ip])) {
    $_SESSION['failed'][$ip] = ['count' => 0, 'first' => time()];
}
$fail = &$_SESSION['failed'][$ip];

if (time() - $fail['first'] < FAILED_BLOCK_WINDOW) {
    if ($fail['count'] >= MAX_FAILED_ATTEMPTS) jsonError('Trop de tentatives. Réessayez plus tard.', 429);
} else {
    $fail = ['count' => 0, 'first' => time()];
}

// -----------------------------------------------------------------------------
// CSRF
// -----------------------------------------------------------------------------
if (empty($_SESSION['csrf_token'])) $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
$token = $_POST['csrf_token'] ?? '';
if (!hash_equals($_SESSION['csrf_token'], $token)) {
    $fail['count']++;
    jsonError('Requête invalide (CSRF).', 400);
}

// -----------------------------------------------------------------------------
// RATE LIMIT
// -----------------------------------------------------------------------------
if (isset($_SESSION['last_submit']) && (time() - $_SESSION['last_submit'] < RATE_LIMIT_SECONDS)) {
    jsonError('Trop de requêtes. Ralentissez.', 429);
}
$_SESSION['last_submit'] = time();

// -----------------------------------------------------------------------------
// HONEYPOT
// -----------------------------------------------------------------------------
if (!empty($_POST['website'])) jsonError('Spam détecté.', 400);

// -----------------------------------------------------------------------------
// reCAPTCHA v3
// -----------------------------------------------------------------------------
$response = $_POST['recaptcha_token'] ?? '';
if (!$response) jsonError('Le jeton reCAPTCHA est manquant.', 400);

$ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => http_build_query([
        'secret'   => RECAPTCHA_SECRET_KEY,
        'response' => $response,
        'remoteip' => $ip
    ]),
]);
$result = curl_exec($ch);
curl_close($ch);

$data = json_decode($result, true);
if (empty($data['success']) || $data['score'] < 0.5) {
    jsonError('Erreur reCAPTCHA : veuillez réessayer plus tard ou contacter GPX PC.', 400);
}

// -----------------------------------------------------------------------------
// VALIDATION CHAMPS COMMUNS
// -----------------------------------------------------------------------------
$formType = $_POST['formType'] ?? 'contact';
$name     = trim($_POST['name'] ?? '');
$email    = trim($_POST['email'] ?? '');
$phone    = trim($_POST['phone'] ?? '');
$services = $_POST['services'] ?? [];

if (!$name || mb_strlen($name) > MAX_FIELD_LENGTHS['name'] || !preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ' -]+$/u", $name)) {
    jsonError('Nom invalide.', 400);
}
if (!$email || mb_strlen($email) > MAX_FIELD_LENGTHS['email'] || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    jsonError('Email invalide.', 400);
}

// -----------------------------------------------------------------------------
// TRAITEMENT SELON LE TYPE DE FORMULAIRE
// -----------------------------------------------------------------------------
switch ($formType) {
    case 'devis':
        $budget     = trim($_POST['budget'] ?? '');
        $details    = trim($_POST['details'] ?? '');
        $resolution = trim($_POST['resolution'] ?? '');
        $rgb        = trim($_POST['rgb'] ?? '');
        $theme      = trim($_POST['theme'] ?? '');
        $cpuBrand   = trim($_POST['processeur'] ?? '');
        $gpuBrand   = trim($_POST['carte_graphique'] ?? '');
        $boitier    = trim($_POST['boitier'] ?? '');
        $proUsage   = $_POST['pro_usage'] ?? [];

        if (!is_numeric($budget) || (int)$budget <= 0) {
            jsonError('Budget invalide.', 400);
        }

        validateFieldLength($details, 'Détails du projet', MAX_FIELD_LENGTHS['details']);
        foreach (['resolution' => $resolution, 'rgb' => $rgb, 'theme' => $theme, 'processeur' => $cpuBrand, 'carte graphique' => $gpuBrand, 'boîtier' => $boitier] as $label => $val) {
            validateFieldLength($val, ucfirst($label), MAX_FIELD_LENGTHS['osType']);
        }

        $proUsageStr = implode(', ', array_map('htmlspecialchars', (array)$proUsage));
        $serviceList = $services ? '<ul><li>' . implode('</li><li>', array_map('htmlspecialchars', $services)) . '</li></ul>' : 'Aucun service supplémentaire sélectionné.';

        $subject = 'Demande de devis GPX PC';
        $htmlContent = "
            <h2>Nouvelle demande de devis</h2>
            <p><strong>Nom:</strong> " . htmlspecialchars($name) . "</p>
            <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
            <p><strong>Téléphone:</strong> " . htmlspecialchars($phone) . "</p>
            <p><strong>Budget:</strong> " . htmlspecialchars($budget) . " €</p>
            <h3>Préférences utilisateur :</h3>
            <ul>
                <li><strong>Résolution préférée :</strong> " . htmlspecialchars($resolution) . "</li>
                <li><strong>RGB :</strong> " . htmlspecialchars($rgb) . "</li>
                <li><strong>Thème :</strong> " . htmlspecialchars($theme) . "</li>
                <li><strong>Processeur :</strong> " . htmlspecialchars($cpuBrand) . "</li>
                <li><strong>Carte graphique :</strong> " . htmlspecialchars($gpuBrand) . "</li>
                <li><strong>Utilisation professionnelle :</strong> $proUsageStr</li>
                <li><strong>Boîtier :</strong> " . htmlspecialchars($boitier) . "</li>
            </ul>
            <h3>Détails du projet :</h3><p>" . nl2br(htmlspecialchars($details)) . "</p>
            <h3>Services supplémentaires :</h3>{$serviceList}
        ";
        break;

    case 'contact':
        $message = trim($_POST['message'] ?? '');
        validateFieldLength($message, 'Message', MAX_FIELD_LENGTHS['message']);

        $subject = 'Message depuis le formulaire de contact';
        $htmlContent = "
            <h2>Nouveau message de contact</h2>
            <p><strong>Nom:</strong> " . htmlspecialchars($name) . "</p>
            <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
            <p><strong>Téléphone:</strong> " . htmlspecialchars($phone) . "</p>
            <h3>Message :</h3><p>" . nl2br(htmlspecialchars($message)) . "</p>
        ";
        break;

    case 'reparation':
        $message = trim($_POST['message'] ?? '');
        $pcType  = trim($_POST['pc_type'] ?? '');

        validateFieldLength($message, 'Message', MAX_FIELD_LENGTHS['message']);
        validateFieldLength($pcType, 'Type de PC', MAX_FIELD_LENGTHS['pc_type']);

        $serviceList = $services ? '<ul><li>' . implode('</li><li>', array_map('htmlspecialchars', $services)) . '</li></ul>' : 'Aucun service supplémentaire sélectionné.';

        $subject = 'Demande de réparation depuis le site GPX PC';
        $htmlContent = "
            <h2>Nouvelle demande de réparation</h2>
            <p><strong>Nom:</strong> " . htmlspecialchars($name) . "</p>
            <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
            <p><strong>Téléphone:</strong> " . htmlspecialchars($phone) . "</p>
            <h3>Informations :</h3>
            <ul><li><strong>Type de PC:</strong> " . htmlspecialchars($pcType) . "</li></ul>
            <h3>Services souhaités :</h3>{$serviceList}
            <h3>Message :</h3><p>" . nl2br(htmlspecialchars($message)) . "</p>
        ";
        break;

    default:
        jsonError('Type de formulaire inconnu.', 400);
}

// -----------------------------------------------------------------------------
// ENVOI VIA BREVO
// -----------------------------------------------------------------------------
$payload = [
    'sender'      => ['name' => 'GPX PC', 'email' => $contactEmail],
    'replyTo'     => ['email' => $email, 'name' => $name],
    'to'          => [['email' => $contactEmail]],
    'subject'     => $subject,
    'htmlContent' => $htmlContent
];

$ch = curl_init('https://api.brevo.com/v3/smtp/email');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_HTTPHEADER     => [
        'api-key: '      . $brevoApiKey,
        'Content-Type: application/json'
    ],
    CURLOPT_POSTFIELDS     => json_encode($payload),
    CURLOPT_TIMEOUT        => 15
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode === 201) {
    unset($_SESSION['failed'][$ip]);
    $_SESSION['last_submit'] = time();
    jsonSuccess('Message envoyé avec succès !');
}

error_log("Brevo HTTP {$httpCode} – Réponse: {$response}");
jsonError('Erreur interne. Veuillez réessayer plus tard.', 500);
