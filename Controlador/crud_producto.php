<?php

require_once("../Middleware/LoggedIn.php");
require_once("../Middleware/isAdmin.php");
require_once("../Model/consultas_productos.php");
require_once("../Model/consultas_categorias.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'buscar_producto') {
        $codigo_barras = $_POST['codigo_barras'];

        if (strlen($codigo_barras) !== 13) {
            echo json_encode("El código de barras debe ser un string de 13 caracteres");
            return;
        }

        $producto = getProductoByCodigoBarras($codigo_barras);

        if ($producto) {
            $categoria = getCategoriaById($producto['idCategoria']);
            $subcategoria = getSubcategoriaById($producto['idSubcategoria']);
            $stock = getStockByProducto($producto['idProducto']);
            $stock = $stock['cantidadDisponible'];
            $response = array(
                'producto' => $producto,
                'categoria' => $categoria,
                'subcategoria' => $subcategoria,
                'stock' => $stock
            );
            echo json_encode($response);
        } else {
            echo json_encode("Producto no encontrado");
        }
    } else if (isset($_POST['action']) && $_POST['action'] === 'añadir_producto') {

        if (!isset($_POST['nombre']) || !isset($_POST['precio']) || !isset($_POST['descripcion']) || !isset($_POST['categoria']) || !isset($_POST['subcategoria']) || !isset($_POST['codigo_barras']) || !isset($_POST['unidades']) || !isset($_POST['descuento']) || !isset($_POST['aumento_iva']) || !isset($_POST['total'])) {
            echo json_encode("Tienes que llenar todos los campos");
            return;
        }

        if (!isset($_FILES['imagen'])) {
            echo json_encode("Tienes que subir una imagen");
            return;
        }

        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        $subcategoria = $_POST['subcategoria'];
        $imagen = $_FILES['imagen'];
        $codigo_barras = $_POST['codigo_barras'];
        $unidades = $_POST['unidades'];
        $descuento = $_POST['descuento'];
        $aumento_iva = $_POST['aumento_iva'];
        $total = $_POST['total'];


        if (strlen($codigo_barras) !== 13) {
            echo json_encode("El código de barras debe ser un string de 13 caracteres");
            return;
        }

        if (strlen($nombre) < 3) {
            echo json_encode("El nombre del producto debe tener al menos 3 caracteres");
            return;
        }

        if (strlen($descripcion) < 10) {
            echo json_encode("La descripción del producto debe tener al menos 10 caracteres");
            return;
        }

        if (!is_numeric($unidades)) {
            echo json_encode("Las unidades deben ser un número válido");
            return;
        }

        if (!is_numeric($descuento)) {
            echo json_encode("El descuento debe ser un número válido");
            return;
        }

        if (!is_numeric($aumento_iva)) {
            echo json_encode("El aumento de IVA debe ser un número válido");
            return;
        }

        if (!is_numeric($precio)) {
            echo json_encode("El precio debe ser un número válido");
            return;
        }
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $fileExtension = strtolower(pathinfo($imagen['name'], PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo json_encode("La imagen debe ser un archivo de imagen válido (jpg, jpeg, png, gif)");
            return;
        }

        $imagen = file_get_contents($imagen['tmp_name']);
        $imagen = base64_encode($imagen);
        if (existeProducto2($codigo_barras)) {
            echo json_encode("Este producto ya consta en la base de datos, prueba a comprar más unidades");
            return;
        } else {
            $añadir = añadirProducto($nombre, $precio, $descripcion, $categoria, $subcategoria, $imagen, $codigo_barras, $unidades, $descuento, $aumento_iva);
        }

        $producto = getProductoByCodigoBarras($codigo_barras);
        $producto = $producto['idProducto'];

        if (existeProducto($producto)) {
            $stock = añadirStock($producto, $unidades);
            echo "hola";
        } else {
            $stock = insertarProducto($producto, $unidades);
            echo "pepe";
        }

        $compra = insertarCompra($producto, $unidades, $total);


        if ($añadir) {
            $estado = 1;
            echo json_encode(array(
                "message" => "Producto añadido correctamente",
                "stock" => $stock,
                "codigo_barras" => $codigo_barras,
                "nombre" => $nombre,
                "precio" => $precio,
                "estado" => $estado,
                "producto" => $producto
            ));
        } else {
            echo json_encode("Hubo un error al añadir el producto");
        }
    } else if (isset($_POST['action']) && $_POST['action'] === 'comprar_producto') {
        $codigo_barras = $_POST['codigo_barras'];
        $unidades = $_POST['unidades'];
        $total = $_POST['total'];

        if (empty($unidades)) {
            echo json_encode("Debes introducir un número de unidades");
            return;
        }

        if (!is_numeric($unidades)) {
            echo json_encode("Las unidades deben ser un número válido");
            return;
        }

        $producto = getProductoByCodigoBarras($codigo_barras);
        $producto = $producto['idProducto'];

        if (existeProducto($producto)) {
            $stock = añadirStock($producto, $unidades);
        } else {
            $stock = insertarProducto($producto, $unidades);
        }

        $compra = insertarCompra($producto, $unidades, $total);
        echo json_encode("Producto comprado correctamente");
    } else if (isset($_POST['action']) && $_POST['action'] === 'importar_productos') {
        if (empty($_FILES['file'])) {
            echo json_encode("Debes subir un archivo");
            return;
        }
        if ($_FILES['file']['type'] !== 'text/csv') {
            echo json_encode("El archivo debe ser un CSV");
            return;
        }
        if ($_FILES['file']['size'] > 1000000) {
            echo json_encode("El archivo debe pesar menos de 1MB");
            return;
        }
        if ($_FILES['file']['error'] > 0) {
            echo json_encode("Error al subir el archivo");
            return;
        }
        if (!isset($_FILES['file'])) {
            echo json_encode("Debes subir un archivo");
            return;
        }
        $file = $_FILES['file'];
        $file = file_get_contents($file['tmp_name']);
        $file = explode("\n", $file);
        $productos = array();

        foreach ($file as $key => $line) {
            if ($key === 0) {
                continue;
            }
            $line = explode("|", $line);
            $producto = array(
                'codigo_barras' => $line[0],
                'nombre' => $line[1],
                'precio' => $line[2],
                'cantidad' => $line[3],
                'descripcion' => $line[4],
                'categoria' => $line[5],
                'subcategoria' => $line[6],
                'url_imagen' => $line[7]
            );
            array_push($productos, $producto);
            if (!verificarCategoria($producto['categoria']) || !verificarSubcategoria($producto['subcategoria'])) {
                echo json_encode("Error: La categoría o subcategoría en el producto " . $producto['nombre'] . " no es válida.");
                return;
            }
        }
        foreach ($productos as $producto) {
            $nombre = $producto['nombre'];
            $precio = $producto['precio'];
            $descripcion = $producto['descripcion'];
            $categoria = $producto['categoria'];
            $subcategoria = $producto['subcategoria'];
            $url_imagen = $producto['url_imagen'];
            $codigo_barras = $producto['codigo_barras'];
            $cantidad = $producto['cantidad'];
            $descuento = 0;
            $aumento_iva = 0;
            $total = 0;
            if ($cantidad > 10 && $cantidad <= 50) {
                $descuento = 10;
            } else if ($cantidad > 50 && $cantidad <= 200) {
                $descuento = 20;
            } else if ($cantidad > 200) {
                $descuento = 30;
            }
            $aumento_iva = 21;
            $precio = floatval($precio);
            $aumento_iva = floatval($aumento_iva);
            $descuento = floatval($descuento);
            $total = $precio + ($precio * $aumento_iva / 100) - ($precio * $descuento / 100);

            if (existeProducto2($codigo_barras)) {
                $producto = getProductoByCodigoBarras($codigo_barras);
                $producto = $producto['idProducto'];
                if (existeProducto($producto)) {
                    $stock = añadirStock($producto, $cantidad);
                } else {
                    $stock = insertarProducto($producto, $cantidad);
                }
                $compra = insertarCompra($producto, $cantidad, $total);
            } else {
                $imagen_url = "https://www.tophosteleria.com/764-large_default/liquadora-trituradora-de-vas-tv-500.jpg";
                $imagen_info = @getimagesize($imagen_url);

                if ($imagen_info === false) {
                    echo json_encode("Error: La URL proporcionada en el producto " . $nombre . " no apunta a una imagen válida.");
                    return;
                }

                $imagen = @file_get_contents($imagen_url);
                if ($imagen === false) {
                    echo json_encode("Error: No se pudo descargar la imagen desde la URL proporcionada en el producto " . $nombre);
                    return;
                }

                $imagen_base64 = base64_encode($imagen);
                if (existeProducto2($codigo_barras)) {
                    echo json_encode("Este producto ya consta en la base de datos, prueba a comprar más unidades");
                    return;
                } else {
                    $añadir = añadirProducto($nombre, $precio, $descripcion, $categoria, $subcategoria, $imagen, $codigo_barras, $cantidad, $descuento, $aumento_iva);
                }

                $producto = getProductoByCodigoBarras($codigo_barras);
                $producto = $producto['idProducto'];

                if (existeProducto($producto)) {
                    $stock = añadirStock($producto, $cantidad);
                } else {
                    $stock = insertarProducto($producto, $cantidad);
                }

                $compra = insertarCompra($producto, $cantidad, $total);
            }
        }
        echo json_encode("Los productos se han importado correctamente");
    } else if (isset($_POST['accion']) && $_POST['accion'] === 'eliminar') {
        $id = $_POST['id'];
        $stock = getStockByProducto($id);
        $stock = $stock['cantidadDisponible'];
        if ($stock > 0) {
            echo json_encode("No se puede eliminar un producto con stock");
            return;
        } else {
            echo json_encode("Producto eliminado correctamente");
            eliminarProducto($id);
        }
    } else if (isset($_POST['accion']) && $_POST['accion'] === 'info_producto') {
        $id = $_POST['id'];
        $producto = getProductoByCodigoBarras($id);
        $categoria = getCategoriaById($producto['idCategoria']);
        $subcategoria = getSubcategoriaById($producto['idSubcategoria']);
        $categorias = getCategorias();
        $subcategorias = getSubcategorias();
        $response = array(
            'producto' => $producto,
            'categoria' => $categoria,
            'subcategoria' => $subcategoria,
            'categorias' => $categorias,
            'subcategorias' => $subcategorias
        );
        echo json_encode($response);
    }
}

function verificarCategoria($categoria)
{
    $categorias_validas = array("Hogar y jardineria", "Deportes", "Electrodomesticos");
    return in_array($categoria, $categorias_validas);
}

function verificarSubcategoria($subcategoria)
{
    $subcategorias_validas = array("Ciclismo", "Jardineria", "Decoracion floral", "Interiores", "Fitness", "Acuaticos", "Entretenimiento", "Hogar", "Cocina");
    return in_array($subcategoria, $subcategorias_validas);
}
