<?php
$pageTitle = "Réparation et Dépannage PC à Marseille | GPX PC | Récupération de Données";
$pageDescription = "Service de réparation, dépannage et entretien de PC à Marseille. GPX PC prend en charge le nettoyage, l'optimisation, le changement de composants et la récupération de données sur disque dur.";

include 'header.php';

$recaptchaConsent = $_COOKIE['recaptchaConsent'] ?? null;

if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
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

  /* Toast notification */
  #toast {
    position: fixed;
    top: 1rem;
    right: 1rem;
    min-width: 250px;
    padding: 1rem 1.5rem;
    border-radius: 12px;
    color: white;
    font-weight: 500;
    display: flex;
    align-items: center;
    justify-content: center;
    transform: translateX(150%);
    opacity: 0;
    pointer-events: none;
    transition: transform 0.5s ease, opacity 0.5s ease;
    z-index: 9999;
  }

  #toast.show {
    transform: translateX(0);
    opacity: 1;
  }

  #toast.success {
    background-color: #16a34a;
  }

  #toast.error {
    background-color: #dc2626;
  }
</style>

<main class="flex-grow bg-gray-50 dark:bg-gray-900 transition-colors duration-500">
  <section class="py-16 px-6">
    <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 shadow-lg rounded-lg overflow-hidden transition-colors duration-500">

      <div class="px-8 py-12 text-center">
        <h1 class="text-4xl sm:text-5xl font-extrabold text-[#3857cb] dark:text-blue-400 mb-4 drop-shadow-lg">
          Réparation et Entretien de PC à Marseille
        </h1>
        <p class="text-lg sm:text-xl text-gray-500 dark:text-gray-400 max-w-xl mx-auto">
          Un problème avec votre ordinateur ? Demandez un service de <strong>réparation</strong>, <strong>nettoyage</strong>, <strong>optimisation</strong>, ou de <strong>récupération de données</strong>.
        </p>
      </div>

      <div class="px-6 pb-12">
        <?php if ($recaptchaConsent === 'true'): ?>
          <form id="reparationForm" novalidate class="space-y-6 fly-yoyo">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            <input type="hidden" name="formType" value="reparation">
            <input type="hidden" name="recaptcha_token" id="recaptcha_token">

            <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-xl shadow-inner space-y-4">
              <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-4">Informations de contact</h2>
              <input type="text" name="name" placeholder="Nom complet *" required aria-label="Nom complet" class="w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-[#3857cb] dark:focus:ring-blue-400 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
              <input type="email" name="email" placeholder="Email *" required aria-label="Adresse email" class="w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-[#3857cb] dark:focus:ring-blue-400 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
              <input type="tel" name="phone" placeholder="Téléphone (optionnel)" aria-label="Numéro de téléphone" class="w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-[#3857cb] dark:focus:ring-blue-400 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
            </div>

            <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-xl shadow-inner space-y-4">
              <label for="pc_type" class="block text-gray-700 dark:text-gray-300 font-semibold">Type de PC *</label>
              <select id="pc_type" name="pc_type" required class="w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-[#3857cb] dark:focus:ring-blue-400 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
                <option value="">-- Sélectionne --</option>
                <option value="PC Fixe">PC Fixe</option>
                <option value="PC Portable">PC Portable</option>
              </select>
              <p id="portableWarning" class="hidden mt-2 text-sm text-yellow-600 dark:text-yellow-400">
                ⚠️ Pour les PC portables, seules les interventions logicielles, nettoyages légers et réparations simples sont proposées.
              </p>
            </div>

            <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-xl shadow-inner space-y-4">
              <label for="urgency" class="block text-gray-700 dark:text-gray-300 font-semibold">Urgence de la réparation *</label>
              <select id="urgency" name="urgency" required class="w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-[#3857cb] dark:focus:ring-blue-400 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
                <option value="">-- Sélectionne --</option>
                <option value="Normale">Normale</option>
                <option value="Urgente">Urgente</option>
              </select>
            </div>

            <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-xl shadow-inner space-y-4">
              <label class="block text-gray-700 dark:text-gray-300 font-semibold">Service souhaité *</label>
              <div class="space-y-2">
                <?php
                $services = [
                  'Nettoyage complet / dépoussiérage',
                  'Changement de composants (RAM, SSD, GPU…)',
                  'Réinstallation ou optimisation Windows',
                  'Récupération de données',
                  'Autre (préciser ci-dessous)'
                ];
                foreach ($services as $s): ?>
                  <label class="flex items-center gap-2 cursor-pointer p-3 rounded-xl border border-gray-200 dark:border-gray-700 hover:shadow-md transition">
                    <input type="checkbox" name="services[]" value="<?= htmlspecialchars($s) ?>" class="form-checkbox h-6 w-6 text-green-400 border-gray-300 dark:border-gray-600">
                    <span class="text-gray-900 dark:text-gray-200"><?= $s ?></span>
                  </label>
                <?php endforeach; ?>
              </div>
            </div>

            <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-xl shadow-inner space-y-4">
              <textarea name="message" rows="6" placeholder="Décris le problème ou le service souhaité…" required aria-label="Message"
                class="w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-[#3857cb] dark:focus:ring-blue-400 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200"></textarea>
            </div>

            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2 text-center">
              Ce site est protégé par reCAPTCHA et les
              <a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer" class="underline">règles de confidentialité</a>
              et
              <a href="https://policies.google.com/terms" target="_blank" rel="noopener noreferrer" class="underline">conditions d’utilisation</a>
              de Google.
            </p>

            <div class="flex justify-center">
              <button type="button" id="sendBtn" class="m-4 fly-yoyo relative overflow-hidden flex items-center bg-gradient-to-r from-[#3857cb] to-[#2c469f] text-white font-sans text-[20px] px-4 py-2 pl-[0.9em] rounded-[16px] transition-all duration-200 active:scale-[0.95] cursor-pointer group">
                <div id="btnContent" class="flex items-center transition-opacity duration-200">
                  <div class="relative w-6 h-6 mr-[0.3em] fly-yoyo">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z" />
                    </svg>
                  </div>
                  <span id="btnText" class="block ml-[0.3em] transition-all duration-300 ease-in-out group-hover:translate-x-[5em]">Envoyer</span>
                </div>
                <svg id="btnLoader" class="hidden absolute inset-0 mx-auto my-auto w-6 h-6 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 00-8 8h4z"></path>
                </svg>
              </button>
            </div>
          </form>

          <div id="toast"></div>

          <script src="https://www.google.com/recaptcha/api.js?render=<?= RECAPTCHA_SITE_KEY ?>"></script>
          <script>
            const form = document.getElementById("reparationForm");
            const sendBtn = document.getElementById("sendBtn");
            const btnContent = document.getElementById("btnContent");
            const btnLoader = document.getElementById("btnLoader");
            const toast = document.getElementById("toast");
            const portableSelect = document.getElementById("pc_type");
            const portableWarning = document.getElementById("portableWarning");

            function showToast(message, type = "success") {
              toast.textContent = message;
              toast.className = "show " + type;
              setTimeout(() => toast.classList.remove("show"), 4000);
            }

            if (form && sendBtn) {
              portableSelect.addEventListener("change", e => {
                portableWarning.classList.toggle("hidden", e.target.value !== "PC Portable");
              });

              sendBtn.addEventListener("click", e => {
                e.preventDefault();
                const required = ["name", "email", "pc_type", "urgency", "message"];
                for (const field of required) {
                  if (!form[field].value.trim()) {
                    showToast("❌ Veuillez remplir tous les champs obligatoires", "error");
                    return;
                  }
                }

                const formData = new FormData(form);
                btnContent.style.opacity = "0.5";
                btnLoader.classList.remove("hidden");

                grecaptcha.ready(() => {
                  grecaptcha.execute("<?= RECAPTCHA_SITE_KEY ?>", {
                      action: "reparation"
                    })
                    .then(token => {
                      formData.set("recaptcha_token", token);
                      fetch("send.php", {
                          method: "POST",
                          body: formData
                        })
                        .then(res => res.json())
                        .then(data => {
                          btnContent.style.opacity = "1";
                          btnLoader.classList.add("hidden");
                          if (data.status === "success") {
                            showToast("✅ Message envoyé avec succès !", "success");
                            form.reset();
                          } else {
                            showToast("❌ " + data.message, "error");
                          }
                        })
                        .catch(() => {
                          btnContent.style.opacity = "1";
                          btnLoader.classList.add("hidden");
                          showToast("❌ Erreur réseau. Veuillez réessayer.", "error");
                        });
                    });
                });
              });
            }
          </script>

        <?php else: ?>
          <div class="text-center p-8 rounded-lg border-2 bg-yellow-50 dark:bg-yellow-900 border-yellow-200 dark:border-yellow-700 text-yellow-700 dark:text-yellow-300">
            <h2 class="text-2xl font-bold mb-4">Action requise</h2>
            <p class="mb-2">Pour utiliser le formulaire, vous devez d’abord faire un choix concernant les cookies de sécurité via la bannière.</p>
            <p class="text-sm text-gray-600 dark:text-gray-400">Si la bannière a disparu, rechargez la page.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>

<?php include 'footer.php'; ?>