<?php
$pageTitle = "GPX PC | Montage et Réparation PC à Marseille & Livraison Partout en France";
$pageDescription = "GPX PC assemble, répare et optimise vos PC à Marseille avec livraison partout en France. Configuration sur-mesure pour gamers, streamer et professionnels";

include 'header.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" sizes="32x32" href="logo/Logo.png" />
  <link rel="apple-touch-icon" href="logo/Logo.png" />

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
    };
  </script>
  <title>GPX PC | Montage et Réparation PC à Marseille & Livraison Partout en France</title>
  <meta name="description" content="GPX PC assemble, répare et optimise vos PC à Marseille avec livraison partout en France. Configuration sur-mesure pour gamers, streamer et professionnels.">
  <style>
    html,
    body {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow-y: scroll;
      /* force scrollbar verticale même si pas nécessaire */
    }
  </style>
</head>

<body
  class="flex flex-col min-h-screen bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 transition-colors duration-500">
  <!-- Main -->
  <main
    class="flex-grow bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100">
    <!-- Hero -->
    <section
      class="bg-gradient-to-r from-[#3857cb] to-[#2c469f] text-white text-center py-20 px-6">
      <h2 class="text-4xl sm:text-5xl font-extrabold mb-4 drop-shadow-lg">
        Ton expert PC sur mesure
      </h2>
      <p class="text-lg sm:text-xl mb-6">
        Assemblage, réparation et upgrades pour tous tes besoins
        informatiques.
      </p>
    </section>

    <!-- Services -->
    <section class="py-16 px-6 max-w-6xl mx-auto">
      <h3
        class="text-3xl font-bold text-[#3857cb] dark:text-blue-400 text-center mb-12">
        Mes services
      </h3>
      <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
        <!-- Bloc 1 -->
        <div
          class="group cursor-default bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center transform transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:border-[#3857cb] hover:bg-gray-50 dark:hover:bg-gray-700">
          <h4
            class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100 transition-colors duration-300 group-hover:text-[#3857cb]">
            Assemblage PC
          </h4>
          <p
            class="text-gray-500 dark:text-gray-400 transition-colors duration-300 group-hover:text-gray-700 dark:group-hover:text-gray-200">
            Conception et montage selon vos besoins.
          </p>
        </div>

        <!-- Bloc 2 -->
        <div
          class="group cursor-default bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center transform transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:border-[#3857cb] hover:bg-gray-50 dark:hover:bg-gray-700">
          <h4
            class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100 transition-colors duration-300 group-hover:text-[#3857cb]">
            Réparation & Nettoyage
          </h4>
          <p
            class="text-gray-500 dark:text-gray-400 transition-colors duration-300 group-hover:text-gray-700 dark:group-hover:text-gray-200">
            Diagnostic et remplacement de composants.
          </p>
        </div>

        <!-- Bloc 3 -->
        <div
          class="group cursor-default bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center transform transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:border-[#3857cb] hover:bg-gray-50 dark:hover:bg-gray-700">
          <h4
            class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100 transition-colors duration-300 group-hover:text-[#3857cb]">
            Optimisation
          </h4>
          <p
            class="text-gray-500 dark:text-gray-400 transition-colors duration-300 group-hover:text-gray-700 dark:group-hover:text-gray-200">
            Overclocking, undervolting et optimisation global du système.
          </p>
        </div>

        <!-- Bloc 4 -->
        <div
          class="group cursor-default bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center transform transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:border-[#3857cb] hover:bg-gray-50 dark:hover:bg-gray-700">
          <h4
            class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100 transition-colors duration-300 group-hover:text-[#3857cb]">
            Récupération de données
          </h4>
          <p
            class="text-gray-500 dark:text-gray-400 transition-colors duration-300 group-hover:text-gray-700 dark:group-hover:text-gray-200">
            Sauvegarde de fichiers sur HDD, SSD, clés USB.
          </p>
        </div>

        <!-- Bloc 5 -->
        <div
          class="group cursor-default bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center transform transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:border-[#3857cb] hover:bg-gray-50 dark:hover:bg-gray-700">
          <h4
            class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100 transition-colors duration-300 group-hover:text-[#3857cb]">
            Installation OS
          </h4>
          <p
            class="text-gray-500 dark:text-gray-400 transition-colors duration-300 group-hover:text-gray-700 dark:group-hover:text-gray-200">
            Windows, Linux ou autre, configuré sur mesure.
          </p>
        </div>

        <!-- Bloc 6 -->
        <div
          class="group cursor-default bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center transform transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:border-[#3857cb] hover:bg-gray-50 dark:hover:bg-gray-700">
          <h4
            class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100 transition-colors duration-300 group-hover:text-[#3857cb]">
            Installation de logiciels
          </h4>
          <p
            class="text-gray-500 dark:text-gray-400 transition-colors duration-300 group-hover:text-gray-700 dark:group-hover:text-gray-200">
            Microsoft 365, Suite Adobe, etc.. prêts à l’emploi.
          </p>
        </div>
      </div>
    </section>

    <!-- Devis -->
    <section
      id="devis"
      class="bg-gradient-to-r from-[#3857cb] to-[#2c469f] py-16 px-6">
      <div class="max-w-4xl mx-auto text-center">
        <h3 class="text-3xl font-bold text-white mb-4">
          Demandez votre devis gratuit
        </h3>
        <p class="text-gray-200 mb-6">
          Décrivez votre projet et recevez une estimation personnalisée,
          rapide et sans engagement.
        </p>
        <a
          href="devis.php"
          class="group relative inline-block px-8 py-4 bg-transparent border-2 border-white font-bold tracking-wide overflow-visible transition-all duration-300 ease-in-out hover:bg-white hover:text-[#3857cb]">
          <span
            class="absolute top-[-2px] left-[0.625rem] h-[2px] w-[1.5625rem] bg-gray-200 transition-all duration-500 ease-out group-hover:left-[-2px] group-hover:w-0"></span>
          <span
            class="absolute top-1/2 left-[1.5rem] -translate-y-1/2 h-[2px] w-[1.5625rem] bg-black transition-all duration-300 ease-linear group-hover:w-[0.9375rem] group-hover:bg-white"></span>
          <span
            class="block ml-[2em] text-[1.125em] leading-[1.3333em] uppercase transition-all duration-300 ease-in-out group-hover:pl-[1.5em] group-hover:text-[#3857cb]">
            Obtenir un devis
          </span>
          <span
            class="absolute bottom-[-2px] right-[1.875rem] h-[2px] w-[1.5625rem] bg-gray-200 transition-all duration-500 ease-out group-hover:right-0 group-hover:w-0"></span>
          <span
            class="absolute bottom-[-2px] right-[0.625rem] h-[2px] w-[0.625rem] bg-gray-200 transition-all duration-500 ease-out group-hover:right-0 group-hover:w-0"></span>
        </a>
      </div>
    </section>

    <!-- À propos -->
    <section class="bg-white dark:bg-gray-800 py-16 px-6">
      <div class="max-w-3xl mx-auto text-center">
        <h3 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">
          À propos de moi
        </h3>
        <p class="text-gray-500 dark:text-gray-400 mb-4">
          Passionné d’informatique, je construis et répare des PC depuis plus
          de 5 ans.
        </p>
        <p class="text-gray-500 dark:text-gray-400">
          Gamer, créateur ou pro, je t’accompagne avec un service sur-mesure,
          transparent et rapide.
        </p>
      </div>
    </section>

    <section
      id="devis"
      class="bg-gradient-to-r from-[#3857cb] to-[#2c469f] py-16 px-6">
      <div class="max-w-2xl mx-auto text-center">
        <h3 class="text-3xl font-bold text-white mb-4">
          Prêt à donner vie à votre projet ?
        </h3>
        <a
          href="contact.php"
          class="group relative inline-block px-8 py-4 bg-transparent border-2 border-white font-bold tracking-wide overflow-visible transition-all duration-300 ease-in-out hover:bg-white hover:text-[#3857cb]">
          <span
            class="absolute top-[-2px] left-[0.625rem] h-[2px] w-[1.5625rem] bg-gray-200 transition-all duration-500 ease-out group-hover:left-[-2px] group-hover:w-0"></span>
          <span
            class="absolute top-1/2 left-[1.5rem] -translate-y-1/2 h-[2px] w-[1.5625rem] bg-black transition-all duration-300 ease-linear group-hover:w-[0.9375rem] group-hover:bg-white"></span>
          <span
            class="block ml-[2em] text-[1.125em] leading-[1.3333em] uppercase transition-all duration-300 ease-in-out group-hover:pl-[1.5em] group-hover:text-[#3857cb]">
            Me contacter
          </span>
          <span
            class="absolute bottom-[-2px] right-[1.875rem] h-[2px] w-[1.5625rem] bg-gray-200 transition-all duration-500 ease-out group-hover:right-0 group-hover:w-0"></span>
          <span
            class="absolute bottom-[-2px] right-[0.625rem] h-[2px] w-[0.625rem] bg-gray-200 transition-all duration-500 ease-out group-hover:right-0 group-hover:w-0"></span>
        </a>
      </div>
    </section>
  </main>
  <?php include 'footer.php'; ?>
</body>

<script>
  (function() {
    const toggles = document.querySelectorAll('.dark-toggle');
    const root = document.documentElement;

    function applyDark(on) {
      root.classList.toggle('dark', on);
      toggles.forEach(cb => cb.checked = on);
      localStorage.theme = on ? 'dark' : 'light';
    }

    const stored = localStorage.theme;
    const prefer = window.matchMedia('(prefers-color-scheme: dark)').matches;
    const useDark = stored === undefined ? prefer : stored === 'dark';
    applyDark(useDark);

    toggles.forEach(cb =>
      cb.addEventListener('change', () => applyDark(cb.checked))
    );

    // Burger logic
    const btn = document.querySelector('.gpx-header__toggle');
    const menu = document.getElementById('gpx-header__menu');
    const openI = document.querySelector('.gpx-header__icon-open');
    const closeI = document.querySelector('.gpx-header__icon-close');

    btn.addEventListener('click', () => {
      const exp = btn.getAttribute('aria-expanded') === 'true';
      btn.setAttribute('aria-expanded', String(!exp));
      menu.classList.toggle('scale-y-0');
      menu.classList.toggle('scale-y-100');
      openI.classList.toggle('hidden');
      closeI.classList.toggle('hidden');
    });
  })();
</script>

</html>