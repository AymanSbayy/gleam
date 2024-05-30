$(document).ready(function () {
  let urlParams = new URLSearchParams(window.location.search);
  let alertParam = urlParams.get("alert");

  if (alertParam === "activated") {
      showAlert();
  }

  const buttonPrev = document.getElementById("button-prev");
  const buttonNext = document.getElementById("button-next");
  const track = document.getElementById("track");
  const slickList = document.getElementById("slick-list");
  const slick = document.querySelectorAll(".slick");

  const slickWidth = slick[0].offsetWidth + parseInt(window.getComputedStyle(slick[0]).marginRight, 10);
  let lastPosition = 0;

  buttonPrev.onclick = () => Move(1);
  buttonNext.onclick = () => Move(2);

  function Move(direction) {
      const trackWidth = track.scrollWidth;
      const listWidth = slickList.offsetWidth;

      if (direction === 2) {
          if (lastPosition < (trackWidth - listWidth)) {
              lastPosition += slickWidth;
              track.style.transform = `translateX(-${lastPosition}px)`;
          } else {
              lastPosition = 0;
              track.style.transform = `translateX(0px)`;
          }
      } else {
          if (lastPosition > 0) {
              lastPosition -= slickWidth;
              track.style.transform = `translateX(-${lastPosition}px)`;
          } else {
              lastPosition = trackWidth - listWidth;
              track.style.transform = `translateX(-${lastPosition}px)`;
          }
      }
  }

  function showAlert() {
      let alertDiv = document.createElement("div");
      alertDiv.className = "alert alert-success";
      alertDiv.setAttribute("role", "alert");
      alertDiv.textContent = "La cuenta ha sido activada correctamente.";

      document.body.insertBefore(alertDiv, document.body.firstChild);

      setTimeout(function () {
          alertDiv.remove();
      }, 5000);
  }
});
