<?php
// pcs.php
$pcs = [
    'Bureautique' => [
        [
            'name' => 'Bureautique Basic',
            'price' => 399,
            'components' => [
                'Processeur : Intel i3-12100',
                'Carte graphique : Intel UHD 730 intégrée',
                'RAM : 8 Go DDR4 2666MHz',
                'Refroidissement : Ventirad d\'origine',
                'Carte mère : ASUS PRIME H610M',
                'Alimentation : 450W 80+ White',
                'Stockage : 256 Go SSD SATA Kingston',
                'Boitier : Aerocool Bolt Mini'
            ]
        ],
        [
            'name' => 'Bureautique Plus',
            'price' => 599,
            'components' => [
                'Processeur : AMD Ryzen 5 5600G',
                'Carte graphique : Radeon Vega intégrée',
                'RAM : 16 Go DDR4 3200MHz',
                'Refroidissement : Ventirad silencieux',
                'Carte mère : ASRock B550M Pro4',
                'Alimentation : 500W 80+ Bronze',
                'Stockage : 512 Go SSD NVMe Crucial',
                'Boitier : Be Quiet! Pure Base 500'
            ]
        ],
        [
            'name' => 'Bureautique Ultimate',
            'price' => 899,
            'components' => [
                'Processeur : Intel i5-13500',
                'Carte graphique : Intel UHD 770 intégrée',
                'RAM : 32 Go DDR4 3200MHz',
                'Refroidissement : Ventirad Be Quiet!',
                'Carte mère : Gigabyte B760M DS3H',
                'Alimentation : 550W 80+ Bronze',
                'Stockage : 1 To SSD NVMe Samsung',
                'Boitier : Fractal Design Meshify C'
            ]
        ],
    ],
    'Gamer' => [
        [
            'name' => 'Gamer Basic',
            'price' => 799,
            'components' => [
                'Processeur : AMD Ryzen 5 5500',
                'Carte graphique : NVIDIA GTX 1660 Super',
                'RAM : 16 Go DDR4 3200MHz',
                'Refroidissement : Ventirad d\'origine',
                'Carte mère : MSI B550M PRO',
                'Alimentation : 550W 80+ Bronze',
                'Stockage : 500 Go SSD NVMe Samsung',
                'Boitier : NZXT H510 Noir'
            ]
        ],
        [
            'name' => 'Gamer Plus',
            'price' => 1299,
            'components' => [
                'Processeur : Intel i5-13600KF',
                'Carte graphique : NVIDIA RTX 3060 Ti',
                'RAM : 32 Go DDR5 5600MHz',
                'Refroidissement : Watercooling 240mm',
                'Carte mère : ASUS TUF Z690',
                'Alimentation : 650W 80+ Gold',
                'Stockage : 1 To SSD NVMe WD Black',
                'Boitier : Corsair 4000D Airflow'
            ]
        ],
        [
            'name' => 'Gamer Ultimate',
            'price' => 2499,
            'components' => [
                'Processeur : Intel i9-14900K',
                'Carte graphique : NVIDIA RTX 4080',
                'RAM : 64 Go DDR5 6000MHz',
                'Refroidissement : Watercooling 360mm',
                'Carte mère : ASUS ROG Maximus Z790',
                'Alimentation : 850W 80+ Platinum',
                'Stockage : 2 To SSD NVMe + 4 To HDD',
                'Boitier : Lian Li PC-O11 Dynamic'
            ]
        ],
    ],

    'Streamer' => [
        [
            'name' => 'Streamer Basic',
            'price' => 999,
            'components' => [
                'Processeur : AMD Ryzen 7 5700G',
                'Carte graphique : NVIDIA RTX 3050',
                'RAM : 16 Go DDR4 3200MHz',
                'Refroidissement : Ventirad silencieux',
                'Carte mère : Gigabyte B550M DS3H',
                'Alimentation : 600W 80+ Bronze',
                'Stockage : 1 To SSD NVMe Crucial',
                'Boitier : Phanteks Eclipse P360A'
            ]
        ],
        [
            'name' => 'Streamer Plus',
            'price' => 1599,
            'components' => [
                'Processeur : Intel i7-13700K',
                'Carte graphique : NVIDIA RTX 3070 Ti',
                'RAM : 32 Go DDR5 5600MHz',
                'Refroidissement : Watercooling 240mm RGB',
                'Carte mère : ASUS PRIME Z690-P',
                'Alimentation : 750W 80+ Gold',
                'Stockage : 1 To SSD NVMe + 2 To HDD',
                'Boitier : Cooler Master MasterBox TD500'
            ]
        ],
        [
            'name' => 'Streamer Ultimate',
            'price' => 2899,
            'components' => [
                'Processeur : Intel i9-14900K',
                'Carte graphique : NVIDIA RTX 4090',
                'RAM : 64 Go DDR5 6000MHz',
                'Refroidissement : Watercooling 360mm RGB',
                'Carte mère : MSI MEG Z790 ACE',
                'Alimentation : 1000W 80+ Platinum',
                'Stockage : 2 To SSD NVMe + 4 To HDD',
                'Boitier : Corsair iCUE 5000X RGB'
            ]
        ],
    ],
];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nos configurations – GPX Gaming Power Xperience</title>
    <link rel="icon" type="image/png" sizes="32x32" href="logo/Logo.png">
    <link rel="apple-touch-icon" href="logo/Logo.png">

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
        };
    </script>
    <style>
        @keyframes fly {
            from {
                transform: translateY(0.1em);
            }

            to {
                transform: translateY(-0.1em);
            }
        }

        .fly-yoyo {
            animation: fly 0.6s ease-in-out infinite alternate;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow-y: scroll;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-200 transition-colors duration-500">
    <header class="bg-white dark:bg-gray-800 shadow transition-colors duration-500 relative">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between gap-4">
            <!-- Logo -->
            <a href="index.html" class="block flex-shrink-0">
                <img
                    src="logo/Logo.png"
                    alt="GPX PC - Gaming Power Xperience"
                    class="h-16 sm:h-24" />
            </a>
            <h1 class="sr-only">GPX PC - Gaming Power Xperience</h1>

            <div class="flex items-center gap-6 sm:gap-12 lg:gap-20 ml-auto">

                <!-- Bouton Nos Configurations -->
                <a
                    href="pcs.php"
                    class="hidden sm:inline-block group relative px-6 py-3 bg-gradient-to-r from-[#3857cb] to-[#2c469f] border-2 border-transparent text-white font-bold tracking-wide overflow-visible transition-all duration-300 ease-in-out hover:from-[#2c469f] hover:to-[#3857cb]">
                    <span
                        class="absolute top-[-2px] left-[0.625rem] h-[2px] w-[1.5625rem] bg-gray-200 transition-all duration-500 ease-out group-hover:left-[-2px] group-hover:w-0"></span>
                    <span
                        class="absolute top-1/2 left-[1.5rem] -translate-y-1/2 h-[2px] w-[1.5625rem] bg-black transition-all duration-300 ease-linear group-hover:w-[0.9375rem] group-hover:bg-white"></span>
                    <span class="block ml-[2em] text-[1.125em] leading-[1.3333em] uppercase">
                        Nos configurations
                    </span>
                    <span
                        class="absolute bottom-[-2px] right-[1.875rem] h-[2px] w-[1.5625rem] bg-gray-200 transition-all duration-500 ease-out group-hover:right-0 group-hover:w-0"></span>
                    <span
                        class="absolute bottom-[-2px] right-[0.625rem] h-[2px] w-[0.625rem] bg-gray-200 transition-all duration-500 ease-out group-hover:right-0 group-hover:w-0"></span>
                </a>

                <!-- Bouton Me contacter -->
                <a
                    href="contact.php"
                    class="hidden sm:inline-block group relative px-6 py-3 bg-gradient-to-r from-[#3857cb] to-[#2c469f] border-2 border-transparent text-white font-bold tracking-wide overflow-visible transition-all duration-300 ease-in-out hover:from-[#2c469f] hover:to-[#3857cb]">
                    <span
                        class="absolute top-[-2px] left-[0.625rem] h-[2px] w-[1.5625rem] bg-gray-200 transition-all duration-500 ease-out group-hover:left-[-2px] group-hover:w-0"></span>
                    <span
                        class="absolute top-1/2 left-[1.5rem] -translate-y-1/2 h-[2px] w-[1.5625rem] bg-black transition-all duration-300 ease-linear group-hover:w-[0.9375rem] group-hover:bg-white"></span>
                    <span class="block ml-[2em] text-[1.125em] leading-[1.3333em] uppercase">
                        Me contacter
                    </span>
                    <span
                        class="absolute bottom-[-2px] right-[1.875rem] h-[2px] w-[1.5625rem] bg-gray-200 transition-all duration-500 ease-out group-hover:right-0 group-hover:w-0"></span>
                    <span
                        class="absolute bottom-[-2px] right-[0.625rem] h-[2px] w-[0.625rem] bg-gray-200 transition-all duration-500 ease-out group-hover:right-0 group-hover:w-0"></span>
                </a>

                <!-- Switch Dark Mode -->
                <label class="w-24 h-9 flex-shrink-0 relative">
                    <input type="checkbox" id="dark-toggle" class="peer hidden" />
                    <span class="absolute inset-0 bg-gray-800 rounded-full transition-colors duration-500 peer-checked:bg-purple-600 cursor-pointer"></span>
                    <span id="mode-text"
                        class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-white font-semibold text-xs transition-all duration-500 peer-checked:left-[40%]">
                        Dark
                    </span>
                    <span
                        class="absolute left-0 top-1/2 -translate-y-1/2 h-8 w-8 bg-white rounded-full shadow transition-all duration-500 peer-checked:left-[68%] peer-checked:rotate-[360deg] peer-checked:outline peer-checked:outline-[6px] peer-checked:outline-white/30">
                        <span
                            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-gray-800 dark:text-white">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 18V6l8 6-8 6Z" />
                            </svg>
                        </span>
                    </span>
                </label>
            </div>
        </div>
    </header>

    <!-- Main content -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="p-6 text-center text-4xl sm:text-5xl font-extrabold mb-4 drop-shadow-lg">Nos configurations PC</h1>

        <?php foreach ($pcs as $category => $list): ?>
            <h2 class="text-2xl font-semibold mb-4"><?= $category ?></h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                <?php foreach ($list as $pc): ?>
                    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-semibold mb-2"><?= htmlspecialchars($pc['name']) ?></h3>
                            <p class="text-lg font-bold text-purple-600 mb-3"><?= htmlspecialchars($pc['price']) ?> €</p>
                            <ul class="list-disc list-inside text-sm text-gray-700 dark:text-gray-300 mb-4">
                                <?php foreach ($pc['components'] as $component): ?>
                                    <li><?= htmlspecialchars($component) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <form action="contact.php" method="get">
                            <input type="hidden" name="pc" value="<?= htmlspecialchars($pc['name']) ?>">
                            <button type="submit" class="mt-3 w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded">
                                Choisir
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </main>
    <footer
        class="bg-black dark:bg-gray-950 text-gray-400 dark:text-gray-500 py-8 transition-colors duration-500">
        <div
            class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center">
            <a href="index.html" class="block mb-6 sm:mb-0">
                <img src="logo/Logo.png" alt="GPX PC Logo" class="h-12 sm:h-16" />
            </a>
            <nav class="flex gap-8">
                <a href="index.html" class="hover:text-white transition">Accueil</a>
                <a href="devis.php" class="hover:text-white transition">Devis</a>
                <a href="contact.php" class="hover:text-white transition">Contact</a>
            </nav>
            <p class="mt-6 sm:mt-0 text-xs text-gray-600 dark:text-gray-400">
                &copy; 2025 Soupyx PC Services
            </p>
        </div>
    </footer>

    <script>
        const toggle = document.getElementById("dark-toggle");
        const modeText = document.getElementById("mode-text");

        if (localStorage.theme === "dark") {
            document.documentElement.classList.add("dark");
            toggle.checked = true;
            modeText.textContent = "Light";
        }

        toggle.addEventListener("change", () => {
            if (toggle.checked) {
                document.documentElement.classList.add("dark");
                localStorage.theme = "dark";
                modeText.textContent = "Light";
            } else {
                document.documentElement.classList.remove("dark");
                localStorage.theme = "light";
                modeText.textContent = "Dark";
            }
        });
    </script>
</body>

</html>