<?php
require_once __DIR__ . '/config.php';

$selectedPC = $_GET['pc'] ?? '';
$prefilledMessage = $selectedPC
  ? "Bonjour, je souhaite acheter le PC \"" . htmlspecialchars($selectedPC) . "\" est-il toujours disponible ?"
  : '';

$pageTitle = "Demander un devis gratuit - GPX PC";
$pageDescription = "Obtenez un devis gratuit pour votre PC sur-mesure et services informatiques à Marseille.";

$recaptchaConsent = $_COOKIE['recaptchaConsent'] ?? null;

if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

include 'header.php';

// Classes réutilisables pour inputs / textarea
$inputClass = "w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700
               focus:ring-2 focus:ring-[#3857cb] dark:focus:ring-blue-400
               bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200";

function renderOptions($name, $choices, $type = 'radio')
{
  echo '<div class="flex flex-wrap gap-4">';
  foreach ($choices as $choice) {
    $id = $name . '_' . preg_replace('/[^a-z0-9]/i', '_', strtolower($choice));
    echo '<label class="flex items-center gap-2 cursor-pointer">';
    echo "<input type='$type' name='$name" . ($type === 'checkbox' ? '[]' : '') . "' value='" . htmlspecialchars($choice) . "' id='$id' class='form-$type h-6 w-6 text-blue-500 border-gray-300 dark:border-gray-600'>";
    echo '<span class="text-gray-900 dark:text-gray-200">' . $choice . '</span>';
    echo '</label>';
  }
  echo '</div>';
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
    aria-live: polite;
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
        <h1 class="text-4xl sm:text-5xl font-extrabold text-[#3857cb] dark:text-blue-400 mb-4 drop-shadow-lg">Devis pour votre PC sur-mesure</h1>
        <p class="text-lg sm:text-xl text-gray-500 dark:text-gray-400 max-w-xl mx-auto">
          Remplissez ce formulaire pour recevoir une estimation gratuite et personnalisée pour le montage de votre PC.
        </p>
      </div>

      <div class="px-6 pb-12">
        <?php if ($recaptchaConsent === 'true'): ?>
          <form id="devisForm" data-recaptcha="true" novalidate class="space-y-6 fly-yoyo">

            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            <input type="hidden" name="formType" value="devis">
            <input type="hidden" name="recaptcha_token" id="recaptcha_token">

            <!-- Informations contact -->
            <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-xl shadow-inner space-y-4">
              <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-2">Informations de contact</h2>
              <input type="text" name="name" placeholder="Nom complet *" required class="<?= $inputClass ?>">
              <input type="email" name="email" placeholder="Email *" required class="<?= $inputClass ?>">
              <input type="tel" name="phone" placeholder="Téléphone (optionnel)" class="<?= $inputClass ?>">
            </div>

            <!-- Budget -->
            <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-xl shadow-inner space-y-4 max-w-[250px]">
              <label for="budget" class="block text-gray-700 dark:text-gray-300 font-semibold">Budget du PC *</label>
              <div class="relative mt-2">
                <input type="number" id="budget" name="budget" placeholder="0" min="1" required class="<?= $inputClass ?> pr-10">
                <span class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">€</span>
              </div>
            </div>

            <!-- Préférences PC -->
            <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-xl shadow-inner space-y-6">
              <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Préférences PC</h2>
              <?php
              $preferences = [
                "resolution" => ["Full HD - 1080p", "QHD - 1440p", "UHD - 4K", "Peu importe"],
                "rgb" => ["OUI !", "Un peu mais pas trop", "Non"],
                "theme" => ["Noir", "Blanc", "Peu importe"],
                "boitier" => ["Aquarium", "Standard", "Mini"],
                "processeur" => ["AMD", "Intel", "Peu importe"],
                "carte_graphique" => ["AMD", "NVIDIA", "Peu importe"]
              ];
              foreach ($preferences as $name => $choices):
                echo "<p class='font-medium text-gray-700 dark:text-gray-300 mb-2'>" . ucwords(str_replace('_', ' ', $name)) . " *</p>";
                renderOptions($name, $choices);
              endforeach;
              ?>

              <!-- Usage professionnel -->
              <p class="font-medium text-gray-700 dark:text-gray-300 mb-2">Usage professionnel *</p>
              <?php renderOptions('pro_usage', ["Rendu 3D", "Montage Vidéo", "Musique", "Non", "Autre"], 'checkbox'); ?>

              <!-- Projet / détails -->
              <div>
                <textarea id="details" name="details" rows="6" placeholder="Décrivez votre projet…" required class="<?= $inputClass ?>"><?= htmlspecialchars($prefilledMessage) ?></textarea>
              </div>
            </div>

            <!-- Services supplémentaires -->
            <div class="p-6 bg-gray-50 dark:bg-gray-900 rounded-xl shadow-inner space-y-4">
              <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Services supplémentaires</h2>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <?php
                $services = [
                  ["Office 2024 installé", 45],
                  ["Suite Adobe 1 an", 150],
                  ["Optimisation gaming", 20],
                  ["Overclock GPU", 40],
                  ["Overclock CPU", 40],
                  ["Undervolting CPU", 30],
                  ["Installation Windows 11", 50],
                  ["Dual-boot Linux/Windows", 60],
                ];
                foreach ($services as [$label, $price]):
                  $id = preg_replace('/[^a-z0-9]/i', '_', strtolower($label));
                ?>
                  <label class="flex justify-between items-center p-3 rounded-xl border border-gray-200 dark:border-gray-700 hover:shadow-md transition cursor-pointer">
                    <span><?= $label ?></span>
                    <div class="flex items-center gap-2">
                      <span class="text-gray-500 dark:text-gray-400"><?= $price ?> €</span>
                      <input type="checkbox"
                        name="services[]"
                        id="<?= $id ?>"
                        value="<?= htmlspecialchars($label . ' (' . $price . ' €)') ?>"
                        class="form-checkbox h-6 w-6 text-green-400 border-gray-300 dark:border-gray-600">

                    </div>
                  </label>
                <?php endforeach; ?>
              </div>
            </div>

            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2 text-center">
              Ce site est protégé par reCAPTCHA et les
              <a href="https://policies.google.com/privacy" target="_blank" class="underline">règles de confidentialité</a> et
              <a href="https://policies.google.com/terms" target="_blank" class="underline">conditions d'utilisation</a> de Google.
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
                  <span id="btnText" class="block ml-[0.3em] transition-all duration-300 ease-in-out group-hover:translate-x-[5em]">Envoyer le devis</span>
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
            const form = document.getElementById("devisForm");
            const sendBtn = document.getElementById("sendBtn");

            function showToast(message, type = "success") {
              const toast = document.getElementById("toast");
              toast.textContent = message;
              toast.className = "show " + type;
              setTimeout(() => toast.classList.remove("show"), 4000);
            }

            // Change the button type in the HTML to type="button"
            // and then use the button's click event
            if (form && sendBtn) {
              sendBtn.addEventListener("click", function(e) {
                e.preventDefault(); // This stops the refresh and is good practice

                const formData = new FormData(form);
                const btnContent = document.getElementById("btnContent");
                const btnLoader = document.getElementById("btnLoader");
                btnContent.style.opacity = "0.5";
                btnLoader.classList.remove("hidden");

                grecaptcha.ready(function() {
                  grecaptcha.execute("<?= RECAPTCHA_SITE_KEY ?>", {
                    action: "devis"
                  }).then(function(token) {
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
                          showToast("✅ Devis envoyé avec succès !", "success");
                          form.reset();
                        } else showToast("❌ " + data.message, "error");
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
          <div class="text-center p-8 rounded-lg border-2
    <?= $recaptchaConsent === 'false' ? 'bg-red-50 dark:bg-red-900 border-red-200 dark:border-red-700 text-red-700 dark:text-red-300' :
            'bg-yellow-50 dark:bg-yellow-900 border-yellow-200 dark:border-yellow-700 text-yellow-700 dark:text-yellow-300' ?>">
            <h2 class="text-2xl font-bold mb-4">
              <?= $recaptchaConsent === 'false' ? 'Formulaire non disponible' : 'Action requise' ?>
            </h2>
            <p class="text-gray-700 dark:text-gray-300 mb-4">
              <?= $recaptchaConsent === 'false' ? 'Vous avez refusé les cookies de sécurité, ce qui empêche le fonctionnement du formulaire.' : 'Pour utiliser le formulaire, vous devez d’abord faire un choix concernant les cookies de sécurité via la bannière.' ?>
            </p>
            <p class="text-gray-700 dark:text-gray-300 mb-4">
              <?= $recaptchaConsent === 'false' ? 'Pour nous contacter, veuillez accepter les cookies via la bannière ou envoyer un e-mail directement à <a href="mailto:gpxpc13@gmail.com" class="text-blue-600 hover:underline">gpxpc13@gmail.com</a>.' : 'Si la bannière a disparu, rechargez la page.' ?>
            </p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>

<?php include 'footer.php'; ?>