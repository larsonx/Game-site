const toggleButton = document.getElementsByClassName("toggle-button")[0];
const navbarLinks = document.getElementsByClassName("navbar-links")[0];

toggleButton.addEventListener("click", () => {
  navbarLinks.classList.toggle("active");
});

const wrapper = document.querySelector(".wrapper");
const loginLink = document.querySelector(".login-link");
const registerLink = document.querySelector(".register-link");

<<<<<<< Updated upstream
registerLink.addEventListener('click' , () => {
  wrapper.classList.add('active');
=======
registerLink.addEventListener("click", () => {
  wrapper.classList.add("active");
>>>>>>> Stashed changes
});
loginLink.addEventListener("click", () => {
  wrapper.classList.remove("active");
});
