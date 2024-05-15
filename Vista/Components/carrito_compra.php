<?php

require_once("../Model/consultas_productos.php");
require_once("../Middleware/LoggedIn.php");

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
                                        echo "<span id='preu_producte'>" . number_format($productos_carrito['precio'], 2, ',', '.') . " €</span>";
                                    }
                                    ?>
                                </strong>
                                <input type="number" value="<?php echo $cantidad_carrito; ?>" class="form-control cantidad" style="width: 60px;" min="1" max="<?php echo $stock_carrito['cantidadDisponible']; ?>" id="cantidad_<?php echo $productos_carrito['codigo_barras']; ?>" onchange="añadirTotal()"> <a class="trash-can">
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
                            $total += ($productos_carrito['precio'] - ($productos_carrito['precio'] * $productos_carrito['descuento'] / 100)) * $producto_carrito['cantidad'];
                        } else {
                            $total += $productos_carrito['precio'] * $producto_carrito['cantidad'];
                        }
                    }
                    ?>
                    <h5 id="total"><?php echo "Total: " . number_format($total, 2, ',', '.') . " €"; ?></h5>
                </div>
                <button style="width: 100%; background-color:#21164e;" type="button" class="btn btn-dark" onclick="location.href='checkout.php'">Ir al checkout</button>
            </div>
        </div>
    </div>
</div>