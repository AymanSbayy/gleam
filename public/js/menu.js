"use strict";

window.addEventListener("load", function () {
  let listelements = document.querySelectorAll(".list_button-click");
  listelements.forEach((listelements) => {
    listelements.addEventListener("click", function () {
      listelements.classList.toggle("arrow");
      let height = 0;
      let menu = listelements.nextElementSibling;
      if (menu.clientHeight == 0) {
        height = menu.scrollHeight;
      }
      menu.style.height = height + "px";
    });
  });
});
