document.addEventListener("DOMContentLoaded", function () {
  const menuToggle = document.querySelector(".menu-toggle");
  const mainNav = document.querySelector(".main-nav");

  if (menuToggle && mainNav) {
    menuToggle.addEventListener("click", function () {
      const isExpanded = menuToggle.getAttribute("aria-expanded") === "true";
      menuToggle.setAttribute("aria-expanded", !isExpanded);
      mainNav.classList.toggle("active");
    });

    // Fechar menu ao clicar nos links (mobile)
    document.querySelectorAll(".main-nav a").forEach((link) => {
      link.addEventListener("click", function () {
        if (window.innerWidth <= 768) {
          mainNav.classList.remove("active");
          menuToggle.setAttribute("aria-expanded", "false");
          menuToggle.textContent = "☰";
        }
      });
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const menuToggle = document.querySelector(".menu-toggle");
  const mainNav = document.querySelector(".main-nav");

  if (menuToggle && mainNav) {
    menuToggle.addEventListener("click", function () {
      mainNav.classList.toggle("active");
      this.classList.toggle("active");
    });
  }
});
