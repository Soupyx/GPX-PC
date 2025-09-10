<?php
require_once __DIR__ . '/config.php';

$selectedPC = $_GET['pc'] ?? '';
$prefilledMessage = $selectedPC
  ? "Bonjour, je souhaite acheter le PC \"" . htmlspecialchars($selectedPC) . "\" est-il toujours disponible ?"
  : '';

$pageTitle = "Contacter GPX PC - Monteur PC à Marseille";
$pageDescription = "Contactez GPX PC pour vos questions sur le montage, la réparation ou l’entretien d’ordinateurs à Marseille. Assemblage et livraison partout en France.";

$recaptchaConsent = $_COOKIE['recaptchaConsent'] ?? null;

include 'header.php';
?>

<style>
  .fly-yoyo {
    animation: fly 0.6s ease-in-out infinite alternate;
  }

  @keyframes fly {
    from {
      transform: translateY(0.1em);
    }

    to {
      transform: translateY(-0.1em);
    }
  }

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

  input,
  textarea {
    transition: all 0.2s;
  }
</style>

<main class="flex-grow bg-gray-50 dark:bg-gray-900 transition-colors duration-500">
  <section class="py-16 px-6">
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 shadow-lg rounded-lg overflow-hidden transition-colors duration-500">
      <div class="px-8 py-12 text-center">
        <h1 class="text-4xl sm:text-5xl font-extrabold text-[#3857cb] dark:text-blue-400 mb-4 drop-shadow-lg">Nous Contacter</h1>
        <p class="text-lg sm:text-xl text-gray-500 dark:text-gray-400 max-w-xl mx-auto">
          Contactez GPX PC pour vos questions sur le montage, la réparation ou l’entretien d’ordinateurs à Marseille.
        </p>

        <div class="mt-8 flex flex-col items-center text-center text-gray-600 dark:text-gray-400">
          <p class="font-semibold text-lg mb-2">Informations de contact de GPX PC</p>
          <div class="flex flex-col sm:flex-row items-center gap-4 sm:gap-6">

            <!-- Email version desktop -->
            <span class="hidden sm:flex items-center gap-2">
              📧 <a href="mailto:gpxpc13@gmail.com" class="hover:underline">gpxpc13@gmail.com</a>
            </span>

            <!-- Email version mobile (gros bouton CTA) -->
            <a href="mailto:gpxpc13@gmail.com"
              class="sm:hidden w-full mt-2 px-6 py-3 bg-[#3857cb] dark:bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-[#2c469f] dark:hover:bg-blue-600 transition text-center">
              📧 Envoyer un email
            </a>

            <!-- Téléphone version desktop -->
            <span class="hidden sm:flex items-center gap-2">
              📞 <a href="tel:+33652152999" class="hover:underline">06 52 15 29 99</a>
            </span>

            <!-- Téléphone version mobile (gros bouton CTA) -->
            <a href="tel:+33652152999"
              class="sm:hidden w-full mt-2 px-6 py-3 bg-[#3857cb] dark:bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-[#2c469f] dark:hover:bg-blue-600 transition text-center">
              📞 Appeler maintenant
            </a>
          </div>
        </div>

      </div>

      <div class="px-6 pb-12">
        <?php if ($recaptchaConsent === 'true'): ?>
          <form id="contactForm" novalidate class="space-y-6 fly-yoyo">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            <input type="hidden" name="formType" value="contact">
            <input type="hidden" name="recaptcha_token" id="recaptcha_token">

            <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-xl shadow-inner space-y-4">
              <?php
              $fields = [
                ['type' => 'text', 'id' => 'name', 'placeholder' => 'Nom complet *'],
                ['type' => 'email', 'id' => 'email', 'placeholder' => 'Email *'],
                ['type' => 'textarea', 'id' => 'message', 'placeholder' => 'Votre message…', 'value' => $prefilledMessage]
              ];
              foreach ($fields as $f) {
                $value = $f['value'] ?? '';
                $commonClasses = "w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-[#3857cb] dark:focus:ring-blue-400 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200";
                if ($f['type'] === 'textarea') {
                  echo "<textarea id='{$f['id']}' name='{$f['id']}' rows='6' placeholder='{$f['placeholder']}' class='{$commonClasses}'>" . htmlspecialchars($value) . "</textarea>";
                } else {
                  echo "<input type='{$f['type']}' id='{$f['id']}' name='{$f['id']}' placeholder='{$f['placeholder']}' value='" . htmlspecialchars($value) . "' class='{$commonClasses}'>";
                }
              }
              ?>
            </div>

            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2 text-center">
              Ce site est protégé par reCAPTCHA et les <a href="https://policies.google.com/privacy" target="_blank" class="underline">règles de confidentialité</a> et <a href="https://policies.google.com/terms" target="_blank" class="underline">conditions d'utilisation</a> de Google.
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
            const form = document.getElementById("contactForm");
            const sendBtn = document.getElementById("sendBtn");
            const toast = document.getElementById("toast");

            const showToast = (msg, type = "success") => {
              toast.textContent = msg;
              toast.className = "show " + type;
              setTimeout(() => toast.classList.remove("show"), 4000);
            }

            sendBtn?.addEventListener("click", e => {
              e.preventDefault();
              for (const f of ['name', 'email', 'message']) {
                if (!form[f].value.trim()) return showToast("❌ Veuillez remplir tous les champs obligatoires", "error");
              }
              const data = new FormData(form);
              document.getElementById("btnContent").style.opacity = "0.5";
              document.getElementById("btnLoader").classList.remove("hidden");

              grecaptcha.ready(() => grecaptcha.execute("<?= RECAPTCHA_SITE_KEY ?>", {
                action: "contact"
              }).then(token => {
                data.set("recaptcha_token", token);
                fetch("send.php", {
                    method: "POST",
                    body: data
                  })
                  .then(r => r.json())
                  .then(d => {
                    document.getElementById("btnContent").style.opacity = "1";
                    document.getElementById("btnLoader").classList.add("hidden");
                    if (d.status === "success") {
                      showToast("✅ Message envoyé avec succès !");
                      form.reset();
                    } else showToast("❌ " + d.message, "error");
                  })
                  .catch(() => {
                    document.getElementById("btnContent").style.opacity = "1";
                    document.getElementById("btnLoader").classList.add("hidden");
                    showToast("❌ Erreur réseau. Veuillez réessayer.", "error");
                  });
              }));
            });
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