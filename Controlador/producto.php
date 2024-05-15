<?php

session_start();

$productos = "";

require_once("../Model/consultas_productos.php");
require_once("../Model/consultas_categorias.php");

if (isset($_GET['codigo_barras'])) {
    $codigo_barras = $_GET['codigo_barras'];
    $productos = getProductoByCodigoBarras($codigo_barras);
    if ($productos) {
        $stock = getStockByProducto($productos['idProducto']);
        $stock = $stock['cantidadDisponible'];
        $subcategoria = getSubcategoriaById($productos['idSubcategoria']);
        $productos_relacionados = getProductosBySubcategoria($productos['idSubcategoria']);
    }
}

include "../Vista/product.view.php";