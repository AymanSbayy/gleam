<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("../Model/consultas_categorias.php");

    if (isset($_POST['categoria_id'])) {
        $categoriaId = $_POST['categoria_id'];
        $subcategorias = getSubcategoriesByCategory($categoriaId);
        header('Content-Type: application/json');
        echo json_encode($subcategorias);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    require_once("../Middleware/LoggedIn.php");
    require_once("../Middleware/isAdmin.php");
    require_once("../Model/consultas_usuarios.php");

    $idUsuario = $_GET['id'];
    $accion = $_GET['accion'];

    if ($accion === 'eliminar') {
        try {
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

    $idUsuario = $_GET['id'];
    $accion = $_GET['accion'];

    if ($accion === 'bloquear') {
        try {
            bloquearUser($idUsuario);
            echo json_encode(['message' => 'Usuario bloqueado']);
        } catch (Exception $e) {
            echo json_encode(['message' => $e->getMessage()]);
        }
    } elseif ($accion === 'desbloquear') {
        try {
            desbloquearUser($idUsuario);
            echo json_encode(['message' => 'Usuario desbloqueado']);
        } catch (Exception $e) {
            echo json_encode(['message' => $e->getMessage()]);
        }
    } elseif ($accion === 'quitar-admin') {
        try {
            quitarAdmin($idUsuario);
            echo json_encode(['message' => 'Usuario quitado de administrador']);
        } catch (Exception $e) {
            echo json_encode(['message' => $e->getMessage()]);
        }
    } elseif ($accion === 'hacer-admin') {
        try {
            hacerAdmin($idUsuario);
            echo json_encode(['message' => 'Usuario hecho administrador']);
        } catch (Exception $e) {
            echo json_encode(['message' => $e->getMessage()]);
        }
    }
}
