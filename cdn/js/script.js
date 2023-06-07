const menuBurger = document.getElementById("burger");
const btnMenu = document.getElementById("burger-btn");

btnMenu.addEventListener("click", function() {
        menuBurger.classList.toggle("active");
    });