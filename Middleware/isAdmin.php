<?php
// Comprovem si l'usuari ha iniciat sessió
require_once "LoggedIn.php";
require_once "../Model/consultas_usuarios.php";

// Comprovem si l'usuari es administrador
// en cas contrari, el redirigim a la pagina de llista
// i acabem l'execucio del script
$usuario = $_SESSION['usuario'];
if (isAdmin($usuario) == false) {
    header("Location: ../Controlador/welcome.php");
    exit();
}