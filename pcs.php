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
            'name' => 'Gamer Essentiel',
            'price' => 799,
            'components' => [
                'Processeur : i3-12100F',
                'Carte graphique : NVIDIA GTX 1660 Super',
                'RAM : Corsair VENGEANCE (2 x 8 Go) DDR4 3600MHz C18',
                'Refroidissement : Ventirad d\'origine',
                'Carte mère : GIGABTE B760M Gaming X DDR4',
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

// Définition du titre et description pour le header
$pageTitle = "PC Gamer, Streaming et Bureautique Préconfigurés | GPX PC";
$pageDescription = "Découvrez nos PC gaming, streaming et bureautiques prêts à l’emploi, avec livraison à Marseille et dans toute la France.";

include 'header.php';
?>

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

<?php include 'footer.php'; ?>
