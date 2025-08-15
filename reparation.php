<?php
$pageTitle = "Réparation et Dépannage PC à Marseille | GPX PC | Récupération de Données";
$pageDescription = "Service de réparation, dépannage et entretien de PC à Marseille. GPX PC prend en charge le nettoyage, l'optimisation, le changement de composants et la récupération de données sur disque dur.";
include 'header.php';
?>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "GPX PC",
    "image": "https://gpxpc1.whf.bz/logo/Logo.png",
    "telephone": "+33652152999",
    "url": "https://gpxpc1.whf.bz/reparation.php",
    "address": {
        "@type": "PostalAddress",
        "addressLocality": "Marseille",
        "addressCountry": "FR"
    },
    "areaServed": {
        "@type": "Place",
        "name": "France"
    },
    "description": "GPX PC offre des services experts de réparation, maintenance et optimisation d'ordinateurs à Marseille.",
    "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Services de réparation et maintenance PC",
        "itemListElement": [
            {
                "@type": "Service",
                "name": "Nettoyage complet et dépoussiérage PC",
                "description": "Service de nettoyage interne complet pour ordinateurs fixes et portables afin d'améliorer le refroidissement et la longévité des composants.",
                "provider": {
                    "@type": "LocalBusiness",
                    "name": "GPX PC"
                }
            },
            {
                "@type": "Service",
                "name": "Changement et mise à niveau de composants",
                "description": "Remplacement ou ajout de composants pour améliorer votre PC : installation de SSD, augmentation de la mémoire RAM, changement de carte graphique (GPU) ou d'alimentation.",
                "provider": {
                    "@type": "LocalBusiness",
                    "name": "GPX PC"
                }
            },
            {
                "@type": "Service",
                "name": "Réinstallation et optimisation de système (Windows/Linux)",
                "description": "Réinstallation propre de votre système d'exploitation (Windows ou Linux) avec configuration des pilotes et optimisation pour une vitesse et une stabilité maximales.",
                "provider": {
                    "@type": "LocalBusiness",
                    "name": "GPX PC"
                }
            },
            {
                "@type": "Service",
                "name": "Récupération de données",
                "description": "Tentative de récupération de données perdues ou inaccessibles sur disques durs (HDD), SSD et autres supports de stockage.",
                "provider": {
                    "@type":"LocalBusiness",
                    "name": "GPX PC"
                }
            }
        ]
    }
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

