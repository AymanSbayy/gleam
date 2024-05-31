<?php

require_once("../Middleware/LoggedIn.php");
require_once("../Middleware/isAdmin.php");
require_once("../Model/consultas_usuarios.php");
require_once("../Model/consultas_productos.php");

//Cogeremos todas las compras realizadas en nuestra tienda, y crearemos una estadisiciaa
$compras = getCompras();
$productosVendidos = getProductosVendidos();

$comprasDiarias = 0;
$ventasDiarias = 0;
$gananciasDiarias = 0;
$ventasDiarias = 0;
$countCompras = 0;
$countVentas = 0;
$gananciasDiarias = 0;

$fechaActual = new DateTime();

foreach ($compras as $compra) {
    $fecha = new DateTime($compra['fecha']);
    $hora = new DateTime($compra['hora']);
    if ($fecha->format('Y-m-d') === $fechaActual->format('Y-m-d')) {
        $comprasDiarias += $compra['total'];
        $countCompras++;
    }
}

foreach ($productosVendidos as $producto) {
    $fecha = new DateTime($producto['fecha']);
    $hora = new DateTime($producto['hora']);
    if ($fecha->format('Y-m-d') === $fechaActual->format('Y-m-d')) {
        $ventasDiarias += $producto['total'];
        $countVentas++;
    }
}


$productosVendidosDiarios = array();
foreach ($productosVendidos as $producto) {
    $fecha = new DateTime($producto['fecha']);
    $hora = new DateTime($producto['hora']);
    if ($fecha->format('Y-m-d') === $fechaActual->format('Y-m-d')) {
        $productosVendidosDiarios[] = $producto;
    }
}

$comprasHora = array_fill(0, 24, 0);
$ventasHora = array_fill(0, 24, 0);

foreach ($compras as $compra) {
    $fecha = new DateTime($compra['fecha'] . ' ' . $compra['hora']);
    $hora = $fecha->format('H');
    if ($fecha->format('Y-m-d') === $fechaActual->format('Y-m-d')) {
        $comprasHora[(int)$hora]++;
    }
}

foreach ($productosVendidos as $producto) {
    $fecha = new DateTime($producto['fecha'] . ' ' . $producto['hora']);
    $hora = $fecha->format('H');
    if ($fecha->format('Y-m-d') === $fechaActual->format('Y-m-d')) {
        $ventasHora[(int)$hora]++;
    }
}

$gananciasDiarias = $ventasDiarias - $comprasDiarias;

// Array con los días de la semana
$dias = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");

// Array para las ventas de cada día de la semana
$ventasSemana = array(0, 0, 0, 0, 0, 0, 0);

// Recorremos los productos vendidos y sumamos las ventas de cada día
foreach ($productosVendidos as $producto) {
    $fecha = new DateTime($producto['fecha']);
    $dia = $fecha->format('N'); // 'N' devuelve el día de la semana (1 para lunes, 7 para domingo)
    $ventasSemana[$dia - 1] += $producto['total'];
}

// Convertimos los arrays a JSON
$diasJson = json_encode($dias);
$ventasSemanaJson = json_encode($ventasSemana);




include_once("../Vista/Admin/panel_control.php");

