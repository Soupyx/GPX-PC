<?php
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

require_once __DIR__ . '/config.php';

$pageTitle = $pageTitle ?? "GPX PC – Assemblage & Réparation PC";
$pageDescription = $pageDescription ?? "GPX PC : Montage, réparation et livraison de PC partout en France.";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="logo/Logo.png">
    <link rel="apple-touch-icon" href="logo/Logo.png">
    <link href="dist/output.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow-y: scroll;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-500">
    <header class="gpx-header relative z-50 bg-white dark:bg-gray-800 shadow transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between gap-4">
            <!-- Logo -->
            <a href="/" class="block flex-shrink-0">
                <img src="logo/Logo.png" alt="Logo de GPX PC, retour à l'accueil" class="h-16 sm:h-24" />
            </a>

            <!-- Burger mobile -->
            <button class="gpx-header__toggle sm:hidden relative z-50 focus:outline-none"
                aria-label="Ouvrir / fermer le menu"
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

            <!-- Nav desktop -->
            <nav class="gpx-header__nav hidden sm:flex items-center gap-6 ml-auto">
                <a href="pcs.php" class="group relative px-4 py-2 bg-gradient-to-r from-[#3857cb] to-[#2c469f]
               border-2 border-transparent text-white font-bold text-sm uppercase
               hover:from-[#2c469f] hover:to-[#3857cb]">Nos configurations</a>
                <a href="reparation.php" class="group relative px-4 py-2 bg-gradient-to-r from-[#3857cb] to-[#2c469f]
               border-2 border-transparent text-white font-bold text-sm uppercase
               hover:from-[#2c469f] hover:to-[#3857cb]">Réparation & Entretien</a>
                <a href="contact.php" class="group relative px-4 py-2 bg-gradient-to-r from-[#3857cb] to-[#2c469f]
               border-2 border-transparent text-white font-bold text-sm uppercase
               hover:from-[#2c469f] hover:to-[#3857cb]">Me contacter</a>

                <!-- Dark mode toggle (desktop) -->
                <label class="relative w-[6.5rem] h-9 ml-4 cursor-pointer">
                    <input type="checkbox" class="dark-toggle sr-only" />
                    <span class="absolute inset-0 bg-gray-800 rounded-full transition-colors duration-300 dark:bg-purple-600"></span>
                    <span class="absolute inset-0 flex items-center justify-center text-white text-xs font-semibold pointer-events-none transition-opacity duration-300 opacity-100 dark:opacity-0">
                        Dark
                    </span>
                    <span class="absolute inset-0 flex items-center justify-center text-white text-xs font-semibold pointer-events-none transition-opacity duration-300 opacity-0 dark:opacity-100">
                        Light
                    </span>
                    <span class="absolute left-0 top-1/2 -translate-y-1/2 w-8 h-8 bg-white rounded-full shadow transform transition-transform duration-500 dark:translate-x-[4.5rem]"></span>
                </label>
            </nav>
        </div>

        <!-- Menu mobile -->
        <div id="gpx-header__menu" class="fixed inset-0 bg-white dark:bg-gray-800 origin-top scale-y-0 transform transition-transform duration-300 z-40">
            <nav class="flex flex-col items-center justify-center h-full space-y-8 px-6">
                <a href="pcs.php" class="text-2xl font-bold text-gray-800 dark:text-gray-200">Nos configurations</a>
                <a href="reparation.php" class="text-2xl font-bold text-gray-800 dark:text-gray-200">Réparation & Entretien</a>
                <a href="contact.php" class="text-2xl font-bold text-gray-800 dark:text-gray-200">Me contacter</a>

                <!-- Dark mode toggle (mobile) -->
                <label class="flex items-center gap-3 mt-6 cursor-pointer">
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
        (function() {
            const root = document.documentElement;
            const toggles = document.querySelectorAll('.dark-toggle');

            // Initialiser depuis localStorage
            if (localStorage.theme === 'dark') {
                root.classList.add('dark');
                toggles.forEach(cb => cb.checked = true);
            }

            // Synchronisation toggle
            toggles.forEach(cb => cb.addEventListener('change', () => {
                const isDark = cb.checked;
                root.classList.toggle('dark', isDark);
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
                toggles.forEach(t => t.checked = isDark);
            }));

            // Menu burger
            const btn = document.querySelector('.gpx-header__toggle');
            const menu = document.getElementById('gpx-header__menu');
            const openI = document.querySelector('.gpx-header__icon-open');
            const closeI = document.querySelector('.gpx-header__icon-close');

            btn.addEventListener('click', () => {
                const exp = btn.getAttribute('aria-expanded') === 'true';
                btn.setAttribute('aria-expanded', String(!exp));
                menu.classList.toggle('scale-y-0');
                openI.classList.toggle('hidden');
                closeI.classList.toggle('hidden');
            });
        })();
    </script>