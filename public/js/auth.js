$(document).ready(function () {
  $("#login").click(function () {
    login();
  });
  $("#register").click(function () {
    register();
  });
});

function login() {
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;
  let formData = { email: email, password: password };

  $.ajax({
    type: "POST",
    url: "login.php",
    data: formData,
    success: function (response) {
      
      let errors = JSON.parse(response);

      if (errors.success) {
        location.reload();
        
      } else {
        let fields = document.querySelectorAll(".is-invalid");
        fields.forEach((field) => {
          field.classList.remove("is-invalid");
        });

        let feedbacks = document.querySelectorAll(".invalid-feedback");
        feedbacks.forEach((feedback) => {
          feedback.remove();
        });

        if (errors.email) {
          let emailField = document.getElementById("email");
          emailField.classList.add("is-invalid");
          let errorMensaje = document.createElement("div");
          errorMensaje.classList.add("invalid-feedback");
          errorMensaje.innerText = errors.email;
          emailField.parentNode.appendChild(errorMensaje);
        }

        if (errors.password) {
          let passwordField = document.getElementById("password");
          passwordField.classList.add("is-invalid");
          let errorMensaje = document.createElement("div");
          errorMensaje.classList.add("invalid-feedback");
          errorMensaje.innerText = errors.password;
          passwordField.parentNode.appendChild(errorMensaje);
        }
      }
    },
  });
}

function register() {
  let nombrecompleto = document.getElementById("nombrecompletoreg").value;
  let email = document.getElementById("emailreg").value;
  let password = document.getElementById("passwordreg").value;

  let formData = {
    nombrecompleto: nombrecompleto,
    email: email,
    password: password,
  };

  $.ajax({
    type: "POST",
    url: "registro.php",
    data: formData,
    success: function (response) {
      let errors = JSON.parse(response);

      if (errors.success) {
        $("#registroModal").modal("hide");
        $("#activationModal").modal("show");
      } else {
        let fields = document.querySelectorAll(".is-invalid");
        fields.forEach((field) => {
          field.classList.remove("is-invalid");
        });

        let feedbacks = document.querySelectorAll(".invalid-feedback");
        feedbacks.forEach((feedback) => {
          feedback.remove();
        });

        if (errors.nombrecompleto) {
          let nombrecompletoField =
            document.getElementById("nombrecompletoreg");
          nombrecompletoField.classList.add("is-invalid");
          let errorMensaje = document.createElement("div");
          errorMensaje.classList.add("invalid-feedback");
          errorMensaje.innerText = errors.nombrecompleto;
          nombrecompletoField.parentNode.appendChild(errorMensaje);
        }

        if (errors.email) {
          let emailField = document.getElementById("emailreg");
          emailField.classList.add("is-invalid");
          let errorMensaje = document.createElement("div");
          errorMensaje.classList.add("invalid-feedback");
          errorMensaje.innerText = errors.email;
          emailField.parentNode.appendChild(errorMensaje);
        }

        if (errors.password) {
          let passwordField = document.getElementById("passwordreg");
          passwordField.classList.add("is-invalid");
          let errorMensaje = document.createElement("div");
          errorMensaje.classList.add("invalid-feedback");
          errorMensaje.innerText = errors.password;
          passwordField.parentNode.appendChild(errorMensaje);
        }
      }
    },
    error: function (response) {
      console.log(response);
    },
  });
}
