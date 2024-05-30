<?php

require_once("../Middleware/LoggedIn.php");
require_once("../Model/consultas_usuarios.php");

if (isLoggedIn()) {
    $usuario = $_SESSION['usuario'];
    $perfil_usuario = getUserByEmail($usuario);

    $datos_facturacion = getDatosFacturacion($perfil_usuario['idUsuario']);
    $datos_envio = getDatosEnvio($perfil_usuario['idUsuario']);

    if ($_COOKIE['mensaje'] = true && isset($_COOKIE['mensaje'])) {
        $mensaje = true;
        setcookie('mensaje', false, time() + 1, '/');
    }

    include("../Vista/profile.view.php");
} else {
    header("Location: welcome.php");
}