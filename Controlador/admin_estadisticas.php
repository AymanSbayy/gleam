<?php

require_once("../Middleware/LoggedIn.php");
require_once("../Middleware/isAdmin.php");
require_once("../Model/consultas_usuarios.php");
require_once("../Model/consultas_productos.php");

//Cogeremos todas las compras realizadas en nuestra tienda, y crearemos una estadisiciaa
$compras = getCompras();



//Cogeremos todos los productos vendidos en nuestra tienda, y crearemos una estadística anual, otra mensual y otra semanal de los productos vendidos.
$productosVendidos = getProductosVendidos();
$productosVendidosAnual = array();
$productosVendidosMensual = array();
$productosVendidosSemanal = array();
$ventasAnuales = 0;
$ventasMensuales = 0;
$ventasSemanales = 0;

foreach ($productosVendidos as $producto) {
    $fecha = new DateTime($producto['fecha']);
    $fechaActual = new DateTime();
    $diferencia = $fechaActual->diff($fecha);
    if ($diferencia->y == 0) {
        $productosVendidosAnual[] = $producto;
        $ventasAnuales += $producto['total'];
    }
    if ($diferencia->m == 0) {
        $productosVendidosMensual[] = $producto;
        $ventasMensuales += $producto['total'];
    }
    if ($diferencia->d <= 7) {
        $productosVendidosSemanal[] = $producto;
        $ventasSemanales += $producto['total'];
    }
}


//Estadísticas de las ganancias obtenidas, tanto totales, anuales, mensuales, semanales y diarias.
$gananciasTotales = 0;
$gananciasAnuales = 0;
$gananciasMensuales = 0;
$gananciasSemanales = 0;
$gananciasDiarias = 0;
$comprasAnuales = 0;
$comprasMensuales = 0;
$comprasSemanales = 0;
$comprasDiarias = 0;


foreach ($compras as $compra) {
    $gananciasTotales += $compra['total'];
    $fecha = new DateTime($compra['fecha']);
    $fechaActual = new DateTime();
    $diferencia = $fechaActual->diff($fecha);
    if ($diferencia->y == 0) {
        $comprasAnuales += $compra['total'];
        
    }
    if ($diferencia->m == 0) {
        $comprasMensuales += $compra['total'];
    }
    if ($diferencia->d <= 7) {
        $comprasSemanales += $compra['total'];
    }
    if ($diferencia->d == 0) {
        $comprasDiarias += $compra['total'];
    }
}

$gananciasMensuales = $ventasMensuales - $comprasMensuales;
$gananciasSemanales = $ventasSemanales - $comprasSemanales;

$comprasDiarias = 0;
$ventasDiarias = 0;
$gananciasDiarias = 0;
$ventasDiarias = 0;
$countCompras = 0;
$countVentas = 0;
$gananciasDiarias = 0;

foreach ($compras as $compra) {
    $fecha = new DateTime($compra['fecha']);
    $hora = new DateTime($compra['hora']);
    $fechaActual = new DateTime();
    $diferencia = $fechaActual->diff($fecha);
    if ($diferencia->d == 0 && $fecha->format('Y-m-d') === $fechaActual->format('Y-m-d')) {
        $comprasDiarias += $compra['total'];
        $countCompras++;
    }
}

foreach ($productosVendidos as $producto) {
    $fecha = new DateTime($producto['fecha']);
    $hora = new DateTime($producto['hora']);
    $fechaActual = new DateTime();
    $diferencia = $fechaActual->diff($fecha);
    if ($diferencia->d == 0 && $fecha->format('Y-m-d') === $fechaActual->format('Y-m-d')) {
        $ventasDiarias += $producto['total'];
        $countVentas++;
    }
}


$productosVendidosDiarios = array();
foreach ($productosVendidos as $producto) {
    $fecha = new DateTime($producto['fecha']);
    $hora = new DateTime($producto['hora']);
    $fechaActual = new DateTime();
    $diferencia = $fechaActual->diff($fecha);
    if ($diferencia->d == 0) {
        // Check if the sale was made today
        if ($fecha->format('Y-m-d') === $fechaActual->format('Y-m-d')) {
            $productosVendidosDiarios[] = $producto;
        }
    }
}

$comprasHora = array_fill(0, 24, 0);
$ventasHora = array_fill(0, 24, 0);

foreach ($compras as $compra) {
    $fecha = new DateTime($compra['fecha'] . ' ' . $compra['hora']);
    $hora = $fecha->format('H');
    $comprasHora[(int)$hora]++;
}

foreach ($productosVendidos as $producto) {
    $fecha = new DateTime($producto['fecha'] . ' ' . $producto['hora']);
    $hora = $fecha->format('H');
    $ventasHora[(int)$hora]++;
}

$gananciasDiarias = $ventasDiarias - $comprasDiarias;


include_once("../Vista/Admin/estadisticas.php");