<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

// -----------------------------------------------------------------------------
// CHARGEMENT DES VARIABLES D'ENVIRONNEMENT
// -----------------------------------------------------------------------------
$envPath = realpath(__DIR__);
if ($envPath && file_exists($envPath . '/.env')) {
    Dotenv\Dotenv::createImmutable($envPath)->safeLoad();
}

// -----------------------------------------------------------------------------
// DÉTECTION ENVIRONNEMENT
// -----------------------------------------------------------------------------
$isLocal = in_array($_SERVER['SERVER_NAME'] ?? '', ['localhost', '127.0.0.1'], true);

// -----------------------------------------------------------------------------
// FONCTION UTILE POUR RÉCUPÉRER UNE VARIABLE D'ENVIRONNEMENT
// -----------------------------------------------------------------------------
function getEnvOrFail(string $key, ?string $default = null): string
{
    $val = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key) ?: $default;
    if ($val === null || $val === '') {
        error_log("⚠️ Variable d'environnement manquante : {$key}");
    }
    return (string)($val ?? '');
}

// -----------------------------------------------------------------------------
// CONSTANTES PRINCIPALES
// -----------------------------------------------------------------------------
define('BREVO_API_KEY', getEnvOrFail('BREVO_API_KEY', ''));
define('CONTACT_EMAIL', getEnvOrFail('CONTACT_EMAIL', 'gpxpc13@gmail.com'));

// reCAPTCHA
if ($isLocal) {
    define('RECAPTCHA_SITE_KEY', '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI');
    define('RECAPTCHA_SECRET_KEY', '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe');
} else {
    define('RECAPTCHA_SITE_KEY', getEnvOrFail('RECAPTCHA_SITE_KEY'));
    define('RECAPTCHA_SECRET_KEY', getEnvOrFail('RECAPTCHA_SECRET_KEY'));
}

// -----------------------------------------------------------------------------
// DEBUG RAPIDE (OPTIONNEL)
// -----------------------------------------------------------------------------
error_log(sprintf(
    "Config loaded: RECAPTCHA_SITE_KEY=%s, RECAPTCHA_SECRET_KEY=%s, BREVO_API_KEY=%s, CONTACT_EMAIL=%s",
    RECAPTCHA_SITE_KEY ? 'OK' : 'MISSING',
    RECAPTCHA_SECRET_KEY ? 'OK' : 'MISSING',
    BREVO_API_KEY ? 'OK' : 'MISSING',
    CONTACT_EMAIL
));
