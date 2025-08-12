// Selecting DOM items
const menuBtn = document.querySelector(".menu-btn");
const menu = document.querySelector(".menu");
const menuNav = document.querySelector(".menu-nav");
const menuBrand = document.querySelector(".menu-brand");
const navItmes = document.querySelectorAll(".nav-item");
const popup = document.getElementById("callPopup");
const phoneNumber = "+916382788518";
// Set Initial State of Menu
let showMenu = false;

menuBtn.addEventListener("click", toggleMenu);

function toggleMenu() {
  if (!showMenu) {
    menuBtn.classList.add("close");
    menu.classList.add("show");
    menuNav.classList.add("show");
    menuBrand.classList.add("show");
    navItmes.forEach((item) => item.classList.add("show"));

    //Reset the Menu State
    showMenu = true;
  } else {
    menuBtn.classList.remove("close");
    menu.classList.remove("show");
    menuNav.classList.remove("show");
    menuBrand.classList.remove("show");
    navItmes.forEach((item) => item.classList.remove("show"));

    //Reset the Menu State
    showMenu = false;
  }
  // main.js or wherever your JS is
document.addEventListener('DOMContentLoaded', function () {
    const callBtn = document.getElementById('callBtn');
    const callDialog = document.getElementById('callDialog');
    const confirmBtn = document.getElementById('confirmCallBtn');
    const cancelBtn = document.getElementById('cancelCallBtn');

    if (callBtn && callDialog && confirmBtn && cancelBtn) {
        callBtn.addEventListener('click', function () {
            callDialog.style.display = 'flex';
        });

        cancelBtn.addEventListener('click', function () {
            callDialog.style.display = 'none';
        });

        confirmBtn.addEventListener('click', function () {
            window.location.href = 'tel:+916382323228';
        });
    }
});



}