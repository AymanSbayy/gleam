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

  const slickWidth = slick[0].offsetWidth;
  let lastPosition = 0;

  buttonPrev.onclick = () => Move(1);
  buttonNext.onclick = () => Move(2);

  function Move(value) {
    const trackWidth = track.offsetWidth;
    const listWidth = slickList.offsetWidth;

    track.style.left == ""
      ? (lastPosition = track.style.left = 0)
      : (lastPosition = parseFloat(track.style.left.slice(0, -2) * -1));

    if (value == 2) {
      // Si se hizo clic en el botón Next
      if (lastPosition < trackWidth - listWidth) {
        track.style.left = `${-1 * (lastPosition + slickWidth)}px`;
      } else {
        track.style.left = "0px"; // Volver al principio
        lastPosition = 0; // Establecer lastPosition a 0
      }
    } else {
      // Si se hizo clic en el botón Prev
      if (lastPosition > 0) {
        track.style.left = `${-1 * (lastPosition - slickWidth)}px`;
      } else {
        track.style.left = `${-1 * (slickWidth * (slick.length - 1))}px`; // Volver al final
        lastPosition = trackWidth - listWidth; // Establecer lastPosition al ancho de la pista menos el ancho de la lista
      }
    }
  }
    function showAlert() {
        let alertDiv = document.createElement("div");
        alertDiv.className = "alert alert-success";
        alertDiv.setAttribute("role", "alert");
        alertDiv.textContent = "La cuenta ha sido activada correctamente.";


        document.body.insertBefore(alertDiv, document.body.firstChild);

        setTimeout(function() {
            alertDiv.remove();
        }, 5000);
    }




});
