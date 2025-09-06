<?php
$pageTitle = "GPX PC | Montage PC sur Mesure à Marseille | Livraison France";
$pageDescription = "Expert en montage de PC sur mesure à Marseille. GPX PC assemble, répare et optimise votre ordinateur gamer ou professionnel. Livraison dans toute la France. Devis gratuit.";

include 'header.php';
?>

<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "GPX PC",
    "image": "https://gpxpc1.whf.bz/logo/Logo.png",
    "description": "Expert en montage et réparation de PC sur mesure à Marseille. Services pour PC gamer et professionnels avec livraison possible dans toute la France.",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Marseille",
      "addressCountry": "FR"
    },
    "url": "https://gpxpc1.whf.bz/",
    "telephone": "+33652152999"
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

  .cta-btn {
    display: inline-block;
    padding: 1rem 2rem;
    border: 2px solid white;
    font-weight: bold;
    text-transform: uppercase;
    transition: all 0.3s ease-in-out;
    position: relative;
  }

  .cta-btn:hover {
    background: white;
    color: #3857cb;
  }
</style>

<main class="flex-grow bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100">

  <!-- Hero -->
  <section class="bg-gradient-to-r from-[#3857cb] to-[#2c469f] text-white text-center py-20 px-6">
    <h1 class="text-4xl sm:text-5xl font-extrabold mb-4 drop-shadow-lg">
      Votre Expert en Montage PC sur Mesure à Marseille
    </h1>
    <p class="text-lg sm:text-xl mb-6">
      Assemblage, réparation et optimisation de PC gamer et professionnels, avec livraison partout en France.
    </p>
  </section>

  <!-- Services -->
  <section class="py-16 px-6 max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-[#3857cb] dark:text-blue-400 text-center mb-12">
      Mes services de montage et réparation PC
    </h2>

    <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
      <?php
      $services = [
        ["Assemblage PC", "Conception et montage selon vos besoins. Idéal pour gamers, streamers et pros."],
        ["Réparation & Nettoyage", "Diagnostic rapide, remplacement de composants défectueux et nettoyage complet."],
        ["Optimisation", "Amélioration des performances via overclocking, undervolting et tuning système."],
        ["Récupération de données", "Sauvegarde et récupération sur HDD, SSD et clés USB, même en panne système."],
        ["Installation OS", "Windows, Linux ou autres systèmes, configurés pour des performances optimales."],
        ["Installation de logiciels", "Setup de Microsoft 365, Adobe Suite et logiciels professionnels."]
      ];
      foreach ($services as [$title, $desc]):
      ?>
        <article class="group cursor-default bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg p-6 text-center transform transition-transform duration-300 hover:scale-105 hover:shadow-lg hover:border-[#3857cb] hover:bg-gray-50 dark:hover:bg-gray-700">
          <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100 transition-colors duration-300 group-hover:text-[#3857cb]"><?= $title ?></h3>
          <p class="text-gray-500 dark:text-gray-400 transition-colors duration-300 group-hover:text-gray-700 dark:group-hover:text-gray-200"><?= $desc ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Devis -->
  <section id="devis" class="bg-gradient-to-r from-[#3857cb] to-[#2c469f] py-16 px-6">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-3xl font-bold text-white mb-4">Demandez votre devis gratuit</h2>
      <p class="text-gray-200 mb-6">
        Décrivez votre projet et recevez une estimation personnalisée, rapide et sans engagement.
      </p>
      <a href="devis.php" class="cta-btn">Obtenir un devis</a>
    </div>
  </section>

  <!-- À propos -->
  <section class="bg-white dark:bg-gray-800 py-16 px-6">
    <div class="max-w-3xl mx-auto text-center">
      <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">À propos de moi</h2>
      <p class="text-gray-500 dark:text-gray-400 mb-4">
        Passionné d’informatique, je construis et répare des PC depuis plus de 5 ans. J’aide gamers, créateurs et pros à obtenir des performances optimales.
      </p>
      <p class="text-gray-500 dark:text-gray-400">
        <a href="devis.php" class="text-blue-600 hover:underline">Contactez-moi</a> pour un accompagnement sur-mesure, rapide et transparent.
      </p>
    </div>
  </section>

  <!-- Call to Action Contact -->
  <section class="bg-gradient-to-r from-[#3857cb] to-[#2c469f] py-16 px-6">
    <div class="max-w-2xl mx-auto text-center">
      <h2 class="text-3xl font-bold text-white mb-4">Prêt à donner vie à votre projet ?</h2>
      <a href="contact.php" class="cta-btn">Me contacter</a>
    </div>
  </section>

</main>

<?php include 'footer.php'; ?>