<main class="flex-grow bg-gray-50 dark:bg-gray-900 transition-colors duration-500">
  <section class="py-16 px-6">
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 shadow-lg rounded-lg overflow-hidden transition-colors duration-500">

      <!-- En-tête -->
      <div class="px-8 py-12 text-center">
        <h1 class="text-4xl sm:text-5xl font-extrabold text-[#3857cb] dark:text-blue-400 mb-4 drop-shadow-lg">
          Réparation et Entretien de PC à Marseille
        </h1>
        <p class="text-lg sm:text-xl text-gray-500 dark:text-gray-400 max-w-xl mx-auto">
          Un problème avec votre ordinateur ? Demandez un service de <strong>réparation</strong>, <strong>nettoyage</strong>, <strong>optimisation</strong>, ou de <strong>récupération de données</strong>.
          Intervention à <strong>Marseille</strong> et services pour toute la France.
        </p>
      </div>

      <!-- Formulaire -->
      <div class="px-6 pb-2">
        <form id="reparationForm" action="send.php" method="POST" novalidate class="space-y-6" aria-label="Formulaire de demande de réparation PC">

          <!-- Nom -->
          <div>
            <label for="name" class="block text-gray-700 dark:text-gray-300 mb-1">Nom complet</label>
            <input
              type="text"
              id="name"
              name="name"
              placeholder="Ton nom complet"
              required
              autocomplete="name"
              class="w-full bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500 border border-gray-300 dark:border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#3857cb] dark:focus:ring-blue-400 transition-colors" />
          </div>

          <!-- Email -->
          <div>
            <label for="email" class="block text-gray-700 dark:text-gray-300 mb-1">Email</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="exemple@mail.com"
              required
              autocomplete="email"
              class="w-full bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500 border border-gray-300 dark:border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#3857cb] dark:focus:ring-blue-400 transition-colors" />
          </div>

          <!-- Type de PC -->
          <div>
            <label class="block text-gray-700 dark:text-gray-300 mb-1">Type de PC</label>
            <select
              id="pc_type"
              name="pc_type"
              required
              class="w-full bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 border border-gray-300 dark:border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#3857cb] dark:focus:ring-blue-400 transition-colors">
              <option value="">-- Sélectionne --</option>
              <option value="PC Fixe">PC Fixe</option>
              <option value="PC Portable">PC Portable</option>
            </select>
            <p id="portableWarning" class="hidden mt-2 text-sm text-yellow-600 dark:text-yellow-400">
              ⚠️ Pour les PC portables, seules les interventions logicielles, nettoyages légers et réparations simples sont proposées.
            </p>
          </div>

          <!-- Urgence -->
          <div>
            <label for="urgency" class="block text-gray-700 dark:text-gray-300 mb-1">Urgence de la réparation</label>
            <select
              id="urgency"
              name="urgency"
              required
              class="w-full bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 border border-gray-300 dark:border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#3857cb] dark:focus:ring-blue-400 transition-colors">
              <option value="">-- Sélectionne --</option>
              <option value="Normale">Normale</option>
              <option value="Urgente">Urgente</option>
            </select>
          </div>

          <!-- Services demandés -->
          <div>
            <label class="block text-gray-700 dark:text-gray-300 mb-1">Service souhaité</label>
            <div class="space-y-2">
              <label class="flex items-center gap-2">
                <input type="checkbox" name="services[]" value="Nettoyage complet" class="accent-[#3857cb]">
                Nettoyage complet / dépoussiérage
              </label>
              <label class="flex items-center gap-2">
                <input type="checkbox" name="services[]" value="Changement de composants" class="accent-[#3857cb]">
                Changement de composants (RAM, SSD, GPU…)
              </label>
              <label class="flex items-center gap-2">
                <input type="checkbox" name="services[]" value="Réinstallation Windows" class="accent-[#3857cb]">
                Réinstallation ou optimisation Windows
              </label>
              <label class="flex items-center gap-2">
                <input type="checkbox" name="services[]" value="Autre" class="accent-[#3857cb]">
                Autre (préciser ci-dessous)
              </label>
            </div>
          </div>

          <!-- Message -->
          <div>
            <label for="message" class="block text-gray-700 dark:text-gray-300 mb-1">Message détaillé</label>
            <textarea
              id="message"
              name="message"
              rows="5"
              placeholder="Décris le problème ou le service souhaité…"
              required
              class="w-full bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500 border border-gray-300 dark:border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#3857cb] dark:focus:ring-blue-400 transition-colors"></textarea>
          </div>

          <!-- CSRF + formType + reCAPTCHA -->
          <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>" />
          <input type="hidden" name="formType" value="reparation">
          <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY; ?>"></div>

          <!-- Bouton -->
          <div class="flex justify-center">
            <button
              type="submit"
              id="sendBtn"
              aria-label="Envoyer la demande de réparation"
              class="m-4 fly-yoyo relative overflow-hidden flex items-center bg-gradient-to-r from-[#3857cb] to-[#2c469f] text-white font-sans text-[20px] px-4 py-2 pl-[0.9em] rounded-[16px] transition-all duration-200 active:scale-[0.95] cursor-pointer group">
              <div id="btnContent" class="flex items-center transition-opacity duration-200">
                <div class="relative w-6 h-6 mr-[0.3em]">
                  <div class="w-full h-full animate-[fly_0.6s_ease-in-out_infinite_alternate] group-hover:animate-[fly_0.6s_ease-in-out_infinite_alternate]">
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
        </form>

        <!-- Zone de réponse -->
        <div id="responseMessage" aria-live="polite" class="mt-6 text-center font-medium"></div>
      </div>
    </div>
  </section>
</main>

<?php include 'footer.php'; ?>

<script>
  // Avertissement PC portable
  document.getElementById("pc_type").addEventListener("change", function() {
    document.getElementById("portableWarning").classList.toggle(
      "hidden",
      this.value !== "PC Portable"
    );
  });

  // Gestion Ajax du formulaire
  document.getElementById("reparationForm").addEventListener("submit", function(e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);

    document.getElementById("btnContent").style.opacity = "0.5";
    document.getElementById("btnLoader").classList.remove("hidden");

    fetch(form.action, {
        method: "POST",
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        document.getElementById("btnContent").style.opacity = "1";
        document.getElementById("btnLoader").classList.add("hidden");

        const msg = document.getElementById("responseMessage");
        if (data.status === "success") {
          msg.textContent = "✅ Message envoyé avec succès !";
          msg.className = "mt-6 text-center font-medium text-green-600 dark:text-green-400";
          form.reset();
          grecaptcha.reset();
        } else {
          msg.textContent = "❌ " + data.message;
          msg.className = "mt-6 text-center font-medium text-red-600 dark:text-red-400";
        }
      })
      .catch(() => {
        document.getElementById("btnContent").style.opacity = "1";
        document.getElementById("btnLoader").classList.add("hidden");
        const msg = document.getElementById("responseMessage");
        msg.textContent = "❌ Erreur réseau. Veuillez réessayer.";
        msg.className = "mt-6 text-center font-medium text-red-600 dark:text-red-400";
      });
  });
</script>