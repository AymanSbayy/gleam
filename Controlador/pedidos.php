<?php

require_once("../Middleware/LoggedIn.php");
require_once("../Model/consultas_usuarios.php");
require_once("../Model/consultas_productos.php");

if (isLoggedIn()) {
    $usuario = $_SESSION['usuario'];
    $perfil_usuario = getUserByEmail($usuario);

    if ($_COOKIE['mensaje'] = true && isset($_COOKIE['mensaje'])) {
        $mensaje = true;
    }
    setcookie('mensaje', false, time() + 1, '/');

    $productos_pedidos = getProductosPedidos($perfil_usuario['idUsuario']);

    foreach ($productos_pedidos as $producto) {
        $producto['stock'] = getStock($producto['idProducto']);
    }

    include("../Vista/pedidos.view.php");
} else {
    header("Location: welcome.php");
}

