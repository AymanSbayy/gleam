<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("../Model/consultas_categorias.php");

    // Verificar si se ha enviado el parámetro 'categoria_id'
    if (isset($_POST['categoria_id'])) {
        $categoriaId = $_POST['categoria_id'];
        // Obtener las subcategorías según la categoría proporcionada
        $subcategorias = getSubcategoriesByCategory($categoriaId);
        // Establecer el encabezado de respuesta como JSON
        header('Content-Type: application/json');
        // Devolver las subcategorías en formato JSON
        echo json_encode($subcategorias);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    require_once("../Middleware/LoggedIn.php");
    require_once("../Middleware/isAdmin.php");
    require_once("../Model/consultas_usuarios.php");

    // Obtener los parámetros 'id' y 'accion' de la URL
    $idUsuario = $_GET['id'];
    $accion = $_GET['accion'];

    if ($accion === 'eliminar') {
        try {
            // Eliminar el usuario según el ID proporcionado
            deleteUser($idUsuario);
            echo json_encode(['message' => 'Usuario eliminado']);
        } catch (Exception $e) {
            echo json_encode(['message' => $e->getMessage()]);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    require_once("../Middleware/LoggedIn.php");
    require_once("../Middleware/isAdmin.php");
    require_once("../Model/consultas_usuarios.php");

    // Obtener los parámetros 'id' y 'accion' de la URL
    $idUsuario = $_GET['id'];
    $accion = $_GET['accion'];

    if ($accion === 'bloquear') {
        try {
            // Bloquear al usuario según el ID proporcionado
            bloquearUser($idUsuario);
            echo json_encode(['message' => 'Usuario bloqueado']);
        } catch (Exception $e) {
            echo json_encode(['message' => $e->getMessage()]);
        }
    } elseif ($accion === 'desbloquear') {
        try {
            // Desbloquear al usuario según el ID proporcionado
            desbloquearUser($idUsuario);
            echo json_encode(['message' => 'Usuario desbloqueado']);
        } catch (Exception $e) {
            echo json_encode(['message' => $e->getMessage()]);
        }
    } elseif ($accion === 'quitar-admin') {
        try {
            // Quitar el rol de administrador al usuario según el ID proporcionado
            quitarAdmin($idUsuario);
            echo json_encode(['message' => 'Usuario quitado de administrador']);
        } catch (Exception $e) {
            echo json_encode(['message' => $e->getMessage()]);
        }
    } elseif ($accion === 'hacer-admin') {
        try {
            // Asignar el rol de administrador al usuario según el ID proporcionado
            hacerAdmin($idUsuario);
            echo json_encode(['message' => 'Usuario hecho administrador']);
        } catch (Exception $e) {
            echo json_encode(['message' => $e->getMessage()]);
        }
    }
}
