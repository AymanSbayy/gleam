function añadirTotal() {
    let total = 0;
    $(".product").each(function() {
        const codigo_barras = $(this).data("codigo");
        const cantidad = parseInt($(`#cantidad_${codigo_barras}`).val());
        const precio = parseFloat($(this).find("#precio_con_descuento").text().replace(" €", "").replace(",", ".")) || parseFloat($(this).find("#precio_producto").text().replace(" €", "").replace(",", "."));
        if (!isNaN(cantidad) && !isNaN(precio)) {
            total += cantidad * precio;
        }
    });
    $("#total").text("Total: " + total.toFixed(2) + " €");
}


function añadirCesta(codigo_barras, cantidad) {
  $.ajax({
    url: "añadir_producto_carrito.php",
    type: "POST",
    data: {
      codigo_barras: codigo_barras,
      cantidad: cantidad,
    },
    success: function (response) {
      response = JSON.parse(response);
      if (response.status === "success") {
        $.bootstrapGrowl(response.data, {
          type: "success",
          delay: 2000,
          width: "1000px",
        });

        if (response.existingProduct > 0) {
          const product = $(`#cantidad_${response.producto.codigo_barras}`);
          product.val(response.cantidad);
          $("#n_prodcutos").text(response.unidades_totales_del_carrito);
        } else {
        $("#product-list").append(`
          <div class="product" data-codigo="${response.producto.codigo_barras}">
            <div class="product-image">
              <img src="${response.producto.imagen}" alt="${response.producto.nombre}" class="img-fluid" style="max-width: 100px;">
            </div>
            <div class="product-info">
              <p>${response.producto.nombre}</p>
            </div>
          </div>
          <div class="product" data-codigo="${response.producto.codigo_barras}">
          <strong>
          ${response.producto.descuento > 0 ? `<del id='precio_producto'>${response.producto.precio} €</del> <span id='precio_con_descuento' style='font-size: 18px; margin-left:10px; color:red;'>${response.producto.precio - (response.producto.precio * response.producto.descuento / 100)} €</span>` : `<span id='precio_producto'>${response.producto.precio} €</span>`}
          </strong>
            <input type="number" value="${response.cantidad}" class="form-control cantidad" style="width: 60px;" min="1" max="${response.stock}" id="cantidad_${response.producto.codigo_barras}" onchange="añadirTotal()">
            <a class="trash-can" onclick="eliminarProducto('${response.producto.codigo_barras}')">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 1a.5.5 0 0 1 .5.5V2h4v-.5a.5.5 0 0 1 1 0V2a1.5 1.5 0 0 1-1.5 1.5h-4A1.5 1.5 0 0 1 4 2v-.5a.5.5 0 0 1 1 0V2h4V1H5.5zM4.832 3H11.17l.5.5h1.634a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1h1.634l.5-.5zm9.668 1h-10l-.5.5v9a1.5 1.5 0 0 0 1.5 1.5h8a1.5 1.5 0 0 0 1.5-1.5v-9l-.5-.5zm-6 2a.5.5 0 0 0-.5.5v6a.5.5 0 0 0 1 0v-6a.5.5 0 0 0-.5-.5zm2 0a.5.5 0 0 0-.5.5v6a.5.5 0 0 0 1 0v-6a.5.5 0 0 0-.5-.5z" />
              </svg>
            </a>
          </div>
          <br>
        `);
          $("#n_prodcutos").text(response.unidades_totales_del_carrito);
          $("#empty-cart-message").hide();
        }
        añadirTotal();
      } else {
        $.bootstrapGrowl("Error al añadir producto al carrito", {
          type: "danger",
          delay: 2000,
          width: "1000px",
        });
      }
    },
  });
}

function eliminarProducto(codigo_barras) {
  $.ajax({
    url: "eliminar_producto_carrito.php",
    type: "POST",
    data: {
      codigo_barras: codigo_barras,
    },
    success: function (response) {
      response = JSON.parse(response);
      if (response.status === "success") {
        $.bootstrapGrowl(response.data, {
          type: "success",
          delay: 2000,
          width: "1000px",
        });
        $(`div.product[data-codigo="${response.producto}"]`).remove();
        $("#n_prodcutos").text(response.unidades_totales_del_carrito);
        añadirTotal();

        if (response.unidades_totales_del_carrito === 0) {
          $("#empty-cart-message").show();
        }
      } else {
        $.bootstrapGrowl("Error al eliminar producto del carrito", {
          type: "danger",
          delay: 2000,
          width: "1000px",
        });
      }
    },
  });
}

