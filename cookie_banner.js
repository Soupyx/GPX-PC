document.addEventListener("DOMContentLoaded", () => {
  const consent = getCookie("recaptchaConsent");

  if (!consent) showCookieBanner();
  else if (consent === "true") loadRecaptcha();

  // ---------------------------
  // Affichage du banner
  // ---------------------------
  function showCookieBanner() {
    const banner = document.createElement("div");
    banner.className = `
      fixed bottom-6 left-1/2 transform -translate-x-1/2 
      bg-gray-800 text-white rounded-lg shadow-2xl z-[9999] 
      p-4 sm:p-5 max-w-xl w-[90%] sm:w-auto 
      flex flex-col sm:flex-row items-center gap-4
      transition-all duration-500 opacity-0 translate-y-8
    `;
    banner.innerHTML = `
      <p class="text-sm leading-relaxed flex-1">
        🍪 Nous utilisons Google reCAPTCHA pour sécuriser nos formulaires.
        Ce service peut collecter certaines données personnelles.
        <a href="/politique-confidentialite.php" class="text-blue-400 underline hover:text-blue-300">En savoir plus</a>.
      </p>
      <div class="flex gap-3">
        <button id="cookieAccept" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 cursor-pointer rounded-md font-semibold">Accepter</button>
        <button id="cookieRefuse" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 cursor-pointer rounded-md font-semibold">Refuser</button>
      </div>
    `;
    document.body.appendChild(banner);

    // Entrée animée
    setTimeout(
      () => banner.classList.remove("opacity-0", "translate-y-8"),
      100
    );

    // ---------------------------
    // Bouton Accepter
    // ---------------------------
    document.getElementById("cookieAccept").addEventListener("click", () => {
      setCookie("recaptchaConsent", "true", 365);
      location.reload(); // recharge automatiquement la page
    });

    // ---------------------------
    // Bouton Refuser
    // ---------------------------
    document.getElementById("cookieRefuse").addEventListener("click", () => {
      setCookie("recaptchaConsent", "false", 365);
      closeBanner();
    });

    function closeBanner() {
      banner.classList.add("opacity-0", "translate-y-8");
      setTimeout(() => banner.remove(), 500);
    }
  }

  // ---------------------------
  // Chargement reCAPTCHA
  // ---------------------------
  function loadRecaptcha() {
    if (document.getElementById("recaptcha-script")) return;

    const script = document.createElement("script");
    script.id = "recaptcha-script";
    script.src = `https://www.google.com/recaptcha/api.js?render=${RECAPTCHA_SITE_KEY_JS}`;
    script.onload = setupForms;
    document.body.appendChild(script);
  }

  // ---------------------------
  // Attachement des formulaires
  // ---------------------------
  function setupForms() {
    const forms = document.querySelectorAll("form[data-recaptcha='true']");
    forms.forEach((form) => {
      const tokenInput = form.querySelector("#recaptcha_token");
      if (!tokenInput) return;

      form.addEventListener("submit", (e) => {
        if (getCookie("recaptchaConsent") !== "true") {
          e.preventDefault();
          alert("Vous devez accepter les cookies pour utiliser le formulaire.");
          return;
        }

        e.preventDefault();
        grecaptcha.ready(() => {
          grecaptcha
            .execute(RECAPTCHA_SITE_KEY_JS, { action: "submit" })
            .then((token) => {
              tokenInput.value = token;
              form.submit();
            });
        });
      });
    });
  }

  // ---------------------------
  // Utilitaires cookies
  // ---------------------------
  function setCookie(name, value, days) {
    const d = new Date();
    d.setTime(d.getTime() + days * 24 * 60 * 60 * 1000);
    const secureFlag = location.protocol === "https:" ? ";Secure" : "";
    document.cookie = `${name}=${value};expires=${d.toUTCString()};path=/;SameSite=Lax${secureFlag}`;
  }

  function getCookie(name) {
    const nameEQ = name + "=";
    return (
      decodeURIComponent(document.cookie)
        .split(";")
        .map((c) => c.trim())
        .find((c) => c.startsWith(nameEQ))
        ?.substring(nameEQ.length) || ""
    );
  }
});
