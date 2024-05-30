$(document).ready(function () {
  $("#nueva_direccion").click(function () {
    $("#selectedAddress").val("");
    $("#shipping-name").val("");
    $("#shipping-address").val("");
    $("#shipping-city").val("");
    $("#shipping-province").val("");
    $("#shipping-postal-code").val("");
    $("#shipping-country").val("");
    $("#add-shipping-info-form").toggle();
  });

  $("#nueva_facturacion").click(function () {
    $("#selectedBillingAddress").val("");
    $("#billing-name").val("");
    $("#billing-address").val("");
    $("#billing-city").val("");
    $("#billing-province").val("");
    $("#billing-postal-code").val("");
    $("#billing-country").val("");
    $("#add-billing-info-form").toggle();
  });

  $(".payment-logo").click(function () {
    $(this).closest(".payment-card").click();
  });

  $("#paga_visa").click(function () {
    $("#mastercard-form").hide();
    $("#paypal-form").hide();
    $("#visa-form").toggle();
  });

  $("#paga_masterc").click(function () {
    $("#visa-form").hide();
    $("#paypal-form").hide();
    $("#mastercard-form").toggle();
  });

  $("#paga_paypal").click(function () {
    $("#visa-form").hide();
    $("#mastercard-form").hide();
    $("#paypal-form").toggle();
  });

  $("#añadir-direccion-envio").click(function () {
    let nombre = $("#shipping-name").val();
    let direccion = $("#shipping-address").val();
    let ciudad = $("#shipping-city").val();
    let provincia = $("#shipping-province").val();
    let codigoPostal = $("#shipping-postal-code").val();
    let pais = $("#shipping-country").val();

    $.ajax({
      type: "POST",
      url: "acciones_perfil.php",
      data: {
        nombre: nombre,
        direccion: direccion,
        ciudad: ciudad,
        provincia: provincia,
        codigoPostal: codigoPostal,
        pais: pais,
        action: "save_shipping_info",
      },
      success: function (response) {
        console.log(response);
        response = JSON.parse(response);
        if (response.status === "success") {
          $.bootstrapGrowl(response.message, {
            type: "success",
            delay: 2000,
          });
          $("#add-shipping-info-form").hide();
          location.reload();
        } else {
          $.bootstrapGrowl(response.message, {
            type: "danger",
            delay: 2000,
          });
        }
      },
    });
  });

  $("#añadir-direccion-facturacion").click(function () {
    let name = $("#billing-name").val();
    let address = $("#billing-address").val();
    let city = $("#billing-city").val();
    let province = $("#billing-province").val();
    let postalCode = $("#billing-postal-code").val();
    let country = $("#billing-country").val();

    $.ajax({
      type: "POST",
      url: "acciones_perfil.php",
      data: {
        nombre: name,
        direccion: address,
        ciudad: city,
        provincia: province,
        codigoPostal: postalCode,
        pais: country,
        action: "save_billing_info",
      },
      success: function (response) {
        response = JSON.parse(response);
        console.log(response);
        if (response.status === "success") {
          $.bootstrapGrowl(response.message, {
            type: "success",
            delay: 2000,
          });

          $("#add-billing-info-form").hide();
          location.reload();
        } else {
          $.bootstrapGrowl(response.message, {
            type: "danger",
            delay: 2000,
          });
        }
      },
    });
  });

  $("#realizar_pedido").click(function () {
    let selectedAddress = $("#selectedAddress").val();
    let selectedBillingAddress = $("#selectedBillingAddress").val();
    let selectedPaymentMethod = $("#selectedPaymentMethod").val();

    if (selectedAddress == "") {
      $.bootstrapGrowl("Selecciona una dirección de envío", {
        type: "danger",
        delay: 2000,
      });
      return;
    }
    if (selectedBillingAddress == "") {
      $.bootstrapGrowl("Selecciona una dirección de facturación", {
        type: "danger",
        delay: 2000,
      });
      return;
    }
    if (selectedPaymentMethod == "") {
      $.bootstrapGrowl("Selecciona un método de pago", {
        type: "danger",
        delay: 2000,
      });
      return;
    }
    let payingData = {};
    if (selectedPaymentMethod == "visa") {
      payingData = {
        method: "visa",
        name: $("#visa-name").val(),
        number: $("#visa-number").val(),
        expiry: $("#visa-expiry").val(),
        cvc: $("#visa-cvc").val(),
      };
    } else if (selectedPaymentMethod == "mastercard") {
      payingData = {
        method: "mastercard",
        name: $("#mastercard-name").val(),
        number: $("#mastercard-number").val(),
        expiry: $("#mastercard-expiry").val(),
        cvc: $("#mastercard-cvc").val(),
      };
    } else if (selectedPaymentMethod == "paypal") {
      payingData = {
        method: "paypal",
        email: $("#paypal-email").val(),
      };
    }

    $.ajax({
      type: "POST",
      url: "realizar_pedido.php",
      data: {
        selectedAddress: selectedAddress,
        selectedBillingAddress: selectedBillingAddress,
        payingData: payingData,
        action: "realizar_pedido",
      },
      success: function (response) {
        console.log(response);
        response = JSON.parse(response);
        if (response.status === "success") {
          $.bootstrapGrowl(response.message, {
            type: "success",
            delay: 2000,
          });
          window.location.href = "perfil.php";
        } else {
          $.bootstrapGrowl(response.message, {
            type: "danger",
            delay: 2000,
          });
        }
      },
    });
  });
});

function selectDireccionEnvio(id, element) {
  if (element.classList.contains("selected-envio")) {
    element.classList.remove("selected-envio");
    document.getElementById("selectedAddress").value = "";
  } else {
    document
      .querySelectorAll('[name="custom-select-envio"]')
      .forEach((card) => {
        card.classList.remove("selected-envio");
      });

    element.classList.add("selected-envio");
    document.getElementById("selectedAddress").value = id;
  }
}

function selectDireccionFacturacion(id, element) {
  if (element.classList.contains("selected-facturacion")) {
    element.classList.remove("selected-facturacion");
    document.getElementById("selectedBillingAddress").value = "";
  } else {
    document
      .querySelectorAll('[name="custom-select-facturacion"]')
      .forEach((card) => {
        card.classList.remove("selected-facturacion");
      });

    element.classList.add("selected-facturacion");
    document.getElementById("selectedBillingAddress").value = id;
  }
}

function selectPaymentMethod(id, element) {
  if (element.classList.contains("selected")) {
    element.classList.remove("selected");
    document.getElementById("selectedPaymentMethod").value = "";
  } else {
    document.querySelectorAll(".payment-card").forEach((card) => {
      card.classList.remove("selected");
    });
    element.classList.add("selected");
    document.getElementById("selectedPaymentMethod").value = id;
  }
}

function formatVisaNumber(input) {
    var value = input.value.replace(/\D/g, "");
    value = value.replace(/(\d{4})/g, '$1 ');
    input.value = value;
}

function formatVisaExpiry(input) {
  var value = input.value.replace(/\D/g, "");
  if (value.length > 2) {
    value = value.substring(0, 2) + "/" + value.substring(2);
  }
  input.value = value;
}

function formatMastercardNumber(input) {
    var value = input.value.replace(/\D/g, "");
    value = value.replace(/(\d{4})/g, '$1 ');
    input.value = value;
}

function formatMastercardExpiry(input) {
  var value = input.value.replace(/\D/g, "");
  if (value.length > 2) {
    value = value.substring(0, 2) + "/" + value.substring(2);
  }
  input.value = value;
}
