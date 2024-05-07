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

function getSubcategoriesByCategory($idCategoria){
    $conn = connexion();
    $sql = "SELECT * FROM subcategorias WHERE idCategoria = :idCategoria";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idCategoria', $idCategoria);
    $stmt->execute();
    $subcategorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $subcategorias;
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

function getCategoriaById($idCategoria){
    $conn = connexion();
    $sql = "SELECT * FROM categorias WHERE idCategoria = :idCategoria";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idCategoria', $idCategoria);
    $stmt->execute();
    $categoria = $stmt->fetch(PDO::FETCH_ASSOC);
    return $categoria;
}

function getSubcategoriaById($idSubcategoria){
    $conn = connexion();
    $sql = "SELECT * FROM subcategorias WHERE idSubcategoria = :idSubcategoria";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idSubcategoria', $idSubcategoria);
    $stmt->execute();
    $subcategoria = $stmt->fetch(PDO::FETCH_ASSOC);
    return $subcategoria;
}

function getSubcategorias(){
    $conn = connexion();
    $sql = "SELECT nombre FROM subcategorias";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $subcategorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $subcategorias;
}

function getCategorias(){
    $conn = connexion();
    $sql = "SELECT nombre FROM categorias";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $categorias;
}

