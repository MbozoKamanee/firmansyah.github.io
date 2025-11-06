// Toggle fullscreen image
const overlay = document.getElementById("overlay");
const fullscreen = document.getElementById("fullscreen");
const images = document.querySelectorAll(".clickable");

images.forEach(img => {
  img.addEventListener("click", () => {
    overlay.style.display = "flex";
    fullscreen.src = img.src;
  });
});

overlay.addEventListener("click", () => {
  overlay.style.display = "none";
});

// Toggle hamburger menu
const hamburger = document.getElementById("hamburger");
const navMenu = document.querySelector(".main-nav");

hamburger.addEventListener("click", () => {
  navMenu.classList.toggle("show");
});
