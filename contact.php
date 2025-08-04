<?php
require_once __DIR__ . '/config.php';

$selectedPC = $_GET['pc'] ?? '';
$prefilledMessage = $selectedPC
  ? "Bonjour, je souhaite acheter le PC \"$selectedPC\" est-il toujours disponible ?"
  : '';

// Définition du titre et description pour le header
$pageTitle = "Contact – GPX PC | Assemblage & Réparation PC en France";
$pageDescription = "Besoin d’un renseignement sur nos services de montage ou réparation de PC à Marseille ? GPX PC assemble vos ordinateurs à Marseille et les livre partout en France.";

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
  <section class="py-16 px-6 bg-gray-50 dark:bg-gray-900 transition-colors duration-500">
    <div
      class="max-w-2xl mx-auto bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 shadow-lg rounded-lg overflow-hidden transition-colors duration-500">

      <!-- En-tête -->
      <div class="px-8 py-12 text-center">
        <h2 class="text-4xl sm:text-5xl font-extrabold text-[#3857cb] dark:text-blue-400 mb-4 drop-shadow-lg">
          Contactez-moi
        </h2>
        <p class="text-lg sm:text-xl text-gray-500 dark:text-gray-400">
          Remplis ce formulaire pour m’envoyer un message.
        </p>
      </div>

      <!-- Formulaire -->
      <div class="px-6">
        <form id="contactForm" action="send.php" method="POST" novalidate class="space-y-6">

          <!-- Nom -->
          <div>
            <label for="name" class="block text-gray-700 dark:text-gray-300 mb-1">Nom</label>
            <input type="text" id="name" name="name" placeholder="Ton nom complet" required autocomplete="name"
              class="w-full bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500
              border border-gray-300 dark:border-gray-700 rounded-md px-4 py-2
              focus:outline-none focus:ring-2 focus:ring-[#3857cb] dark:focus:ring-blue-400 transition-colors" />
          </div>

          <!-- Email -->
          <div>
            <label for="email" class="block text-gray-700 dark:text-gray-300 mb-1">Email</label>
            <input type="email" id="email" name="email" placeholder="exemple@mail.com" required autocomplete="email"
              class="w-full bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500
              border border-gray-300 dark:border-gray-700 rounded-md px-4 py-2
              focus:outline-none focus:ring-2 focus:ring-[#3857cb] dark:focus:ring-blue-400 transition-colors" />
          </div>

          <!-- Message -->
          <div>
            <label for="message" class="block text-gray-700 dark:text-gray-300 mb-1">Message</label>
            <textarea id="message" name="message" rows="5" placeholder="Écris ton message ici…" required
              class="w-full bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500
              border border-gray-300 dark:border-gray-700 rounded-md px-4 py-2
              focus:outline-none focus:ring-2 focus:ring-[#3857cb] dark:focus:ring-blue-400 transition-colors"><?= htmlspecialchars($prefilledMessage) ?></textarea>
          </div>

          <!-- CSRF -->
          <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
          <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>

          <!-- Bouton -->
          <div class="flex justify-center">
            <button type="submit" id="sendBtn"
              class="m-4 fly-yoyo relative overflow-hidden flex items-center
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

          <!-- Message -->
          <div id="responseMessage" aria-live="polite" class="text-center font-medium mb-6"></div>
        </form>
      </div>
    </div>
  </section>
</main>

<?php include 'footer.php'; ?>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("contactForm");
    const msgBox = document.getElementById("responseMessage");
    const btn = document.getElementById("sendBtn");
    const btnText = document.getElementById("btnText");
    const btnLoad = document.getElementById("btnLoader");

    form.addEventListener("submit", e => {
      e.preventDefault();
      btn.disabled = true;
      btnText.classList.add("opacity-0");
      btnLoad.classList.remove("hidden");
      msgBox.textContent = "";

      fetch(form.action, {
          method: "POST",
          body: new FormData(form)
        })
        .then(res => res.json())
        .then(data => {
          msgBox.innerText = data.message;
          msgBox.className = data.status === "success" ?
            "mt-4 text-green-700 bg-green-100 border border-green-300 p-2 rounded" :
            "mt-4 text-red-700 bg-red-100 border border-red-300 p-2 rounded";
          if (data.status === "success") form.reset();
        })
        .catch(() => {
          msgBox.innerText = "Erreur lors de l'envoi.";
          msgBox.className = "mt-4 text-red-700 bg-red-100 border border-red-300 p-2 rounded";
        })
        .finally(() => {
          btn.disabled = false;
          btnText.classList.remove("opacity-0");
          btnLoad.classList.add("hidden");
        });
    });
  });
</script>