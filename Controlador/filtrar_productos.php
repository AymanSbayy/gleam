<?php

require_once("../Model/consultas_productos.php");
require_once("../Model/consultas_categorias.php");

$validCategories = array("Deportes", "Hogar y jardineria", "Electrodomesticos");

if (isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];
    if (in_array($categoria, $validCategories)) {
        $categoriaId = getCategoryId($categoria);
        
        $productos = getActiveProductsByCategory($categoriaId);
        
        header('Content-Type: application/json');
        echo json_encode($productos);
        
    } else {
        if ($categoria === "all") {
            $productos = getActiveProducts();
            header('Content-Type: application/json');
            echo json_encode($productos);
        } else {
            $subCategoriaId = getSubcategoryId($categoria);
            $productos = getActiveProductsBySubcategory($subCategoriaId);
            header('Content-Type: application/json');
            echo json_encode($productos);
        }
    }
}
