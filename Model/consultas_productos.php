<?php

require_once("../database/pdo.php");

function getActiveProducts()
{
    $conn = connexion();
    $sql = "SELECT * FROM productos WHERE activo = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $productos;
}

function getAllProducts()
{
    $conn = connexion();
    $sql = "SELECT * FROM productos";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $productos;
}

function getActiveProductsByCategory($categoria)
{
    $conn = connexion();
    $sql = "SELECT * FROM productos WHERE idCategoria = :categoria AND activo = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $productos;
}

function getActiveProductsBySubcategory($subcategoria)
{
    $conn = connexion();
    $sql = "SELECT * FROM productos WHERE idSubcategoria = :subcategoria AND activo = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':subcategoria', $subcategoria);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $productos;
}

function añadirProducto($nombre, $precio, $descripcion, $categoria, $subcategoria, $imagen, $codigo_barras, $unidades, $descuento, $aumento_iva)
{
    $codigo_barras = strtoupper($codigo_barras);
    if ($categoria === "Hogar y jardineria") {
        $categoria = 1;
    } else if ($categoria === "Deportes") {
        $categoria = 3;
    } else if ($categoria === "Electrodomesticos") {
        $categoria = 2;
    }

    if ($subcategoria === "Ciclismo") {
        $subcategoria = 1;
    } else if ($subcategoria === "Jardineria") {
        $subcategoria = 2;
    } else if ($subcategoria === "Decoracion floral") {
        $subcategoria = 3;
    } else if ($subcategoria === "Interiores") {
        $subcategoria = 4;
    } else if ($subcategoria === "Fitness") {
        $subcategoria = 5;
    } else if ($subcategoria === "Acuaticos") {
        $subcategoria = 6;
    } else if ($subcategoria === "Entretenimiento") {
        $subcategoria = 7;
    } else if ($subcategoria === "Hogar") {
        $subcategoria = 8;
    } else if ($subcategoria === "Cocina") {
        $subcategoria = 9;
    } 

    $conn = connexion();
    $sql = "INSERT INTO productos (nombre, precio, descripcion, idCategoria, idSubcategoria, imagen, codigo_barras, descuento, IVA, activo) VALUES (:nombre, :precio, :descripcion, :categoria, :subcategoria, :imagen, :codigo_barras, :descuento, :aumento_iva, :activo)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':nombre', $nombre);
    $stmt->bindValue(':precio', $precio);
    $stmt->bindValue(':descripcion', $descripcion);
    $stmt->bindValue(':categoria', $categoria);
    $stmt->bindValue(':subcategoria', $subcategoria);
    $stmt->bindValue(':imagen', $imagen);
    $stmt->bindValue(':codigo_barras', $codigo_barras);
    $stmt->bindValue(':descuento', $descuento);
    $stmt->bindValue(':aumento_iva', $aumento_iva);
    $stmt->bindValue(':activo', 1);
    $stmt->execute();
    return true;
}

function getProductoByCodigoBarras($codigo_barras)
{
    $conn = connexion();
    $sql = "SELECT * FROM productos WHERE codigo_barras = :codigo_barras";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':codigo_barras', $codigo_barras);
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);
    return $producto;
}

function existeProducto($producto)
{
    $conn = connexion();
    $sql = "SELECT * FROM stocks WHERE idProducto = :idProducto";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idProducto', $producto);
    $stmt->execute();
    $stock = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($stock) {
        return true;
    } else {
        return false;
    }
}
function existeProducto2($codigo_barras)
{
    $conn = connexion();
    $sql = "SELECT * FROM productos WHERE codigo_barras = :codigo_barras";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':codigo_barras', $codigo_barras);
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($producto) {
        return true;
    } else {
        return false;
    }
}

function añadirStock($producto, $unidades)
{
    $conn = connexion();
    $sql = "UPDATE stocks SET cantidadDisponible = cantidadDisponible + :unidades WHERE idProducto = :idProducto";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':unidades', $unidades);
    $stmt->bindParam(':idProducto', $producto);
    $stmt->execute();
    $sql = "SELECT SUM(cantidadDisponible) AS stockTotal FROM stocks WHERE idProducto = :idProducto";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idProducto', $producto);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stockTotal = $result['stockTotal'];
    return $stockTotal;
}

function insertarProducto($producto, $unidades)
{
    $conn = connexion();
    $sql = "INSERT INTO stocks (idProducto, cantidadDisponible) VALUES (:idProducto, :unidades)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idProducto', $producto);
    $stmt->bindParam(':unidades', $unidades);
    $stmt->execute();
    $sql = "SELECT SUM(cantidadDisponible) AS stockTotal FROM stocks WHERE idProducto = :idProducto";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idProducto', $producto);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stockTotal = $result['stockTotal'];
    return $stockTotal;
}

