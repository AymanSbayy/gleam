<?php
session_start();

require_once("../config.php");


$productos = "";
$productos_por_pagina = 8;
require_once("../Model/consultas_productos.php");
require_once("../Model/consultas_categorias.php");

if (isset($_GET['categoria'])) {
    $categoria = $_GET['categoria'];
    $categoria = getCategoryId($categoria);
}else{
    $categoria = "All";
}

if ($categoria == "All") {
    $productos = getActiveProducts();
}else{
    $productos = getActiveProductsByCategory($categoria);
}

$total_productos = count($productos);
$total_paginas = ceil($total_productos / $productos_por_pagina);
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

$categorias = getCaregories();

$subcategorias = getSubcategories();

include "../Vista/shop.view.php";