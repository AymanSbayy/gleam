<?php

require_once("../database/pdo.php");

function getAllProducts()
{
    $conn = connexion();
    $sql = "SELECT * FROM productos";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $productos;
}
function getProducts($categoria)
{
    $conn = connexion();
    $sql = "SELECT * FROM productos WHERE idCategoria = :categoria";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $productos;
}

function getProductsBySubcategory($subcategoria)
{
    $conn = connexion();
    $sql = "SELECT * FROM productos WHERE idSubcategoria = :subcategoria";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':subcategoria', $subcategoria);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $productos;
}