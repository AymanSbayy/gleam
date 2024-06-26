<?php

require_once("../Model/consultas_productos.php");
require_once("../Middleware/LoggedIn.php");

$_SESSION['access_token'] = bin2hex(random_bytes(16));

if (isset($_COOKIE['carrito'])) {
  $carrito = json_decode($_COOKIE['carrito'], true);
} else {
  $carrito = [];
}

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-rDh/GhmhSg6ZJB6VeNKyQnletr2cjtwpPOr61UpYk99X4nxP+ldtFzPl0UhNdKHy" crossorigin="anonymous">

<div class="modal fade" id="carritoCompra" tabindex="-1" role="dialog" aria-labelledby="carritoCompraLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-slide-out">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="carritoCompraLabel">Carrito de compras</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>

      </div>
      <div class="modal-body">
        <div id="product-list" name="product-list" class="product-list">
          <?php
          if (empty($carrito)) {
            echo "<h5 id='empty-cart-message'>Aún no hay productos en la cesta</h5>";
          } else {
            foreach ($carrito as $producto_carrito) {
              $productos_carrito = getProductoByCodigoBarras($producto_carrito['codigo_barras']);
              $stock_carrito = getStockByProducto($productos_carrito['idProducto']);
              $cantidad_carrito = $producto_carrito['cantidad'];
          ?>
              <div class="product" id="productos_del_carro" data-codigo="<?php echo $productos_carrito['codigo_barras']; ?>">
                <div class="product-image">
                  <img src="<?php echo $productos_carrito['imagen']; ?>" alt="<?php echo $productos_carrito['nombre']; ?>" class="img-fluid" style="max-width: 100px;">
                </div>
                <div class="product-info">
                  <p><?php echo $productos_carrito['nombre']; ?></p>
                </div>
              </div>
              <div class="product" data-codigo="<?php echo $productos_carrito['codigo_barras']; ?>">
                <strong>
                  <?php
                  if ($productos_carrito['descuento'] > 0) {
                    echo "<del>" . number_format($productos_carrito['precio'], 2, ',', '.') . " €</del>";
                    echo "<span id='precio_con_descuento' style='font-size: 18px; margin-left:10px; color:red;'>" . number_format($productos_carrito['precio'] - ($productos_carrito['precio'] * $productos_carrito['descuento'] / 100), 2, ',', '.') . " €</span>";
                  } else {
                    echo "<span id='precio_producto'>" . number_format($productos_carrito['precio'], 2, ',', '.') . " €</span>";
                  }
                  ?>
                </strong>
                <input type="number" value="<?php echo $cantidad_carrito; ?>" class="form-control cantidad" style="width: 60px;" min="1" max="<?php echo $stock_carrito['cantidadDisponible']; ?>" id="cantidad_<?php echo $productos_carrito['codigo_barras']; ?>" onchange="cambioCantidad('<?php echo $productos_carrito['codigo_barras']; ?>')">
                <a class="trash-can">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" onclick="eliminarProducto('<?php echo $productos_carrito['codigo_barras']; ?>')">
                    <path d="M5.5 1a.5.5 0 0 1 .5.5V2h4v-.5a.5.5 0 0 1 1 0V2a1.5 1.5 0 0 1-1.5 1.5h-4A1.5 1.5 0 0 1 4 2v-.5a.5.5 0 0 1 1 0V2h4V1H5.5zM4.832 3H11.17l.5.5h1.634a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1h1.634l.5-.5zm9.668 1h-10l-.5.5v9a1.5 1.5 0 0 0 1.5 1.5h8a1.5 1.5 0 0 0 1.5-1.5v-9l-.5-.5zm-6 2a.5.5 0 0 0-.5.5v6a.5.5 0 0 0 1 0v-6a.5.5 0 0 0-.5-.5zm2 0a.5.5 0 0 0-.5.5v6a.5.5 0 0 0 1 0v-6a.5.5 0 0 0-.5-.5z" />
                  </svg>
                </a>
              </div>
              <br>
          <?php
            }
          }
          ?>
        </div>

      </div>

      <div class="modal-footer">
        <!-- Total -->
        <div class="total">
          <?php
          $total = 0;
          foreach ($carrito as $producto_carrito) {
            $productos_carrito = getProductoByCodigoBarras($producto_carrito['codigo_barras']);
            if ($productos_carrito['descuento'] > 0) {
                $total += round(($productos_carrito['precio'] - ($productos_carrito['precio'] * $productos_carrito['descuento'] / 100)) * $producto_carrito['cantidad'], 2);
            } else {
              $total += $productos_carrito['precio'] * $producto_carrito['cantidad'];
            }
          }
          ?>
          <h5 id="total"><?php echo "Total: " . number_format($total, 2, ',', '.') . " €"; ?></h5>
        </div>
        <button style="width: 100%; background-color:#21164e;" type="button" class="btn btn-dark" onclick="checkSessionAndCheckout(<?php echo isLoggedIn() ? 'true' : 'false'; ?>)">Finalizar compra</button>
      </div>
    </div>
  </div>
</div>

<script>
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

  function cambioCantidad(codigo_barras) {
    const cantidad = $(`#cantidad_${codigo_barras}`).val();
    $.ajax({
      url: "añadir_producto_carrito.php",
      type: "POST",
      data: {
        codigo_barras: codigo_barras,
        cantidad: cantidad,
        action: "update",
      },
      success: function(response) {
        response = JSON.parse(response);
        if (response.status === "success") {
          $("#n_prodcutos").text(response.unidades_totales_del_carrito);
          añadirTotal();
        } else {
          $.bootstrapGrowl("Error al cambiar la cantidad del producto", {
            type: "danger",
            delay: 2000,
            width: "1000px",
          });
        }
      },
    });
  }

  function añadirCesta(codigo_barras, cantidad) {
    codigo_barras = codigo_barras.toString();
    $.ajax({
      url: "añadir_producto_carrito.php",
      type: "POST",
      data: {
        codigo_barras: codigo_barras,
        cantidad: cantidad,
      },
      success: function(response) {
        console.log(response);
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
            ${response.producto.descuento > 0 ? `<del id='precio_producto'>${response.producto.precio.toFixed(2)} €</del> <span id='precio_con_descuento' style='font-size: 18px; margin-left:10px; color:red;'>${(response.producto.precio - (response.producto.precio * response.producto.descuento / 100)).toFixed(2)} €</span>` : `<span id='precio_producto'>${response.producto.precio.toFixed(2)} €</span>`}
          </strong>
            <input type="number" value="${response.cantidad}" class="form-control cantidad" style="width: 60px;" min="1" max="${response.stock}" id="cantidad_${response.producto.codigo_barras}" onchange="cambioCantidad('${response.producto.codigo_barras}')">
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
          $.bootstrapGrowl(response.data, {
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
      success: function(response) {
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

  function checkSessionAndCheckout(loggedIn) {
    if (loggedIn) {
      window.location.href = "checkout.php?token=<?php echo $_SESSION['access_token']; ?>";
    } else {
      $(".modal").modal("hide");
      $("#loginErrorModal").modal("show");
      $("#loginErrorModal").on("hidden.bs.modal", function() {
        $("#carritoCompra").modal("show");
      });

    }
  }
</script>