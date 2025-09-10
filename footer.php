<footer class="bg-black dark:bg-gray-950 text-gray-400 dark:text-gray-500 transition-colors duration-500 py-12">
    <div class="container mx-auto px-6 grid gap-10 sm:grid-cols-2 md:grid-cols-3 text-center">

        <div class="flex flex-col items-center gap-4 col-span-2 sm:col-span-1">
            <a href="/" class="block hover:scale-105 transition-transform" aria-label="Retour à la page d'accueil de GPX PC">
                <img src="logo/Logo.png" alt="GPX PC, expert en montage, réparation et vente de PC à Marseille" class="h-[32px] md:h-[36px] w-auto" />
            </a>
            <div class="text-sm space-y-2">
                <address class="not-italic">
                    <a href="mailto:gpxpc13@gmail.com" class="hover:text-white transition-colors flex items-center justify-center gap-2 mb-2" rel="noopener noreferrer">
                        📧 <span>gpxpc13@gmail.com</span>
                    </a>
                    <a href="tel:+33652152999" class="hover:text-white transition-colors flex items-center justify-center gap-2" rel="noopener noreferrer">
                        📞 <span>06 52 15 29 99</span>
                    </a>
                </address>
            </div>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-4">Navigation</h3>
            <nav aria-label="Liens principaux du site" class="flex flex-col gap-2 justify-items-center sm:grid sm:grid-cols-2">
                <?php
                $linksMain = [
                    ["Accueil", "/"],
                    ["Devis PC sur mesure", "devis.php"],
                    ["Configurations PC", "pcs.php"],
                    ["Réparation & Entretien", "reparation.php"],
                    ["Me contacter", "contact.php"]
                ];
                foreach ($linksMain as [$label, $url]):
                ?>
                    <a href="<?= $url ?>" class="hover:text-white transition-colors"><?= $label ?></a>
                <?php endforeach; ?>
            </nav>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-4">Suivez-nous</h3>
            <div class="flex justify-center gap-4 mb-6">
                <a href="https://www.instagram.com/gpxpc13?igsh=MXZ2NmpvOTdvZjd6dQ==" target="_blank" rel="noopener noreferrer" aria-label="TikTok de GPX PC" class="hover:scale-110 transition-transform">
                    <img src="icons/tiktok.png" alt="GPX PC sur TikTok" class="h-8 w-8">
                </a>
                <a href="https://www.youtube.com/channel/UCV75goAjI2e4kUPbgOid2xw" target="_blank" rel="noopener noreferrer" aria-label="Chaîne YouTube de GPX PC" class="hover:scale-110 transition-transform">
                    <img src="icons/youtube.png" alt="GPX PC sur Youtube" class="h-8 w-8">
                </a>
                <a href="https://www.tiktok.com/@gpxpc13?is_from_webapp=1&sender_device=pc" target="_blank" rel="noopener noreferrer" aria-label="Instagram de GPX PC" class="hover:scale-110 transition-transform">
                    <img src="icons/instagram.png" alt="GPX PC sur Instagram" class="h-8 w-8">
                </a>
            </div>
            <h3 class="text-white font-semibold mb-4 mt-6">Informations légales</h3>
            <nav aria-label="Liens d'informations légales" class="grid grid-cols-2 gap-x-6 gap-y-2 justify-items-center">
                <?php
                $linksLegal = [
                    ["Mentions Légales", "mentions_legales.php"],
                    ["CGV", "cgv.php"],
                    ["Politique de Confidentialité", "politique_confidentialite.php"],
                    ["Politique de Cookies", "politique_cookies.php"]
                ];
                foreach ($linksLegal as [$label, $url]):
                ?>
                    <a href="<?= $url ?>" class="hover:text-white transition-colors text-sm" target="_blank" rel="noopener noreferrer"><?= $label ?></a>
                <?php endforeach; ?>
            </nav>

        </div>

    </div>

    <div class="mt-10 border-t border-gray-800 pt-6 text-center text-xs text-gray-600 dark:text-gray-400">
        <p>&copy; <?= date('Y') ?> GPX PC Services - Tous droits réservés.</p>
        <p class="pl-6 pr-6">GPX PC Marseille propose l'assemblage, la réparation et l'optimisation de PC sur mesure pour gamers, professionnels et bureatique ! Avec livraison partout en France.</p>
    </div>
</footer>