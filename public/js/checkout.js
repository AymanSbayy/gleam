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
});

function selectDireccionEnvio(id, element) {
    if (element.classList.contains('selected')) {
        element.classList.remove('selected');
        document.getElementById('selectedAddress').value = '';
    } else {
        document.querySelectorAll('.custom-select').forEach(card => {
            card.classList.remove('selected');
        });

        element.classList.add('selected');
        document.getElementById('selectedAddress').value = id;
    }
}

function selectDireccionFacturacion(id, element) {
    if (element.classList.contains('selected')) {
        element.classList.remove('selected');
        document.getElementById('selectedBillingAddress').value = '';
    } else {
        document.querySelectorAll('.perfil-container:nth-of-type(2) .custom-select').forEach(card => {
            card.classList.remove('selected');
        });
        element.classList.add('selected');
        document.getElementById('selectedBillingAddress').value = id;
    }
}

