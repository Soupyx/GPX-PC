<?php
require_once __DIR__ . '/config.php';

$pageTitle = "Devis Gratuit PC sur Mesure | GPX PC Marseille";
$pageDescription = "Obtenez votre devis gratuit pour un PC sur-mesure. GPX PC, votre monteur de PC à Marseille, conçoit la configuration parfaite pour vos besoins (gamer, pro) et livre en France.";
include 'header.php';
?>

<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "GPX PC",
    "image": "https://gpxpc1.whf.bz/logo/Logo.png",
    "telephone": "+33652152999",
    "url": "https://gpxpc1.whf.bz/devis.php",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Marseille",
      "addressCountry": "FR"
    },
    "description": "Demandez un devis gratuit pour le montage de votre PC sur mesure et des services informatiques à Marseille.",
    "hasOfferCatalog": {
      "@type": "OfferCatalog",
      "name": "Services pour PC sur mesure",
      "itemListElement": [{
          "@type": "Service",
          "name": "Assemblage des composants PC",
          "description": "Service professionnel d'assemblage de tous vos composants PC pour une configuration stable et performante.",
          "offers": {
            "@type": "Offer",
            "price": "50",
            "priceCurrency": "EUR"
          }
        },
        {
          "@type": "Service",
          "name": "Installation du système d’exploitation",
          "description": "Installation et configuration de Windows ou Linux sur votre nouvelle machine.",
          "offers": {
            "@type": "Offer",
            "price": "20",
            "priceCurrency": "EUR"
          }
        },
        {
          "@type": "Service",
          "name": "Optimisation pour le gaming",
          "description": "Configuration avancée du système et des pilotes pour des performances de jeu maximales.",
          "offers": {
            "@type": "Offer",
            "price": "15",
            "priceCurrency": "EUR"
          }
        }
      ]
    }
  }
</script>

