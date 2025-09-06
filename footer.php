<footer class="bg-black dark:bg-gray-950 text-gray-400 dark:text-gray-500 transition-colors duration-500 py-12">
  <div class="container mx-auto px-6 grid gap-10 sm:grid-cols-1 md:grid-cols-3">

    <!-- Colonne 1 : Logo + Contact -->
    <div class="flex flex-col items-center md:items-start gap-4">
      <a href="/" class="block hover:scale-105 transition-transform" aria-label="Retour à l'accueil">
        <img src="logo/Logo.png" alt="Logo de GPX PC" class="h-[32px] md:h-[36px] w-auto" />
      </a>
      <div class="text-sm space-y-2">
        <p>
          <a href="mailto:gpxpc13@gmail.com" class="hover:text-white transition-colors flex items-center gap-2" rel="noopener noreferrer">
            📧 <span>gpxpc13@gmail.com</span>
          </a>
        </p>
        <p>
          <a href="tel:+33652152999" class="hover:text-white transition-colors flex items-center gap-2" target="_blank" rel="noopener noreferrer">
            📞 <span>06 52 15 29 99</span>
          </a>
        </p>
      </div>
    </div>

    <!-- Colonne 2 : Navigation principale -->
    <div class="text-center md:text-left">
      <h3 class="text-white font-semibold mb-4">Navigation</h3>
      <nav class="grid grid-cols-2 gap-2">
        <?php
        $linksMain = [
          ["Accueil", "/"],
          ["Nos configurations", "pcs.php"],
          ["Réparation & Entretien", "reparation.php"],
          ["Devis", "devis.php"],
          ["Contact", "contact.php"]
        ];
        foreach ($linksMain as [$label, $url]):
        ?>
          <a href="<?= $url ?>" class="hover:text-white transition-colors"><?= $label ?></a>
        <?php endforeach; ?>
      </nav>
    </div>

    <!-- Colonne 3 : Liens légaux -->
    <div class="text-center md:text-left">
      <h3 class="text-white font-semibold mb-4">Informations légales</h3>
      <nav class="flex flex-col gap-2">
        <?php
        $linksLegal = [
          ["Mentions Légales", "mentions-legales.php"],
          ["CGV", "cgv.php"],
          ["Politique de Confidentialité", "politique_confidentialite.php"],
          ["Politique de Cookies", "politique_cookies.php"]
        ];
        foreach ($linksLegal as [$label, $url]):
        ?>
          <a href="<?= $url ?>" class="hover:text-white transition-colors" target="_blank" rel="noopener noreferrer"><?= $label ?></a>
        <?php endforeach; ?>
      </nav>
    </div>

  </div>

  <!-- Bas de page -->
  <div class="mt-10 border-t border-gray-800 pt-6 text-center text-xs text-gray-600 dark:text-gray-400">
    &copy; <?= date('Y') ?> GPX PC Services - Tous droits réservés
  </div>
</footer>

</body>

</html>