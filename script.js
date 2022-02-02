"use strict";

const modal = document.querySelector(".modals");
const overlay = document.querySelector(".overlays");
const btnCloseModal = document.querySelector(".close-modals");
const btnOpenModal = document.querySelector(".show-modals");
let navbar = document.querySelector(".navbars");
let menu = document.querySelector("#menu-bars");

window.onscroll = () => {
  menu.classList.remove("fa-times");
  navbar.classList.remove("active");
};

btnOpenModal.addEventListener("click", function () {
  modal.classList.remove("hiddens");
  overlay.classList.remove("hiddens");
});

const closeModals = function () {
  modal.classList.add("hiddens");
  overlay.classList.add("hiddens");
};

overlay.addEventListener("click", closeModals);

document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && !modal.classList.contains("hiddens")) {
    closeModals();
  }
});

menu.addEventListener("click", () => {
  menu.classList.toggle("fa-times");
  navbar.classList.toggle("active");
});
