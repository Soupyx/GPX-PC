<?php

session_start();
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Devis – GPX Gaming Power Xperience</title>
  <link rel="icon" type="image/png" sizes="32x32" href="logo/Logo.png">
  <link rel="apple-touch-icon" href="logo/Logo.png">

  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
    };
  </script>
  <style>
    [x-cloak] {
      display: none !important;
    }

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

<body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-200">

  <header class="bg-white dark:bg-gray-800 shadow transition-colors duration-500 relative">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between gap-4">
      <!-- Logo -->
      <a href="index.html" class="block flex-shrink-0">
        <img
          src="logo/Logo.png"
          alt="GPX PC - Gaming Power Xperience"
          class="h-16 sm:h-24" />
      </a>
      <h1 class="sr-only">GPX PC - Gaming Power Xperience</h1>

      <div class="flex items-center gap-6 sm:gap-12 lg:gap-20 ml-auto">

        <!-- Bouton Nos Configurations -->
        <a
          href="pcs.php"
          class="hidden sm:inline-block group relative px-6 py-3 bg-gradient-to-r from-[#3857cb] to-[#2c469f] border-2 border-transparent text-white font-bold tracking-wide overflow-visible transition-all duration-300 ease-in-out hover:from-[#2c469f] hover:to-[#3857cb]">
          <span
            class="absolute top-[-2px] left-[0.625rem] h-[2px] w-[1.5625rem] bg-gray-200 transition-all duration-500 ease-out group-hover:left-[-2px] group-hover:w-0"></span>
          <span
            class="absolute top-1/2 left-[1.5rem] -translate-y-1/2 h-[2px] w-[1.5625rem] bg-black transition-all duration-300 ease-linear group-hover:w-[0.9375rem] group-hover:bg-white"></span>
          <span class="block ml-[2em] text-[1.125em] leading-[1.3333em] uppercase">
            Nos configurations
          </span>
          <span
            class="absolute bottom-[-2px] right-[1.875rem] h-[2px] w-[1.5625rem] bg-gray-200 transition-all duration-500 ease-out group-hover:right-0 group-hover:w-0"></span>
          <span
            class="absolute bottom-[-2px] right-[0.625rem] h-[2px] w-[0.625rem] bg-gray-200 transition-all duration-500 ease-out group-hover:right-0 group-hover:w-0"></span>
        </a>

        <!-- Bouton Me contacter -->
        <a
          href="contact.php"
          class="hidden sm:inline-block group relative px-6 py-3 bg-gradient-to-r from-[#3857cb] to-[#2c469f] border-2 border-transparent text-white font-bold tracking-wide overflow-visible transition-all duration-300 ease-in-out hover:from-[#2c469f] hover:to-[#3857cb]">
          <span
            class="absolute top-[-2px] left-[0.625rem] h-[2px] w-[1.5625rem] bg-gray-200 transition-all duration-500 ease-out group-hover:left-[-2px] group-hover:w-0"></span>
          <span
            class="absolute top-1/2 left-[1.5rem] -translate-y-1/2 h-[2px] w-[1.5625rem] bg-black transition-all duration-300 ease-linear group-hover:w-[0.9375rem] group-hover:bg-white"></span>
          <span class="block ml-[2em] text-[1.125em] leading-[1.3333em] uppercase">
            Me contacter
          </span>
          <span
            class="absolute bottom-[-2px] right-[1.875rem] h-[2px] w-[1.5625rem] bg-gray-200 transition-all duration-500 ease-out group-hover:right-0 group-hover:w-0"></span>
          <span
            class="absolute bottom-[-2px] right-[0.625rem] h-[2px] w-[0.625rem] bg-gray-200 transition-all duration-500 ease-out group-hover:right-0 group-hover:w-0"></span>
        </a>

        <!-- Switch Dark Mode -->
        <label class="w-24 h-9 flex-shrink-0 relative">
          <input type="checkbox" id="dark-toggle" class="peer hidden" />
          <span class="absolute inset-0 bg-gray-800 rounded-full transition-colors duration-500 peer-checked:bg-purple-600 cursor-pointer"></span>
          <span id="mode-text"
            class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-white font-semibold text-xs transition-all duration-500 peer-checked:left-[40%]">
            Dark
          </span>
          <span
            class="absolute left-0 top-1/2 -translate-y-1/2 h-8 w-8 bg-white rounded-full shadow transition-all duration-500 peer-checked:left-[68%] peer-checked:rotate-[360deg] peer-checked:outline peer-checked:outline-[6px] peer-checked:outline-white/30">
            <span
              class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-gray-800 dark:text-white">
              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 18V6l8 6-8 6Z" />
              </svg>
            </span>
          </span>
        </label>
      </div>
    </div>
  </header>

  <!-- Main -->
  <main class="flex-grow bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-200">

    <section class="py-16 px-6 bg-gray-100 dark:bg-gray-900">
      <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 shadow-lg rounded-lg overflow-hidden">


        <!-- En-tête du bloc -->
        <div class="px-8 py-12 text-center">
          <h2 class="text-4xl sm:text-5xl font-extrabold text-[#3857cb] dark:text-blue-400 mb-4 drop-shadow-lg">
            Demande de devis gratuit
          </h2>
          <p class="text-lg sm:text-xl pt-4 text-gray-400">
            Remplis le formulaire ci-dessous pour recevoir ton estimation pour ton PC.
          </p>
        </div>

        <!-- Formulaire complet -->
        <div class="px-8">
          <form id="devisForm" action="send.php" method="POST" novalidate class="space-y-6">

            <!-- Prénom & Nom -->
            <div>
              <label for="name" class="block text-gray-800 dark:text-gray-300 mb-1">Prénom et Nom</label>
              <input type="text" id="name" name="name" placeholder="Nicolas Guinet" required autocomplete="name"
                class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500
        border border-gray-300 dark:border-gray-700 rounded-md px-4 py-2
        focus:outline-none focus:ring-2 focus:ring-green-400 transition-colors" />
            </div>

            <!-- E-mail -->
            <div>
              <label for="email" class="block text-gray-800 dark:text-gray-300 mb-1">E-mail</label>
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
              <label for="budget" class="block text-gray-800 dark:text-gray-300 mb-1">Budget du pc (Sans les services)</label>
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
              <label for="details" class="block text-gray-800 dark:text-gray-300 mb-1">Détails du projet (besoins & usages)</label>
              <textarea id="details" name="details" rows="5" placeholder="Décris ton projet…" required
                class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500
        border border-gray-300 dark:border-gray-700 rounded-md px-4 py-2
        focus:outline-none focus:ring-2 focus:ring-green-400 transition-colors"></textarea>
            </div>

            <!-- Services souhaités -->
            <div>
              <p class="block text-gray-800 dark:text-gray-300 mb-2 font-medium">Services souhaités</p>
              <div class="space-y-2">

                <!-- Choix des composants -->
                <label class="flex items-center justify-between gap-3 relative">
                  <div class="flex items-center gap-3">
                    <input type="checkbox" name="services[]" value="Choix des composants PC"
                      class="form-checkbox h-5 w-5 text-green-400 bg-white dark:bg-gray-900
             border-gray-300 dark:border-gray-700 rounded transition-colors" />
                    <span class="text-gray-900 dark:text-gray-200">Choix des composants PC</span>
                  </div>

                  <span class="text-gray-500 dark:text-gray-400 relative flex items-center gap-1">
                    Offert
                    <span class="absolute -right-3 text-red-500 cursor-help group">
                      *
                      <span
                        class="absolute bottom-full
               right-0
               mb-2
               w-[90vw]              /* 90% de la largeur écran */
               max-w-xs sm:max-w-sm md:max-w-md  /* tailles max par breakpoint */
               p-2 text-xs text-white bg-gray-800 rounded z-50
               opacity-0 pointer-events-none
               group-hover:opacity-100 group-hover:pointer-events-auto
               transition-opacity duration-200 whitespace-normal">
                        Le choix des composants est offert uniquement si l’assemblage est inclus.
                      </span>
                    </span>
                  </span>
                </label>

                <!-- Assemblage des composants -->
                <label class="flex items-center justify-between gap-3 relative">
                  <div class="flex items-center gap-3">
                    <input type="checkbox" name="services[]" value="Montage des composants"
                      class="form-checkbox h-5 w-5 text-green-400 bg-white dark:bg-gray-900
             border-gray-300 dark:border-gray-700 rounded transition-colors" />
                    <span class="text-gray-900 dark:text-gray-200">Assemblage des composants PC</span>
                  </div>

                  <span class="text-gray-500 dark:text-gray-400 relative flex items-center gap-1">
                    Offert
                    <span class="absolute -right-3 text-red-500 cursor-help group">
                      *
                      <span
                        class="absolute bottom-full right-0 mb-2
               w-[90vw]
               max-w-xs sm:max-w-sm md:max-w-md
               p-2 text-xs text-white bg-gray-800 rounded z-50
               opacity-0 pointer-events-none
               group-hover:opacity-100 group-hover:pointer-events-auto
               transition-opacity duration-200 whitespace-normal">
                        L'assemblage des composants est offert uniquement si le choix des composants est inclus.
                      </span>
                    </span>
                  </span>
                </label>



                <!-- Installation OS -->
                <label class="flex items-center justify-between gap-3 relative">
                  <div class="flex items-center gap-3">
                    <input type="checkbox" id="osCheckbox" name="services[]" value="Installation OS"
                      class="form-checkbox h-5 w-5 text-green-400 bg-white dark:bg-gray-900
             border-gray-300 dark:border-gray-700 rounded transition-colors" />
                    <span class="text-gray-900 dark:text-gray-200">Installation du système d’exploitation</span>
                  </div>

                  <span class="text-gray-500 dark:text-gray-400 relative flex items-center gap-1">
                    Offert
                    <span class="absolute -right-3 text-red-500 cursor-help group">
                      *
                      <span id="tooltip-os" role="tooltip"
                        class="absolute bottom-full right-0 mb-2
               w-[90vw]
               max-w-xs sm:max-w-sm md:max-w-md
               p-2 text-xs text-white bg-gray-800 rounded z-50
               opacity-0 pointer-events-none
               group-hover:opacity-100 group-hover:pointer-events-auto
               transition-opacity duration-200 whitespace-normal">
                        L'installation du système d'exploitation est offert uniquement si l’assemblage des composants PC est inclus.
                      </span>
                    </span>
                  </span>
                </label>





                <!-- Options OS -->
                <div id="osOptions" class="ml-8 mt-2 hidden">
                  <label for="osType" class="block text-gray-800 dark:text-gray-300 mb-1">Choisissez un OS :</label>
                  <select id="osType" name="osType"
                    class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500
            border border-gray-300 dark:border-gray-700 rounded-md px-4 py-2
            focus:outline-none focus:ring-2 focus:ring-green-400 transition-colors">
                    <option value="" disabled selected>— Sélectionnez —</option>
                    <option value="Windows 10">Windows 10</option>
                    <option value="Windows 11">Windows 11</option>
                    <option value="Linux (Ubuntu)">Linux (Ubuntu)</option>
                    <option value="Autre">Autre</option>
                  </select>

                  <!-- Checkbox licence Windows -->
                  <label class="flex items-center gap-3 mt-3 text-gray-900 dark:text-gray-200">
                    <input type="checkbox" id="windowsLicenseCheckbox" name="windows_license_needed"
                      class="form-checkbox h-5 w-5 text-green-400 bg-white dark:bg-gray-900 border-gray-300 dark:border-gray-700 rounded transition-colors" />
                    Fournir la clé de licence Windows
                  </label>

                  <!-- Choix édition licence Windows -->
                  <div id="windowsLicenseOptions" class="mt-3 ml-6 hidden">
                    <label for="windowsLicenseType" class="block text-gray-800 dark:text-gray-300 mb-1">Sélectionnez une licence Windows :</label>
                    <select id="windowsLicenseType" name="windows_license_type" disabled
                      class="w-full bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500
              border border-gray-300 dark:border-gray-700 rounded-md px-4 py-2
              focus:outline-none focus:ring-2 focus:ring-green-400 transition-colors">
                      <option value="" disabled selected>— Choisissez une licence —</option>
                      <option value="Windows Famille">Windows Famille (usage personnel standard) — 15€</option>
                      <option value="Windows Pro">Windows Pro (fonctionnalités avancées professionnelles) — 19€</option>
                    </select>
                  </div>
                </div>

                <div x-data="{ open: false }" class="space-y-2">
                  <label class="flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3">
                      <input
                        type="checkbox"
                        name="services[]"
                        value="Nettoyage PC"
                        class="form-checkbox h-5 w-5 text-green-400 bg-white dark:bg-gray-900
               border-gray-300 dark:border-gray-700 rounded transition-colors" />

                      <span class="text-gray-900 dark:text-gray-200">
                        Nettoyage du PC
                      </span>

                      <div x-data="{ open: false }" class="mt-2">
                        <button
                          type="button"
                          @click="open = !open"
                          class="text-sm text-blue-500 hover:underline focus:outline-none relative top-[-4px]">
                          <span x-show="!open" x-cloak>En savoir plus</span>
                          <span x-show="open" x-cloak>Réduire</span>
                        </button>

                        <!-- Contenu affiché quand open = true -->
                        <div x-show="open" x-transition x-cloak class="text-xs text-gray-700 dark:text-gray-300">
                          Le nettoyage comprend le dépoussiérage complet du boîtier, des ventilateurs, du radiateur CPU.
                          La pâte thermique du processeur est également remplacée pour une meilleure dissipation thermique. </div>
                      </div>

                    </div>

                    <!-- Prix avec couleurs harmonisées -->
                    <span class="text-gray-500 dark:text-gray-400">40€</span>
                  </label>

                  <p
                    x-show="open"
                    x-transition
                    class="text-sm text-gray-700 dark:text-gray-300 ml-8">
                    Dépoussiérage interne (ventilateurs, radiateurs, boîtier) + remplacement de la pâte thermique du processeur pour une meilleure dissipation de chaleur.
                  </p>
                </div>


                <label class="flex items-center justify-between gap-3">
                  <div class="flex items-center gap-3">
                    <input type="checkbox" name="services[]" value="Microsoft 365 pré-installé"
                      class="form-checkbox h-5 w-5 text-green-400 bg-white dark:bg-gray-900 border-gray-300 dark:border-gray-700 rounded transition-colors" />
                    <span class="text-gray-900 dark:text-gray-200">Office 2024 prêt installé (Word, Powerpoint...)</span>
                  </div>
                  <span class="text-gray-500 dark:text-gray-400">35€</span>
                </label>

                <label class="flex items-center justify-between gap-3">
                  <div class="flex items-center gap-3">
                    <input type="checkbox" name="services[]" value="Suite Adobe"
                      class="form-checkbox h-5 w-5 text-green-400 bg-white dark:bg-gray-900 border-gray-300 dark:border-gray-700 rounded transition-colors" />
                    <span class="text-gray-900 dark:text-gray-200">Suite Adobe prêt installé (Photoshop, Illustrator…) Licence 1 an</span>
                  </div>
                  <span class="text-gray-500 dark:text-gray-400">150€</span>
                </label>

                <label class="flex items-center justify-between gap-3">
                  <div class="flex items-center gap-3">
                    <input type="checkbox" name="services[]" value="Optimisation Gaming"
                      class="form-checkbox h-5 w-5 text-green-400 bg-white dark:bg-gray-900 border-gray-300 dark:border-gray-700 rounded transition-colors" />
                    <span class="text-gray-900 dark:text-gray-200">Optimisation pour le gaming (Réglages du système pour du gaming)</span>
                  </div>
                  <span class="text-gray-500 dark:text-gray-400">15€</span>
                </label>

                <label class="flex items-center justify-between gap-3">
                  <div class="flex items-center gap-3">
                    <input type="checkbox" name="services[]" value="Overclocking & Undervolting GPU"
                      class="form-checkbox h-5 w-5 text-green-400 bg-white dark:bg-gray-900 border-gray-300 dark:border-gray-700 rounded transition-colors" />
                    <span class="text-gray-900 dark:text-gray-200">Overclocking & Undervolting GPU</span>
                  </div>
                  <span class="text-gray-500 dark:text-gray-400">25€</span>
                </label>

                <label class="flex items-center justify-between gap-3">
                  <div class="flex items-center gap-3">
                    <input type="checkbox" name="services[]" value="Overclocking CPU"
                      class="form-checkbox h-5 w-5 text-green-400 bg-white dark:bg-gray-900 border-gray-300 dark:border-gray-700 rounded transition-colors" />
                    <span class="text-gray-900 dark:text-gray-200">Overclocking CPU (Si le modèle convient)</span>
                  </div>
                  <span class="text-gray-500 dark:text-gray-400">25€</span>
                </label>

              </div>
            </div>


            <!-- Champs cachés -->
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            <input type="hidden" name="formType" value="devis">

            <!-- Bouton d’envoi -->
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

            <!-- Message de réponse -->
            <div id="responseMessage" aria-live="polite" class="text-center font-medium mb-6"></div>

          </form>
        </div>

      </div>
    </section>
  </main>
  <footer
    class="bg-black dark:bg-gray-950 text-gray-400 dark:text-gray-500 py-8 transition-colors duration-500">
    <div
      class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center">
      <a href="index.html" class="block mb-6 sm:mb-0">
        <img src="logo/Logo.png" alt="GPX PC Logo" class="h-12 sm:h-16" />
      </a>
      <nav class="flex gap-8">
        <a href="index.html" class="hover:text-white transition">Accueil</a>
        <a href="devis.php" class="hover:text-white transition">Devis</a>
        <a href="contact.php" class="hover:text-white transition">Contact</a>
      </nav>
      <p class="mt-6 sm:mt-0 text-xs text-gray-600 dark:text-gray-400">
        &copy; 2025 Soupyx PC Services
      </p>
    </div>
  </footer>
  <script>
    // Loader + fetch existant
    document.getElementById("devisForm").addEventListener("submit", function(e) {
      e.preventDefault();
      const form = e.target;
      const formData = new FormData(form);
      const msgBox = document.getElementById("responseMessage");
      const btn = form.querySelector("button[type=submit]");
      const btnText = document.getElementById("btnText");
      const btnLoad = document.getElementById("btnLoader");

      btn.disabled = true;
      btnText.classList.add("opacity-0");
      btnLoad.classList.remove("hidden");
      msgBox.textContent = "";

      fetch(form.action, {
          method: "POST",
          body: formData
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


    document.addEventListener("DOMContentLoaded", () => {
      const osCheckbox = document.getElementById("osCheckbox");
      const osOptions = document.getElementById("osOptions");

      const windowsLicenseCheckbox = document.getElementById("windowsLicenseCheckbox");
      const windowsLicenseOptions = document.getElementById("windowsLicenseOptions");
      const windowsLicenseSelect = document.getElementById("windowsLicenseType");

      osCheckbox.addEventListener("change", () => {
        if (osCheckbox.checked) {
          osOptions.classList.remove("hidden");
        } else {
          osOptions.classList.add("hidden");
          windowsLicenseCheckbox.checked = false;
          windowsLicenseOptions.classList.add("hidden");
          windowsLicenseSelect.disabled = true;
          windowsLicenseSelect.value = "";
        }
      });

      windowsLicenseCheckbox.addEventListener("change", () => {
        if (windowsLicenseCheckbox.checked) {
          windowsLicenseOptions.classList.remove("hidden");
          windowsLicenseSelect.disabled = false;
        } else {
          windowsLicenseOptions.classList.add("hidden");
          windowsLicenseSelect.disabled = true;
          windowsLicenseSelect.value = "";
        }
      });
    });

    const toggle = document.getElementById("dark-toggle");
    const modeText = document.getElementById("mode-text");

    // Charger la préférence
    if (localStorage.theme === "dark") {
      document.documentElement.classList.add("dark");
      toggle.checked = true;
      modeText.textContent = "Light";
    }

    toggle.addEventListener("change", () => {
      if (toggle.checked) {
        document.documentElement.classList.add("dark");
        localStorage.theme = "dark";
        modeText.textContent = "Light";
      } else {
        document.documentElement.classList.remove("dark");
        localStorage.theme = "light";
        modeText.textContent = "Dark";
      }
    });
  </script>

</body>

</html>