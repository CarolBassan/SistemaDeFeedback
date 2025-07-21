document.addEventListener("DOMContentLoaded", function() {
  const menuToggle = document.querySelector(".menu-toggle");
  const mainNav = document.querySelector(".main-nav");

  console.log("Elementos encontrados:", menuToggle, mainNav); // Debug

  if (menuToggle && mainNav) {
    // Adiciona ambos click e touchstart para melhor compatibilidade
    const toggleMenu = function(e) {
      if (e.type === 'touchstart') e.preventDefault();
      
      const isExpanded = menuToggle.getAttribute("aria-expanded") === "true";
      menuToggle.setAttribute("aria-expanded", !isExpanded);
      mainNav.classList.toggle("active");
      
      console.log("Menu toggled. Estado atual:", !isExpanded); // Debug
    };

    menuToggle.addEventListener("click", toggleMenu);
    menuToggle.addEventListener("touchstart", toggleMenu);

    // Fechar menu ao clicar nos links
    document.querySelectorAll(".main-nav a").forEach((link) => {
      link.addEventListener("click", function() {
        if (window.innerWidth <= 768) {
          mainNav.classList.remove("active");
          menuToggle.setAttribute("aria-expanded", "false");
          console.log("Menu fechado após clique no link"); // Debug
        }
      });
    });
  } else {
    console.error("Elementos do menu não encontrados!");
  }
});