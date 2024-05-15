<?php

require_once("../Model/consultas_productos.php");
require_once("../Middleware/LoggedIn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo_barras = $_POST['codigo_barras'];
    $carrito = json_decode($_COOKIE['carrito'], true);
    $productIndex = -1;
    foreach ($carrito as $index => $item) {
        if ($item['codigo_barras'] === $codigo_barras) {
            $productIndex = $index;
            break;
        }
    }
    
    if ($productIndex !== -1) {
        unset($carrito[$productIndex]);
        $carrito = array_values($carrito);
        setcookie('carrito', json_encode($carrito), time() + (1800), '/');
        $response = [
            'status' => 'success',
            'data' => 'Producto eliminado del carrito correctamente',
            'producto' => $codigo_barras,
            'unidades_totales_del_carrito' => count($carrito)
        ];
        echo json_encode($response);
        exit;
    } else {
        $response = [
            'status' => 'error',
            'data' => 'Error al eliminar producto del carrito'
        ];
        echo json_encode($response);
        exit;
    }
}