$(document).ready(function () {
  $("#change_psswd").click(function () {
    $("#change-password-form").toggle();
  });

  $("#change_personal_info").click(function () {
    $("#change-personal-info-form").toggle();
  });

  $("#add_shipping_info").click(function () {
    $("#envio-id").val("");
    $("#shipping-name").val("");
    $("#shipping-address").val("");
    $("#shipping-city").val("");
    $("#shipping-province").val("");
    $("#shipping-postal-code").val("");
    $("#shipping-country").val("");
    $("#add-shipping-info-form").toggle();
  });

  $("#add_billing_info").click(function () {
    $("#facturacion-id").val("");
    $("#billing-name").val("");
    $("#billing-address").val("");
    $("#billing-city").val("");
    $("#billing-province").val("");
    $("#billing-postal-code").val("");
    $("#billing-country").val("");
    $("#add-billing-info-form").toggle();
  });

  $("#save-password").click(function () {
    let currentPassword = $("#current-password").val();
    let newPassword = $("#new-password").val();
    let confirmPassword = $("#confirm-password").val();

    if (newPassword !== confirmPassword) {
      $.bootstrapGrowl("Las contraseñas no coinciden", {
        type: "danger",
        delay: 2000,
        width: "1000px",
      });
      return;
    }

    $.ajax({
      url: "acciones_perfil.php",
      type: "POST",
      data: {
        action: "change_password",
        currentPassword: currentPassword,
        newPassword: newPassword,
      },
      success: function (response) {
        console.log(response);
        response = JSON.parse(response);
        if (response.status === "success") {
          $.bootstrapGrowl(response.message, {
            type: "success",
            delay: 2000,
            width: "1000px",
          });
          $("#change-password-form").toggle();
        } else {
          $.bootstrapGrowl(response.message, {
            type: "danger",
            delay: 2000,
            width: "1000px",
          });
        }
      },
    });

    
  });

  $("#save-personal-info").click(function () {
    let nombre = $("#name").val();
    let telefono = $("#phone").val();
    let foto = $("#profile-picture")[0].files[0];

    let formData = new FormData();
    formData.append("action", "change_personal_info");
    formData.append("nombre", nombre);
    formData.append("telefono", telefono);
    formData.append("foto", foto);

    $.ajax({
      url: "acciones_perfil.php",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(response);
        response = JSON.parse(response);
        if (response.status === "success") {
          $.bootstrapGrowl(response.message, {
            type: "success",
            delay: 2000,
            width: "1000px",
          });
          $("#change-personal-info-form").toggle();
        } else {
          $.bootstrapGrowl(response.message, {
            type: "danger",
            delay: 2000,
            width: "1000px",
          });
        }
      },
    });
  });

  $("#save-shipping-info").click(function () {
    let id = $("#envio-id").val();
    let nombre = $("#shipping-name").val();
    let direccion = $("#shipping-address").val();
    let ciudad = $("#shipping-city").val();
    let provincia = $("#shipping-province").val();
    let codigoPostal = $("#shipping-postal-code").val();
    let pais = $("#shipping-country").val();

    $.ajax({
      url: "acciones_perfil.php",
      type: "POST",
      data: {
        action: "save_shipping_info",
        id: id,
        nombre: nombre,
        direccion: direccion,
        ciudad: ciudad,
        provincia: provincia,
        codigoPostal: codigoPostal,
        pais: pais,
      },
      success: function (response) {
        console.log(response);
        response = JSON.parse(response);
        if (response.status === "success") {
          $.bootstrapGrowl(response.message, {
            type: "success",
            delay: 2000,
            width: "1000px",
          });
          $("#add-shipping-info-form").toggle();
        } else {
          $.bootstrapGrowl(response.message, {
            type: "danger",
            delay: 2000,
            width: "1000px",
          });
        }
      },
    });
  });

  $("#save-billing-info").click(function () {
    let id = $("#facturacion-id").val();
    let nombre = $("#billing-name").val();
    let direccion = $("#billing-address").val();
    let ciudad = $("#billing-city").val();
    let provincia = $("#billing-province").val();
    let codigoPostal = $("#billing-postal-code").val();
    let pais = $("#billing-country").val();

    $.ajax({
      url: "acciones_perfil.php",
      type: "POST",
      data: {
        action: "save_billing_info",
        id: id,
        nombre: nombre,
        direccion: direccion,
        ciudad: ciudad,
        provincia: provincia,
        codigoPostal: codigoPostal,
        pais: pais,
      },
      success: function (response) {
        console.log(response);
        response = JSON.parse(response);
        if (response.status === "success") {
          $.bootstrapGrowl(response.message, {
            type: "success",
            delay: 2000,
            width: "1000px",
          });
          $("#add-billing-info-form").toggle();
        } else {
          $.bootstrapGrowl(response.message, {
            type: "danger",
            delay: 2000,
            width: "1000px",
          });
        }
      },
    });
  });
});

function showEditFormShipping(
  id,
  nombre,
  direccion,
  ciudad,
  provincia,
  codigoPostal,
  pais
) {
  $("#envio-id").val(id);
  $("#shipping-name").val(nombre);
  $("#shipping-address").val(direccion);
  $("#shipping-city").val(ciudad);
  $("#shipping-province").val(provincia);
  $("#shipping-postal-code").val(codigoPostal);
  $("#shipping-country").val(pais);
  $("#add-shipping-info-form").toggle();
}

function showEditForm(
  id,
  nombre,
  direccion,
  ciudad,
  provincia,
  codigoPostal,
  pais
) {
  $("#facturacion-id").val(id);
  $("#billing-name").val(nombre);
  $("#billing-address").val(direccion);
  $("#billing-city").val(ciudad);
  $("#billing-province").val(provincia);
  $("#billing-postal-code").val(codigoPostal);
  $("#billing-country").val(pais);
  $("#add-billing-info-form").toggle();
}

function previewImage(event) {
  const input = event.target;
  const reader = new FileReader();
  reader.onload = function () {
    const dataURL = reader.result;
    const output = document.getElementById("profile-image");
    output.src = dataURL;
  };
  reader.readAsDataURL(input.files[0]);
}
