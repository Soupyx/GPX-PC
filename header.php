<?php
// Démarrage de session sécurisé
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Génération du CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

require_once __DIR__ . '/config.php';

// Titres par défaut
$pageTitle = $pageTitle ?? "GPX PC – Assemblage, Réparation & Optimisation PC à Marseille";
$pageDescription = $pageDescription ?? "GPX PC : Expert en montage, réparation et optimisation de PC gamer et professionnels. Services disponibles à Marseille avec livraison en France.";

// Liens de navigation
$navLinks = [
    ['devis.php', 'PC sur mesure'],
    ['pcs.php', 'Configurations PC'],
    ['reparation.php', 'Réparation & Entretien'],
    ['contact.php', 'Me contacter']
];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">

    <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDescription) ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://gpxpc1.whf.bz/">
    <meta property="og:image" content="https://gpxpc1.whf.bz/logo/Logo.png">
    <meta property="og:site_name" content="GPX PC">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($pageDescription) ?>">
    <meta name="twitter:image" content="https://gpxpc1.whf.bz/logo/Logo.png">

    <link rel="canonical" href="https://gpxpc1.whf.bz/">
    <link rel="icon" type="image/png" sizes="32x32" href="logo/Logo.png">
    <link rel="apple-touch-icon" href="logo/Logo.png">

    <script>
        (function() {
            try {
                const stored = localStorage.getItem('theme');
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                document.documentElement.classList.toggle('dark', stored === 'dark' || (!stored && prefersDark));
            } catch (e) {}
        })();
    </script>

    <link href="dist/output.css" rel="stylesheet">
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow-y: scroll;
        }

        .grecaptcha-badge {
            visibility: hidden !important;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-500">

    <header class="gpx-header relative z-50 bg-white dark:bg-gray-800 shadow transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between gap-4">
            <a href="/" class="block flex-shrink-0" aria-label="Retour à l'accueil de GPX PC, expert en montage et réparation d'ordinateurs.">
                <img src="logo/Logo.png" alt="Logo de GPX PC, monteur et réparateur de PC sur Marseille" class="h-16 sm:h-24" />
            </a> <button class="gpx-header__toggle sm:hidden relative z-50 focus:outline-none"
                aria-label="Ouvrir / fermer le menu de navigation"
                aria-expanded="false"
                aria-controls="gpx-header__menu">
                <svg class="gpx-header__icon-open w-6 h-6 text-gray-800 dark:text-gray-200"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg class="gpx-header__icon-close hidden w-6 h-6 text-gray-800 dark:text-gray-200"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <nav class="gpx-header__nav hidden sm:flex items-center gap-6 ml-auto" aria-label="Menu principal de navigation">
                <?php foreach ($navLinks as $link): ?>
                    <a href="<?= $link[0] ?>" class="group relative px-4 py-2 bg-gradient-to-r from-[#3857cb] to-[#2c469f] border-2 border-transparent text-white font-bold text-sm uppercase hover:from-[#2c469f] hover:to-[#3857cb]">
                        <?= $link[1] ?>
                    </a>
                <?php endforeach; ?>

                <label class="relative w-[6.5rem] h-9 ml-4 cursor-pointer js-dark-toggle" role="switch" aria-checked="false">
                    <input type="checkbox" class="dark-toggle sr-only" />
                    <span class="absolute inset-0 bg-gray-800 rounded-full transition-colors duration-300 dark:bg-gradient-to-r dark:from-blue-500 dark:to-blue-700"></span>
                    <span class="absolute inset-0 flex items-center justify-center text-white text-xs font-semibold pointer-events-none transition-opacity duration-300 opacity-100 dark:opacity-0">Dark</span>
                    <span class="absolute inset-0 flex items-center justify-center text-white text-xs font-semibold pointer-events-none transition-opacity duration-300 opacity-0 dark:opacity-100">Light</span>
                    <span class="absolute left-0 top-1/2 -translate-y-1/2 w-8 h-8 bg-white rounded-full shadow transform transition-transform duration-500 dark:translate-x-[4.5rem]"></span>
                </label>
            </nav>
        </div>

        <div id="gpx-header__menu" class="fixed inset-0 bg-white dark:bg-gray-800 origin-top scale-y-0 transform transition-transform duration-300 z-40">
            <nav class="flex flex-col items-center justify-center h-full space-y-8 px-6" aria-label="Menu de navigation mobile">
                <?php foreach ($navLinks as $link): ?>
                    <a href="<?= $link[0] ?>" class="text-2xl font-bold text-gray-800 dark:text-gray-200"><?= $link[1] ?></a>
                <?php endforeach; ?>

                <label class="flex items-center gap-3 mt-6 cursor-pointer js-dark-toggle" role="switch" aria-checked="false">
                    <input type="checkbox" class="dark-toggle hidden" />
                    <span class="relative block w-12 h-6 bg-gray-300 rounded-full transition-colors duration-300 dark:bg-gray-600">
                        <span class="absolute left-0 top-0 w-6 h-6 bg-white rounded-full shadow transform transition-transform duration-300 dark:translate-x-6"></span>
                    </span>
                    <span class="text-gray-800 dark:text-gray-200 font-semibold">Dark Mode</span>
                </label>
            </nav>
        </div>
    </header>

    <script>
        const RECAPTCHA_SITE_KEY_JS = '<?= htmlspecialchars(RECAPTCHA_SITE_KEY) ?>';
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="cookie_banner.js"></script>
    <script>
        (function() {
            const root = document.documentElement;
            const toggles = document.querySelectorAll('.js-dark-toggle');
            const btn = document.querySelector('.gpx-header__toggle');
            const menu = document.getElementById('gpx-header__menu');
            const openI = document.querySelector('.gpx-header__icon-open');
            const closeI = document.querySelector('.gpx-header__icon-close');

            function setTheme(isDark) {
                root.classList.toggle('dark', isDark);
                try {
                    localStorage.setItem('theme', isDark ? 'dark' : 'light');
                } catch (e) {}
                toggles.forEach(label => label.setAttribute('aria-checked', String(isDark)));
                document.querySelectorAll('.dark-toggle').forEach(cb => cb.checked = isDark);
            }

            setTheme(root.classList.contains('dark'));

            toggles.forEach(toggle => toggle.addEventListener('click', e => {
                e.preventDefault();
                setTheme(!root.classList.contains('dark'));
            }));

            if (btn && menu && openI && closeI) {
                btn.addEventListener('click', () => {
                    const expanded = btn.getAttribute('aria-expanded') === 'true';
                    btn.setAttribute('aria-expanded', String(!expanded));
                    menu.classList.toggle('scale-y-0');
                    openI.classList.toggle('hidden');
                    closeI.classList.toggle('hidden');
                });
            }
        })();
    </script>