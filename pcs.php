<?php
require_once __DIR__ . '/pcs_date.php';

$pageTitle = "Configurations PC Gamer, Streaming & Bureautique | GPX PC Marseille";
$pageDescription = "Découvrez nos configurations PC gamer, streaming, montage, rendu 3D, IA et bureautique. Assemblées à Marseille et livrées partout en France.";
include 'header.php';
?>

<script type="application/ld+json">
    [
        <?php
        $productsJson = [];
        $siteUrl = "https://gpxpc1.whf.bz/";

        foreach ($pcs as $category) {
            foreach ($category as $pc) {
                $productsJson[] = json_encode([
                    "@context" => "https://schema.org",
                    "@type" => "Product",
                    "name" => $pc['name'],
                    "description" => "Configuration PC " . $pc['name'] . " assemblée par GPX PC, optimisée pour la performance. Idéale pour le gaming, le streaming, le montage vidéo ou la bureautique.",
                    "image" => $siteUrl . "logo/Logo.png",
                    "sku" => "GPX-" . preg_replace('/[^A-Z0-9]/', '-', strtoupper($pc['name'])),
                    "brand" => ["@type" => "Brand", "name" => "GPX PC"],
                    "offers" => [
                        "@type" => "Offer",
                        "url" => $siteUrl . "contact.php?pc=" . urlencode($pc['name']),
                        "priceCurrency" => "EUR",
                        "price" => $pc['price'],
                        "availability" => "https://schema.org/InStock",
                        "itemCondition" => "https://schema.org/NewCondition"
                    ]
                ]);
            }
        }
        echo implode(",", $productsJson);
        ?>
    ]
</script>

<style>
    /* --- Boutons filtre --- */
    .filter-btn {
        cursor: pointer;
        transition: all 0.3s ease;
        border-radius: 9999px;
        padding: 0.6rem 1.2rem;
    }

    .filter-btn.active {
        font-weight: bold;
        background: linear-gradient(90deg, #4f46e5, #3b82f6);
        color: white !important;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
    }

    /* --- Animation flottante --- */
    @keyframes floatY {
        0% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-0.4em);
        }

        100% {
            transform: translateY(0);
        }
    }

    /* --- Cartes --- */
    .pc-card {
        opacity: 0;
        transform: translateY(40px);
        transition: transform 0.6s ease, opacity 0.6s ease;
        pointer-events: none;
    }

    .pc-card.show {
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
        animation: floatY 3s ease-in-out infinite;
    }

    /* --- Toggle détails --- */
    .details-content {
        transition: max-height 0.7s ease, opacity 0.7s ease;
    }

    /* --- Transition catégories --- */
    .pc-category {
        overflow: hidden;
        max-height: 0;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.5s ease;
    }

    .pc-category.show-category {
        max-height: 5000px;
        opacity: 1;
        transform: translateY(0);
    }
</style>

