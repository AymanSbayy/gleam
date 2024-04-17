<?php

require_once("../Model/consultas_productos.php");
require_once("../Model/consultas_categorias.php");

$validCategories = array("deportes", "hogar_jardineria", "electrodomesticos");

if (isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];
    if (in_array($categoria, $validCategories)) {
        $categoriaId = getCategoryId($categoria);
        $productos = getProducts($categoriaId);
        header('Content-Type: application/json');
        echo json_encode($productos);
    } else {
        if ($categoria === "all") {
            $productos = getAllProducts();
            header('Content-Type: application/json');
            echo json_encode($productos);
        } else {
            $subCategoriaId = getSubcategoryId($categoria);
            $productos = getProductsBySubcategory($subCategoriaId);
            header('Content-Type: application/json');
            echo json_encode($productos);
        }
    }
}
