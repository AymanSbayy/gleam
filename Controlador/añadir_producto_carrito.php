<?php

require_once("../Model/consultas_productos.php");
require_once("../Middleware/LoggedIn.php");

if (isset($_COOKIE['carrito'])) {
    $carrito = json_decode($_COOKIE['carrito'], true);
} else {
    $carrito = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        $codigo_barras = $_POST['codigo_barras'];
        $cantidad = $_POST['cantidad'];
        $productIndex = -1;
        foreach ($carrito as $index => $item) {
            if ($item['codigo_barras'] === $codigo_barras) {
                $productIndex = $index;
                break;
            }
        }

        if ($productIndex !== -1) {
            $carrito[$productIndex]['cantidad'] = $cantidad;
            $unidades_totales_del_carrito = 0;
            foreach ($carrito as $item) {
                $unidades_totales_del_carrito += $item['cantidad'];
            }
            setcookie('carrito', json_encode($carrito), time() + (1800), '/');
            $response = [
                'status' => 'success',
                'data' => 'Cantidad actualizada correctamente',
                'unidades_totales_del_carrito' => $unidades_totales_del_carrito
            ];
            echo json_encode($response);
            exit;
        }
    }




    $codigo_barras = $_POST['codigo_barras'];
    $cantidad = $_POST['cantidad'];
    $existingProduct = 0;

    $productIndex = -1;
    foreach ($carrito as $index => $item) {
        if ($item['codigo_barras'] === $codigo_barras) {
            $productIndex = $index;
            break;
        }
    }

    if ($productIndex !== -1) {
        $carrito[$productIndex]['cantidad'] += $cantidad;
        $existingProduct = 1;
        $cantidad = $carrito[$productIndex]['cantidad'];
    } else {
        $carrito[] = [
            'codigo_barras' => $codigo_barras,
            'cantidad' => $cantidad
        ];
    }

    $producto_del_carrito = getProductoByCodigoBarras($codigo_barras);
    $stock_producto_carrito = getStockByProducto($producto_del_carrito['idProducto']);

    setcookie('carrito', json_encode($carrito), time() + (1800), '/');

    $unidades_totales_del_carrito = 0;
    foreach ($carrito as $item) {
        $unidades_totales_del_carrito += $item['cantidad'];
    }
    $response = [
        'status' => 'success',
        'data' => 'Producto añadido al carrito correctamente',
        'producto' => $producto_del_carrito,
        'cantidad' => $cantidad,
        'stock' => $stock_producto_carrito['cantidadDisponible'],
        'existingProduct' => $existingProduct,
        'unidades_totales_del_carrito' => $unidades_totales_del_carrito
    ];
    echo json_encode($response);
    exit;
}
