<?php

require_once("../database/pdo.php");

function getCategoryId($nombre){
    $conn = connexion();
    $sql = "SELECT idCategoria FROM categorias WHERE nombre = :nombre";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->execute();
    $categoria = $stmt->fetch(PDO::FETCH_ASSOC);
    return $categoria['idCategoria'];
}

function getSubcategoryId($nombre){
    $conn = connexion();
    $sql = "SELECT idSubcategoria FROM subcategorias WHERE nombre = :nombre";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->execute();
    $subcategoria = $stmt->fetch(PDO::FETCH_ASSOC);
    return $subcategoria['idSubcategoria'];
}


function getCaregories(){
    $conn = connexion();
    $sql = "SELECT * FROM categorias";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $categorias;
}

function getSubcategories(){
    $conn = connexion();
    $sql = "SELECT * FROM subcategorias";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $subcategorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $subcategorias;
}