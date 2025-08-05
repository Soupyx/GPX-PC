<?php
$pageTitle = "GPX PC | Montage et Réparation PC à Marseille & Livraison Partout en France";
$pageDescription = "GPX PC assemble, répare et optimise vos PC à Marseille avec livraison partout en France. Demandez votre devis gratuit pour un PC sur-mesure !";

include 'header.php';
?>

<!-- Données structurées SEO LocalBusiness -->
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "GPX PC",
    "image": "https://tonsite.com/logo.png",
    "description": "Assemblage et réparation de PC à Marseille avec livraison dans toute la France. PC sur-mesure pour gamers et professionnels.",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Marseille",
      "addressCountry": "FR"
    },
    "url": "https://tonsite.com",
    "telephone": "+33 6 00 00 00 00"
  }
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
</style>

<main class="flex-grow bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100">

  <!-- Hero -->
  <section class="bg-gradient-to-r from-[#3857cb] to-[#2c469f] text-white text-center py-20 px-6">
    <h1 class="text-4xl sm:text-5xl font-extrabold mb-4 drop-shadow-lg">
      Ton expert PC sur mesure
    </h1>
    <p class="text-lg sm:text-xl mb-6">
      Assemblage, réparation et upgrades pour tous tes besoins informatiques.
    </p>
  </section>

  <!-- Services -->
  <section class="py-16 px-6 max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-[#3857cb] dark:text-blue-400 text-center mb-12">
      Mes services de montage et réparation PC
    </h2>
    <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">

      <!-- Bloc 1 -->
      <div class="group cursor-default bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center transform transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:border-[#3857cb] hover:bg-gray-50 dark:hover:bg-gray-700">
        <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100 transition-colors duration-300 group-hover:text-[#3857cb]">
          Assemblage PC
        </h3>
        <p class="text-gray-500 dark:text-gray-400 transition-colors duration-300 group-hover:text-gray-700 dark:group-hover:text-gray-200">
          Conception et montage selon vos besoins. Idéal pour les gamers, streamers et professionnels à la recherche de performance.
        </p>
      </div>

      <!-- Bloc 2 -->
      <div class="group cursor-default bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center transform transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:border-[#3857cb] hover:bg-gray-50 dark:hover:bg-gray-700">
        <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100 transition-colors duration-300 group-hover:text-[#3857cb]">
          Réparation & Nettoyage
        </h3>
        <p class="text-gray-500 dark:text-gray-400 transition-colors duration-300 group-hover:text-gray-700 dark:group-hover:text-gray-200">
          Diagnostic rapide, remplacement de composants défectueux et nettoyage complet pour prolonger la durée de vie de votre PC.
        </p>
      </div>

      <!-- Bloc 3 -->
      <div class="group cursor-default bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center transform transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:border-[#3857cb] hover:bg-gray-50 dark:hover:bg-gray-700">
        <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100 transition-colors duration-300 group-hover:text-[#3857cb]">
          Optimisation
        </h3>
        <p class="text-gray-500 dark:text-gray-400 transition-colors duration-300 group-hover:text-gray-700 dark:group-hover:text-gray-200">
          Améliorez les performances avec l’overclocking, l’undervolting et l’optimisation complète de votre système.
        </p>
      </div>

      <!-- Bloc 4 -->
      <div class="group cursor-default bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center transform transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:border-[#3857cb] hover:bg-gray-50 dark:hover:bg-gray-700">
        <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100 transition-colors duration-300 group-hover:text-[#3857cb]">
          Récupération de données
        </h3>
        <p class="text-gray-500 dark:text-gray-400 transition-colors duration-300 group-hover:text-gray-700 dark:group-hover:text-gray-200">
          Sauvegarde et récupération de fichiers sur HDD, SSD et clés USB, même en cas de panne système.
        </p>
      </div>

      <!-- Bloc 5 -->
      <div class="group cursor-default bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center transform transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:border-[#3857cb] hover:bg-gray-50 dark:hover:bg-gray-700">
        <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100 transition-colors duration-300 group-hover:text-[#3857cb]">
          Installation OS
        </h3>
        <p class="text-gray-500 dark:text-gray-400 transition-colors duration-300 group-hover:text-gray-700 dark:group-hover:text-gray-200">
          Installation de Windows, Linux ou autres systèmes, avec configuration personnalisée pour des performances optimales.
        </p>
      </div>

      <!-- Bloc 6 -->
      <div class="group cursor-default bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center transform transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-lg hover:border-[#3857cb] hover:bg-gray-50 dark:hover:bg-gray-700">
        <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100 transition-colors duration-300 group-hover:text-[#3857cb]">
          Installation de logiciels
        </h3>
        <p class="text-gray-500 dark:text-gray-400 transition-colors duration-300 group-hover:text-gray-700 dark:group-hover:text-gray-200">
          Configuration prête à l’emploi de Microsoft 365, Adobe Suite, outils créatifs et logiciels professionnels.
        </p>
      </div>

    </div>
  </section>

  <!-- Devis -->
  <section id="devis" class="bg-gradient-to-r from-[#3857cb] to-[#2c469f] py-16 px-6">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-3xl font-bold text-white mb-4">
        Demandez votre devis gratuit
      </h2>
      <p class="text-gray-200 mb-6">
        Décrivez votre projet et recevez une estimation personnalisée, rapide et sans engagement.
      </p>
      <a href="devis.php"
        class="group relative inline-block px-8 py-4 bg-transparent 
          border-2 border-white font-bold tracking-wide overflow-visible 
          transition-all duration-300 ease-in-out hover:bg-white hover:text-[#3857cb]">
        <span class="fly-yoyo absolute left-8 top-1/2 w-8 h-[1px] bg-white
           transform -translate-y-1/2 transition-colors duration-300 ease-in-out
           group-hover:bg-[#3857cb]"></span>
        <span class="block ml-[3em] text-[1.125em] leading-[1.3333em] uppercase
           transition-all duration-300 ease-in-out group-hover:pl-[0.7em]
           group-hover:text-[#3857cb]">
          Obtenir un devis
        </span>
      </a>
    </div>
  </section>

  <!-- À propos -->
  <section class="bg-white dark:bg-gray-800 py-16 px-6">
    <div class="max-w-3xl mx-auto text-center">
      <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">
        À propos de moi
      </h2>
      <p class="text-gray-500 dark:text-gray-400 mb-4">
        Passionné d’informatique, je construis et répare des PC depuis plus de 5 ans.
        J’aide les gamers, créateurs et professionnels à obtenir des performances optimales.
      </p>
      <p class="text-gray-500 dark:text-gray-400">
        <a href="devis.php" class="text-blue-600 hover:underline">Contactez moi </a> pour un accompagnement sur-mesure, rapide et transparent.
      </p>
    </div>
  </section>

  <!-- Call to Action Contact -->
  <section class="bg-gradient-to-r from-[#3857cb] to-[#2c469f] py-16 px-6">
    <div class="max-w-2xl mx-auto text-center">
      <h2 class="text-3xl font-bold text-white mb-4">
        Prêt à donner vie à votre projet ?
      </h2>
      <a href="contact.php"
        class="group relative inline-block px-8 py-4 bg-transparent border-2 border-white font-bold tracking-wide 
          overflow-visible transition-all duration-300 ease-in-out hover:bg-white hover:text-[#3857cb]">
        <span class="fly-yoyo absolute left-8 top-1/2 w-8 h-[1px] bg-white transform -translate-y-1/2
           transition-colors duration-300 ease-in-out group-hover:bg-[#3857cb]"></span>
        <span class="block ml-[3em] text-[1.125em] leading-[1.3333em] uppercase
           transition-all duration-300 ease-in-out group-hover:pl-[0.7em] group-hover:text-[#3857cb]">
          Me contacter
        </span>
      </a>
    </div>
  </section>
</main>

<?php include 'footer.php'; ?>