function insertarCompra($producto, $unidades, $total)
{
    $conn = connexion();
    $sql = "INSERT INTO compra (producto, cantidad, total, fecha, hora) VALUES (:producto, :unidades, :total, NOW(), CURTIME())";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':producto', $producto);
    $stmt->bindParam(':unidades', $unidades);
    $stmt->bindParam(':total', $total);
    $stmt->execute();
    return true;
}


function getStock()
{
    $conn = connexion();
    $sql = "SELECT * FROM stocks";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stock = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $stock;
}

function getStockByProducto($producto)
{
    $conn = connexion();
    $sql = "SELECT * FROM stocks WHERE idProducto = :idProducto";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idProducto', $producto);
    $stmt->execute();
    $stock = $stmt->fetch(PDO::FETCH_ASSOC);
    return $stock;
}

function eliminarProducto($producto)
{
    $conn = connexion();
    $sql = "DELETE FROM productos WHERE idProducto = :idProducto";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idProducto', $producto);
    $stmt->execute();
    return true;
}
function editarProducto($producto, $nombre, $precio, $descripcion, $imagen, $descuento)
{
    $conn = connexion();
    $sql = "UPDATE productos SET nombre = :nombre, precio = :precio, descripcion = :descripcion, imagen = :imagen, descuento = :descuento WHERE idProducto = :idProducto";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':imagen', $imagen);
    $stmt->bindParam(':descuento', $descuento);
    $stmt->bindParam(':idProducto', $producto);
    $stmt->execute();
    return true;
}
function registrarVenta($producto, $unidades, $idUsuario, $total)
{
    $conn = connexion();
    $sql = "INSERT INTO ventas (idProducto, idUsuario, cantidad, total, fecha, hora, llegaEl) VALUES (:producto, :idUsuario, :unidades, :total, NOW(), CURTIME(), DATE_ADD(NOW(), INTERVAL 2 DAY))";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':producto', $producto);
    $stmt->bindParam(':idUsuario', $idUsuario);
    $stmt->bindParam(':unidades', $unidades);
    $stmt->bindParam(':total', $total, PDO::PARAM_STR);
    $stmt->execute();
    return true;
}

function registrarPedido($idUsuario, $direccion, $facturacion, $total, $metodoPago)
{
    $conn = connexion();
    $sql = "INSERT INTO pedidos (idUsuario, fecha, direccion, facturacion, total, metodoPago) VALUES (:idUsuario, NOW(), :direccion, :facturacion, :total, :metodoPago)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idUsuario', $idUsuario);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':facturacion', $facturacion);
    $stmt->bindParam(':total', $total, PDO::PARAM_STR);
    $stmt->bindParam(':metodoPago', $metodoPago);
    $stmt->execute();
    return true;
}

function updateStock($producto, $stock)
{
    $conn = connexion();
    $sql = "UPDATE stocks SET cantidadDisponible = :stock WHERE idProducto = :idProducto";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':idProducto', $producto);
    $stmt->execute();
    return true;
}

function getProductosPedidos($idUsuario)
{
    $conn = connexion();
    $sql = "SELECT * FROM ventas WHERE idUsuario = :idUsuario";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idUsuario', $idUsuario);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $productos;
}

function getProductoById($idProducto)
{
    $conn = connexion();
    $sql = "SELECT * FROM productos WHERE idProducto = :idProducto";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idProducto', $idProducto);
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);
    return $producto;
}

function getCompras()
{
    $conn = connexion();
    $sql = "SELECT * FROM compra";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $compras = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $compras;
}

function getProductosVendidos()
{
    $conn = connexion();
    $sql = "SELECT * FROM ventas";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $productos;
}

function getComprasLastWeek()
{
    $conn = connexion();
    $sql = "SELECT * FROM compra WHERE fecha >= DATE_SUB(NOW(), INTERVAL 1 WEEK)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $compras = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $compras;
}

function getComprasLastMonth()
{
    $conn = connexion();
    $sql = "SELECT * FROM compra WHERE fecha >= DATE_SUB(NOW(), INTERVAL 1 MONTH)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $compras = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $compras;
}

function getComprasLastYear()
{
    $conn = connexion();
    $sql = "SELECT * FROM compra WHERE fecha >= DATE_SUB(NOW(), INTERVAL 1 YEAR)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $compras = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $compras;
}