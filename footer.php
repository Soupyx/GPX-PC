<footer class="bg-black dark:bg-gray-950 text-gray-400 dark:text-gray-500 transition-colors duration-500 py-8">
  <div class="container mx-auto px-4 flex flex-col items-center gap-8 sm:flex-row sm:justify-between sm:items-center">

    <a href="/" class="block">
      <img src="logo/Logo.png" alt="Logo de GPX PC, retour à l'accueil" class="h-12 sm:h-16" />
    </a>

    <nav class="flex flex-wrap justify-center gap-6">
      <a href="/" class="hover:text-white transition-colors">Accueil</a>
      <a href="pcs.php" class="hover:text-white transition-colors">Nos configurations</a>
      <a href="reparation.php" class="hover:text-white transition-colors">Réparation & Entretien</a>
      <a href="devis.php" class="hover:text-white transition-colors">Devis</a>
      <a href="contact.php" class="hover:text-white transition-colors">Contact</a>
    </nav>

    <p class="text-xs text-gray-600 dark:text-gray-400 text-center sm:text-right">
      &copy; <?= date('Y') ?> GPX PC Services
    </p>

  </div>
</footer>