<main class="px-4 sm:px-8 py-16 bg-gray-50 dark:bg-gray-900 transition-colors duration-500">

    <h1 class="text-center text-4xl sm:text-5xl font-extrabold mb-8 text-gray-900 dark:text-white drop-shadow-lg">
        Nos Configurations PC Gamer, Pro et Bureautique
    </h1>

    <div class="max-w-3xl mx-auto mb-10 bg-white dark:bg-gray-800 rounded-xl shadow p-4 flex items-center justify-center gap-3 text-gray-700 dark:text-gray-300 text-sm">
        <span class="text-blue-500 text-lg">🔍</span>
        <span><strong>Prix indicatif</strong> – basé sur le coût fournisseur du jour</span>
        <span class="bg-blue-100 text-blue-600 px-2 py-0.5 rounded-full text-xs font-medium">À voir sur le devis</span>
    </div>

    <div class="flex flex-wrap justify-center gap-3 mb-8">
        <button class="filter-btn active" data-category="all">Tout</button>
        <?php foreach ($pcs as $category => $configs): ?>
            <button class="filter-btn" data-category="<?= htmlspecialchars($category) ?>"><?= htmlspecialchars($category) ?></button>
        <?php endforeach; ?>
    </div>

    <div class="max-w-xl mx-auto mb-12">
        <input type="text" id="searchInput" placeholder="Rechercher un PC ou composant..."
            class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white" />
    </div>

    <div id="pcsContainer">
        <?php foreach ($pcs as $category => $configs): ?>
            <section class="pt-4 pc-category show-category" data-category="<?= htmlspecialchars($category) ?>">
                <h2 class="text-2xl mt-6 sm:text-3xl font-bold text-gray-800 dark:text-white mb-10 text-center">Nos configurations <?= htmlspecialchars($category) ?></h2>
                <div class="grid gap-8 mx-auto px-4 items-start sm:grid-cols-2 lg:grid-cols-3">
                    <?php foreach ($configs as $config): ?>
                        <div class="pc-card bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6 lg:p-8 flex flex-col h-auto hide"
                            data-name="<?= strtolower($config['name']) ?>"
                            data-components="<?= strtolower(implode(' ', $config['components'])) ?>">

                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2 flex items-center justify-between">
                                <?= htmlspecialchars($config['name']) ?>
                                <?php if (!empty($config['case_link'])): ?>
                                    <a href="<?= htmlspecialchars($config['case_link']) ?>" target="_blank" class="ml-3 px-3 py-1 text-sm bg-blue-100 text-blue-600 hover:bg-blue-200 hover:text-blue-700 font-medium rounded-lg transition">Voir le boîtier</a>
                                <?php endif; ?>
                            </h3>

                            <p class="text-2xl font-bold text-blue-600 mb-4 flex items-center gap-2">
                                <?= number_format($config['price'], 2, ',', ' ') ?> €
                                <span class="text-xs font-medium bg-yellow-100 text-yellow-800 px-2 py-0.5 rounded-full"
                                    title="Le prix est basé sur le coût fournisseur du jour et peut varier."
                                    style="cursor: default;">
                                    Prix indicatif
                                </span>
                            </p>

                            <p class="font-semibold text-gray-900 dark:text-white">Résumé :</p>
                            <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 mb-4 space-y-1">
                                <?php foreach ($config['main_specs'] as $spec): ?>
                                    <li><?= htmlspecialchars($spec) ?></li>
                                <?php endforeach; ?>
                                <?php if (!empty($config['case_name'])): ?>
                                    <li>Boîtier : <?= htmlspecialchars($config['case_name']) ?></li>
                                <?php endif; ?>
                            </ul>

                            <button class="toggle-btn px-4 py-2 border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white font-medium rounded-lg transition flex items-center gap-2 mb-4">
                                <span>En savoir plus</span><span class="icon">+</span>
                            </button>

                            <div class="details-content hidden overflow-hidden max-h-0 opacity-0 text-gray-700 dark:text-gray-300 mb-4">
                                <p class="font-semibold text-gray-900 dark:text-white mb-2">Détails complets :</p>
                                <ul class="list-disc list-inside space-y-1">
                                    <?php foreach ($config['components'] as $comp): ?>
                                        <li><?= htmlspecialchars($comp) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <a href="contact.php?pc=<?= urlencode($config['name']) ?>" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-extrabold text-lg rounded-xl text-center shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl mt-auto">
                                Choisir ce PC
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </div>
</main>

<?php include 'footer.php'; ?>

