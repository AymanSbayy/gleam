<?php

require_once("../Middleware/LoggedIn.php");
require_once("../Model/consultas_usuarios.php");
require_once("../Model/consultas_productos.php");


if (isLoggedIn()) {


    $user = getUserByEmail($_SESSION['usuario']);
    $direcciones = getDatosEnvio($user['idUsuario']);
    $facturaciones = getDatosFacturacion($user['idUsuario']);
    $productos = [];
    $carrito = json_decode($_COOKIE['carrito'], true);
    if (empty($carrito)) {
        echo "<script>
                alert('El carrito está vacío');
                window.location.href = 'welcome.php';
            </script>";
        exit;
    }
    $subtotal = 0;
    $totalDescuento = 0;
    $ivaProducto = 0;

    foreach ($carrito as $carrito) {
        $producto = getProductoByCodigoBarras($carrito['codigo_barras']);
        $producto['cantidad'] = $carrito['cantidad'];
        array_push($productos, $producto);
        $subtotal += $producto['precio'] * $carrito['cantidad'];
        if ($producto['descuento'] > 0) {
            $totalDescuento += $producto['precio'] * $carrito['cantidad'] * $producto['descuento'] / 100;
        }

        $iva = $producto['IVA'];
        $ivaProducto += $producto['precio'] * $iva / 100;
    }

    $iva = $ivaProducto;

    unset($_SESSION['access_token']);
    include("../Vista/checkout.view.php");
} else {
    header("Location: welcome.php");
}
