<?php
// pcs.php
$pcs = [
    'Gamer' => [
        [
            'name' => 'Gamer Basic',
            'price' => 799,
            'components' => [
                'Processeur : i3-12100F',
                'Carte graphique : AMD Radeon RX 7600',
                'RAM : Corsair VENGEANCE (2 × 8 Go) DDR4 3600MHz C18',
                'Refroidissement : Ventirad d\'origine',
                'Carte mère : GIGABYTE B760M Gaming X, DDR4',
                'Alimentation : MSI MAG A650BN, 650W, 80Plus Bronze',
                'Boîtier : MSI MAG FORGE M100R'
            ],
            'case_link' => 'https://fr.msi.com/PC-Case/MAG-FORGE-M100R',
        ],
        [
            'name' => 'Gamer Pro',
            'price' => 1299,
            'components' => [
                'Processeur : AMD Ryzen 5 7600X',
                'Carte graphique : AMD Radeon RX 7800 XT',
                'RAM : Kingston Fury Beast Black ARGB (2 × 16 Go) DDR5-6000 CL30',
                'Refroidissement : Freezer 34 eSports DUO',
                'Carte mère : GIGABYTE B650 Eagle AX, DDR5',
                'Alimentation : Thermaltake Toughpower GT 850W, 80Plus Gold',
                'Stockage : Samsung 990 EVO Plus NVMe M.2 PCIe 4.0, 1To',
                'Boîtier : Corsair FRAME 4000D RS ARGB',
            ],
            'case_link' => 'https://www.corsair.com/fr/fr/p/pc-cases/cc-9011296-ww/frame-4000d-rs-argb-modular-mid-tower-pc-case-cc-9011296-ww',
        ],
        [
            'name' => 'Gamer Ultimate',
            'price' => 2499,
            'components' => [
                'Processeur : AMD Ryzen 7 9700X',
                'Carte graphique : MSI NVDIA GeForce RTX 5080',
                'RAM : 2 × 16 Go DDR5 6000 CL30',
                'Refroidissement : ARCTIC Liquid Freezer III Pro 360 A-RGB',
                'Carte mère : Asus Tuf Gaming B650-PLUS WIFI',
                'Alimentation : Corsair RM1000e (2025), 1000W, 80Plus Gold',
                'Stockage : Samsung 990 EVO Plus NVMe M.2 PCIe 4.0, 2To',
                'Boîtier : Lian-Li O11',
                'Ventilateurs supplémentaires : Artic P12 (5 pièces)'
            ],
            'case_link' => 'https://lian-li.com/fr/product/pc-o11-dynamic/',
        ],
    ],

    'Streamer Basic' => [
        [
            'name' => 'Streamer Basic',
            'price' => 999,
            'components' => [
                'Processeur : AMD Ryzen 7 9700X',
                'Carte graphique : NVIDIA GeForce RTX 5070',
                'RAM : 2 × 16 Go DDR5 6000 CL30',
                'Refroidissement : Watercooling 240mm A-RGB',
                'Carte mère : GIGABYTE X670 AORUS Elite AX',
                'Alimentation : CORSAIR RM850x, 850W, 80Plus Gold',
                'Stockage : 1To NVMe M.2 PCIe 4.0',
                'Boîtier : Fractal Design Meshify C'
            ],
            'case_link' => 'https://www.fractal-design.com/products/cases/meshify/meshify-c/black-tg-dark-tint/',
        ],
        [
            'name' => 'Streamer Pro',
            'price' => 1599,
            'components' => [
                'Processeur : AMD Ryzen 9 9950X',
                'Carte graphique : NVIDIA GeForce RTX 5080',
                'RAM : 2 × 32 Go DDR5 6000 CL30',
                'Refroidissement : Watercooling 360mm A-RGB',
                'Carte mère : ASUS ROG Strix X870E-E Gaming WiFi',
                'Alimentation : CORSAIR RM1000x, 1000W, 80Plus Gold',
                'Stockage : 2To NVMe M.2 PCIe 4.0',
                'Boîtier : CORSAIR Frame 4000D RS ARGB'
            ],
            'case_link' => 'https://www.corsair.com/fr/fr/p/pc-cases/cc-9011296-ww/frame-4000d-rs-argb-modular-mid-tower-pc-case-cc-9011296-ww',
        ],
    ],
];

// 🔹 Meta dynamiques pour SEO
$pageTitle = "PC Gamer, Streaming et Bureautique Préconfigurés | GPX PC";
$pageDescription = "Découvrez nos PC gaming, streaming et bureautiques prêts à l’emploi, configurés pour vos besoins, avec livraison à Marseille et dans toute la France.";

include 'header.php';
?>

<main class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="p-6 text-center text-4xl sm:text-5xl font-extrabold mb-4 drop-shadow-lg">
        Nos configurations PC prêtes à l'emploi
    </h1>
    <p class="text-center max-w-2xl mx-auto text-gray-600 dark:text-gray-300 mb-10">
        Découvrez nos PC <strong>gaming</strong>, <strong>streaming</strong> et <strong>bureautiques</strong> optimisés.
        Chaque configuration est prête à l'emploi, testée et livrée partout en France.
    </p>

    <?php foreach ($pcs as $category => $list): ?>
        <h2 class="text-3xl font-bold mb-4 text-[#3857cb] dark:text-blue-400"><?= htmlspecialchars($category) ?></h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            <?php foreach ($list as $pc): ?>
                <article class="flex flex-col bg-white dark:bg-gray-800 shadow-lg rounded-xl hover:shadow-xl transition duration-300 h-full">
                    <div class="flex-1 flex flex-col p-6">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2 text-center">
                            <?= htmlspecialchars($pc['name']) ?>
                        </h3>
                        <p class="text-xl font-extrabold text-purple-600 dark:text-purple-400 mb-4 text-center">
                            <?= htmlspecialchars($pc['price']) ?> €
                        </p>
                        <ul class="list-disc list-inside pl-4 text-sm text-gray-700 dark:text-gray-300 flex-1 space-y-1 leading-snug">
                            <?php foreach ($pc['components'] as $component): ?>
                                <?php
                                if (strpos($component, 'Boîtier') !== false && !empty($pc['case_link'])):
                                    $partBoitier = htmlspecialchars($component);
                                    $link = htmlspecialchars($pc['case_link']);
                                ?>
                                    <li class="break-words">
                                        <?= $partBoitier ?>
                                        -
                                        <a href="<?= $link ?>" target="_blank" rel="noopener noreferrer" class="text-blue-600 underline hover:text-blue-800">
                                            Voir la photo officielle
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li class="break-words"><?= htmlspecialchars($component) ?></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <form action="contact.php" method="get" class="p-6 pt-0">
                        <input type="hidden" name="pc" value="<?= htmlspecialchars($pc['name']) ?>">
                        <button type="submit"
                            class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-4 rounded-lg transition">
                            Choisir ce PC
                        </button>
                    </form>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</main>

<?php include 'footer.php'; ?>