<script>
    // --- Normalisation du texte ---
    function normalizeText(text) {
        return text.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    }

    // --- Stockage des catégories + pré-normalisation ---
    const allCategories = {};
    document.querySelectorAll(".pc-category").forEach(section => {
        const cards = Array.from(section.querySelectorAll(".pc-card"));
        cards.forEach(card => {
            card.dataset.nameNormalized = normalizeText(card.dataset.name);
            card.dataset.componentsNormalized = normalizeText(card.dataset.components);
        });
        allCategories[section.dataset.category] = {
            section,
            cards
        };
    });

    // --- Précompilation des regex pour mots exacts ---
    const exactWords = ["i3", "i5", "i7", "i9", "ryzen 3", "ryzen 5", "ryzen 7", "ryzen 9", "rx 7800", "rx 9070", "rx 7900", "rtx 5080", "rtx 5070"];
    const exactRegexMap = exactWords.reduce((map, word) => {
        map[word] = new RegExp(`\\b${word}\\b`, 'i');
        return map;
    }, {});

    // --- Toggle détails ---
    function toggleDetails(button) {
        const content = button.nextElementSibling;
        if (!content) return;

        const isHidden = content.classList.contains('hidden');
        if (isHidden) {
            content.classList.remove('hidden');
            const height = content.scrollHeight;
            content.style.maxHeight = "0px";
            content.style.opacity = 0;
            requestAnimationFrame(() => {
                content.style.transition = "max-height 0.7s ease, opacity 0.7s ease";
                content.style.maxHeight = height + "px";
                content.style.opacity = 1;
            });
        } else {
            const height = content.scrollHeight;
            content.style.maxHeight = height + "px";
            content.style.opacity = 1;
            requestAnimationFrame(() => {
                content.style.transition = "max-height 0.7s ease, opacity 0.7s ease";
                content.style.maxHeight = "0px";
                content.style.opacity = 0;
            });
            setTimeout(() => content.classList.add('hidden'), 700);
        }
    }

    function attachToggleEvents() {
        document.querySelectorAll(".toggle-btn").forEach(btn => {
            btn.removeEventListener("click", btn._toggleHandler);
            btn._toggleHandler = () => toggleDetails(btn);
            btn.addEventListener("click", btn._toggleHandler);
        });
    }

    // --- Mise à jour de l'affichage ---
    function updateDisplay() {
        const searchInputRaw = document.getElementById("searchInput").value.trim();
        const searchWords = normalizeText(searchInputRaw).split(/\s+/).filter(w => w.length > 0);
        const activeCategory = document.querySelector(".filter-btn.active")?.dataset.category || 'all';
        let visibleCount = 0;

        Object.keys(allCategories).forEach(categoryName => {
            const {
                section,
                cards
            } = allCategories[categoryName];
            const matchedCards = cards.filter(card => {
                const name = card.dataset.nameNormalized;
                const comps = card.dataset.componentsNormalized;

                let matchesSearch = searchWords.length === 0;
                if (!matchesSearch) {
                    matchesSearch = searchWords.every(word => {
                        if (exactRegexMap[word]) {
                            return exactRegexMap[word].test(name) || exactRegexMap[word].test(comps);
                        } else {
                            return name.includes(word) || comps.includes(word);
                        }
                    });
                }
                const matchesCategory = (activeCategory === 'all' || categoryName === activeCategory);

                if (matchesSearch && matchesCategory) {
                    card.classList.add("show");
                    visibleCount++;
                    return true;
                } else {
                    card.classList.remove("show");
                    return false;
                }
            });

            const grid = section.querySelector(".grid");
            const fragment = document.createDocumentFragment();
            matchedCards.forEach(card => fragment.appendChild(card));
            grid.innerHTML = "";
            grid.appendChild(fragment);

            section.style.display = matchedCards.length > 0 ? 'block' : 'none';
        });

        // Message "aucun résultat"
        const container = document.getElementById('pcsContainer');
        let noResultsMsg = document.getElementById('noResultsMessage');
        if (visibleCount === 0) {
            if (!noResultsMsg) {
                noResultsMsg = document.createElement('p');
                noResultsMsg.id = 'noResultsMessage';
                noResultsMsg.textContent = 'Aucun PC ne correspond à votre recherche.';
                noResultsMsg.className = 'text-center text-gray-500 mt-8';
                container.appendChild(noResultsMsg);
            }
        } else if (noResultsMsg) {
            noResultsMsg.remove();
        }

        attachToggleEvents();
    }

    // --- Events ---
    document.getElementById("searchInput").addEventListener("input", updateDisplay);
    document.querySelectorAll(".filter-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            document.querySelectorAll(".filter-btn").forEach(b => b.classList.remove("active"));
            btn.classList.add("active");
            document.querySelectorAll(".pc-category").forEach(section => {
                if (btn.dataset.category === 'all' || section.dataset.category === btn.dataset.category) {
                    section.classList.add('show-category');
                } else {
                    section.classList.remove('show-category');
                }
            });
            updateDisplay();
        });
    });

    document.addEventListener("DOMContentLoaded", () => {
        updateDisplay();
        attachToggleEvents();
    });
</script>