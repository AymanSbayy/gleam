<?php
require_once("../config.php");

require_once("../Middleware/LoggedIn.php");
require_once("../Model/consultas_productos.php");

$productos = getAllProducts();
$productosVendidos = array();
foreach ($productos as $producto) {
    $producto['vecesVendido'] = 0;
    $productosVendidos[] = $producto;
}
$compras = getCompras();

foreach ($compras as $compra) {
    
    $productosComprados = json_decode($compra['producto'], true);
    if (is_array($productosComprados)) {
        foreach ($productosComprados as $productoComprado) {
            foreach ($productosVendidos as $key => $producto) {
                if ($producto['codigo_barras'] == $productoComprado['codigo_barras']) {
                    $productosVendidos[$key]['vecesVendido'] += $productoComprado['cantidad'];
                }
            }
        }
    }
}
usort($productosVendidos, function ($a, $b) {
    return $b['vecesVendido'] <=> $a['vecesVendido'];
});
$productosVendidos = array_slice($productosVendidos, 0, 10);

include("../Vista/welcome.view.php");