<main class="flex-grow bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-200">

  <section class="py-16 px-6 bg-gray-100 dark:bg-gray-900">
    <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 shadow-lg rounded-lg overflow-hidden">

      <!-- En-tête -->
      <div class="px-8 py-12 text-center">
        <h1 class="text-4xl sm:text-5xl font-extrabold text-[#3857cb] dark:text-blue-400 mb-4 drop-shadow-lg">
          Devis pour votre PC sur Mesure
        </h1>
        <p class="text-lg sm:text-xl pt-4 text-gray-500 dark:text-gray-400">
          Remplissez ce formulaire pour recevoir une estimation gratuite et personnalisée pour le <strong>montage de votre PC sur-mesure</strong>.
          Service d'assemblage, optimisation et livraison partout en France depuis <strong>Marseille</strong>.
        </p>
      </div>

      <!-- Formulaire -->
      <div class="px-8">
        <form id="devisForm" action="send.php" method="POST" novalidate class="space-y-6">

          <!-- Prénom & Nom -->
          <div>
            <label for="name" class="block text-gray-800 dark:text-gray-300 mb-1">Prénom et Nom *</label>
            <input type="text" id="name" name="name" placeholder="Nicolas Guinet" required autocomplete="name"
              class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500
                     border border-gray-300 dark:border-gray-700 rounded-md px-4 py-2
                     focus:outline-none focus:ring-2 focus:ring-green-400 transition-colors" />
          </div>

          <!-- E-mail -->
          <div>
            <label for="email" class="block text-gray-800 dark:text-gray-300 mb-1">E-mail *</label>
            <input type="email" id="email" name="email" placeholder="exemple@gmail.com" required autocomplete="email"
              class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500
                     border border-gray-300 dark:border-gray-700 rounded-md px-4 py-2
                     focus:outline-none focus:ring-2 focus:ring-green-400 transition-colors" />
          </div>

          <!-- Téléphone -->
          <div>
            <label for="phone" class="block text-gray-800 dark:text-gray-300 mb-1">Téléphone (optionnel)</label>
            <input type="tel" id="phone" name="phone" placeholder="06 12 34 56 78"
              class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500
                     border border-gray-300 dark:border-gray-700 rounded-md px-4 py-2
                     focus:outline-none focus:ring-2 focus:ring-green-400 transition-colors" />
          </div>

          <!-- Budget -->
          <div>
            <label for="budget" class="block text-gray-800 dark:text-gray-300 mb-1">Budget du PC (hors services) *</label>
            <div class="relative inline-block">
              <input type="number" id="budget" name="budget" placeholder="0" min="1" required
                class="w-32 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500
                       border border-gray-300 dark:border-gray-700 rounded-md pl-3 pr-8 py-2
                       focus:outline-none focus:ring-2 focus:ring-green-400 transition-colors" />
              <span class="absolute inset-y-0 right-2 flex items-center text-gray-500 dark:text-gray-400">€</span>
            </div>
          </div>

          <!-- Détails du projet -->
          <div>
            <label for="details" class="block text-gray-800 dark:text-gray-300 mb-1">Détails du projet *</label>
            <textarea id="details" name="details" rows="5" placeholder="Décrivez votre projet : type d’usage, préférences, composants souhaités…" required
              class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500
                     border border-gray-300 dark:border-gray-700 rounded-md px-4 py-2
                     focus:outline-none focus:ring-2 focus:ring-green-400 transition-colors"></textarea>
          </div>

          <!-- Services souhaités -->
          <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Services supplémentaires</h2>
          <div class="space-y-1">
            <?php
            $services = [
              ["Choix des composants PC", 30],
              ["Assemblage des composants PC", 50],
              ["Installation du système d’exploitation", 20],
              ["Office 2024 prêt installé (Word, Powerpoint...)", 35],
              ["Suite Adobe prêt installé, Licence 1 an (Photoshop, Illustrator…)", 150],
              ["Optimisation pour le gaming", 15],
              ["Overclocking & Undervolting GPU", 25],
              ["Overclocking CPU (Si le modèle convient)", 25],
            ];
            foreach ($services as [$label, $price]):
              $id = preg_replace('/[^a-z0-9]/i', '_', strtolower($label));
              if ($label === "Installation du système d’exploitation") {
                $id = "installation_os"; // 🔹 ID fixe
              }
            ?>
              <label class="flex items-center justify-between py-1 px-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                <div class="flex items-center gap-2">
                  <input type="checkbox" name="services[]" id="<?= $id ?>" value="<?= htmlspecialchars($label) ?>"
                    class="form-checkbox h-5 w-5 text-green-400 bg-white dark:bg-gray-900
                                border-gray-300 dark:border-gray-700 rounded transition-colors" />
                  <span class="text-gray-900 dark:text-gray-200"><?= $label ?></span>
                </div>
                <span class="text-gray-500 dark:text-gray-400 min-w-[60px] text-right"><?= $price ?> €</span>
              </label>

              <?php if ($label === "Installation du système d’exploitation"): ?>
                <div id="osSelect" class="hidden ml-8 mt-2">
                  <label for="os_choice" class="block text-gray-800 dark:text-gray-300 mb-1">Choisir un OS :</label>
                  <select name="os_choice" id="os_choice"
                    class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200
                           border border-gray-300 dark:border-gray-700 rounded-md px-3 py-2
                           focus:outline-none focus:ring-2 focus:ring-green-400 transition-colors">
                    <option value="">-- Sélectionnez --</option>
                    <option value="Windows 10">Windows 10</option>
                    <option value="Windows 11">Windows 11</option>
                    <option value="Ubuntu Linux">Ubuntu Linux</option>
                    <option value="Autre">Autre</option>
                  </select>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>

          <!-- Champs cachés -->
          <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
          <input type="hidden" name="formType" value="devis">
          <div class="g-recaptcha pt-4" data-sitekey="<?= RECAPTCHA_SITE_KEY; ?>"></div>

          <!-- Bouton d’envoi -->
          <div class="flex justify-center">
            <button type="submit" id="sendBtn"
              class="m-4 relative overflow-hidden flex items-center
                     bg-gradient-to-r from-[#3857cb] to-[#2c469f] text-white
                     font-sans text-[20px] px-4 py-2 pl-[0.9em] rounded-[16px]
                     transition-all duration-200 active:scale-[0.95] cursor-pointer group">
              <div id="btnContent" class="flex items-center transition-opacity duration-200">
                <div class="relative w-6 h-6 mr-[0.3em]">
                  <div class="w-full h-full animate-[fly_0.6s_ease-in-out_infinite_alternate]
                              group-hover:animate-[fly_0.6s_ease-in-out_infinite_alternate]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                      class="transition-transform duration-300 group-hover:translate-x-[1.2em] group-hover:rotate-[45deg] group-hover:scale-[1.1]">
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path fill="currentColor"
                        d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z" />
                    </svg>
                  </div>
                </div>
                <span id="btnText" class="block ml-[0.3em] transition-all duration-300 ease-in-out group-hover:translate-x-[5em]">
                  Envoyer
                </span>
              </div>
              <svg id="btnLoader" class="hidden absolute inset-0 mx-auto my-auto w-6 h-6 text-white animate-spin"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 00-8 8h4z"></path>
              </svg>
            </button>
          </div>

          <!-- Message de réponse -->
          <div id="responseMessage" aria-live="polite" class="text-center font-medium mb-6"></div>

        </form>
      </div>

    </div>
  </section>
</main>

<?php include 'footer.php'; ?>

<script>
  // 🔹 Affiche ou masque simplement le choix de l'OS
  document.addEventListener("DOMContentLoaded", () => {
    const osCheckbox = document.getElementById("installation_os");
    const osSelect = document.getElementById("osSelect");

    osCheckbox?.addEventListener("change", () => {
      osSelect.classList.toggle("hidden", !osCheckbox.checked);
    });
  });

  // 🔹 Soumission AJAX du formulaire
  document.getElementById("devisForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    // Loader bouton
    document.getElementById("btnContent").style.opacity = "0.5";
    document.getElementById("btnLoader").classList.remove("hidden");

    fetch(form.action, {
        method: "POST",
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        // Reset bouton
        document.getElementById("btnContent").style.opacity = "1";
        document.getElementById("btnLoader").classList.add("hidden");

        const msg = document.getElementById("responseMessage");
        if (data.status === "success") {
          msg.textContent = "✅ " + data.message;
          msg.className = "text-center font-medium mb-6 text-green-600 dark:text-green-400";
          form.reset();
          grecaptcha.reset();
          document.getElementById("osSelect").classList.add("hidden");
        } else {
          msg.textContent = "❌ " + data.message;
          msg.className = "text-center font-medium mb-6 text-red-600 dark:text-red-400";
        }
      })
      .catch(() => {
        document.getElementById("btnContent").style.opacity = "1";
        document.getElementById("btnLoader").classList.add("hidden");

        const msg = document.getElementById("responseMessage");
        msg.textContent = "❌ Erreur réseau. Veuillez réessayer.";
        msg.className = "text-center font-medium mb-6 text-red-600 dark:text-red-400";
      });
  });
</script>