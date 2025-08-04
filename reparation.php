<?php
$pageTitle = "Réparation & Entretien – GPX PC | Assemblage & Réparation PC en France";
$pageDescription = "Faites réparer et entretenir votre PC avec GPX PC. Nettoyage, changement de composants, optimisation et maintenance, à Marseille et livraison en France.";

include 'header.php';
?>

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
        <h2 class="text-4xl sm:text-5xl font-extrabold text-[#3857cb] dark:text-blue-400 mb-4 drop-shadow-lg">
          Réparation & Entretien
        </h2>
        <p class="text-lg sm:text-xl text-gray-500 dark:text-gray-400">
          Remplis ce formulaire pour demander une réparation ou un entretien de ton PC.
        </p>
      </div>

      <!-- Formulaire -->
      <div class="px-6 pb-2">
        <form id="reparationForm" action="send.php" method="POST" novalidate class="space-y-6">

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
              ⚠️ Attention : Pour les PC portables, certaines interventions matérielles complexes (comme un démontage complet ou un remplacement de composants internes) peuvent être difficiles ou impossibles à réaliser. Nous privilégions les services logiciels, le nettoyage léger et les réparations simples afin de garantir la sécurité de votre appareil.
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
          <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" />
          <input type="hidden" name="formType" value="reparation">
          <div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_SITE_KEY; ?>" ></div>

          <!-- Bouton -->
          <div class="flex justify-center">
            <button
              type="submit"
              id="sendBtn"
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
                  Send
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
  // Avertissement dynamique pour PC portable
  document.getElementById("pc_type").addEventListener("change", function() {
    document.getElementById("portableWarning").classList.toggle(
      "hidden",
      this.value !== "PC Portable"
    );
  });

document.getElementById("reparationForm").addEventListener("submit", function(e) {
  e.preventDefault(); // Empêche l'envoi classique

  const form = e.target;
  const formData = new FormData(form);

  // Afficher loader
  document.getElementById("btnContent").style.opacity = "0.5";
  document.getElementById("btnLoader").classList.remove("hidden");

  fetch(form.action, {
    method: "POST",
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    // Réinitialiser le bouton
    document.getElementById("btnContent").style.opacity = "1";
    document.getElementById("btnLoader").classList.add("hidden");

    const msg = document.getElementById("responseMessage");
    if (data.status === "success") {
      msg.textContent = "✅ Message envoyé avec succès !";
      msg.className = "mt-6 text-center font-medium text-green-600 dark:text-green-400";
      form.reset();
      grecaptcha.reset(); // reset reCAPTCHA
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