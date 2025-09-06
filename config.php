<?php
require_once __DIR__ . '/vendor/autoload.php';

// Chargement des variables d'environnement
if (file_exists(__DIR__ . '/.env')) {
    Dotenv\Dotenv::createImmutable(__DIR__)->safeLoad();
}

// Constantes globales pour reCAPTCHA
define('RECAPTCHA_SITE_KEY', $_ENV['RECAPTCHA_SITE_KEY'] ?? '');
define('RECAPTCHA_SECRET_KEY', $_ENV['RECAPTCHA_SECRET_KEY'] ?? '');

// Consentement par défaut pour reCAPTCHA
$recaptchaConsent = false; // booléen plus propre que 'false'
