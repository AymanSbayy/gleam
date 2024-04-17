<?php
session_start();

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
    $productos = getAllProducts();
}else{
    $productos = getProducts($categoria);
}

$total_productos = count($productos);
$total_paginas = ceil($total_productos / $productos_por_pagina);
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

//Esta es una variable que contiene una array con los valores de la base de datos idCategoria y nombre
$categorias = getCaregories();

//Esta es una variable que contiene una array con los valores de la base de datos idSubcategoria, nombre y idCategoria
$subcategorias = getSubcategories();

include "../Vista/shop.view.php";