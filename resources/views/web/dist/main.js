// '#menu' is the toggle button id
const navBtn = document.querySelector("#menu");
// 'menubar' is the navbar
const menuBar = document.querySelector('[role="menubar"]');

navBtn.addEventListener("click", () => {
  // does 'isExpanded' have an aria-expanded?
  const isExpanded = JSON.parse(navBtn.getAttribute("aria-expanded"));
  navBtn.setAttribute("aria-expanded", !isExpanded);
  menuBar.classList.toggle("hidden");
  menuBar.classList.toggle("flex");
});
