<?php 

require_once("../Middleware/LoggedIn.php");
require_once("../Model/consultas_usuarios.php");


    if (isLoggedIn()) {

        
        $user = getUserByEmail($_SESSION['usuario']);
        $direcciones = getDatosEnvio($user['idUsuario']);
        $facturaciones = getDatosFacturacion($user['idUsuario']);
    }
    
    unset($_SESSION['access_token']);
    include("../Vista/checkout.view.php");
