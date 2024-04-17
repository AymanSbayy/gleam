<?php
// Comprovem si l'usuari ha iniciat sessió
require_once "LoggedIn.php";

// Comprovem si l'usuari es administrador
// en cas contrari, el redirigim a la pagina de llista
// i acabem l'execucio del script
/*if ($_SESSION['rol'] != 'admin') {
    header('Location: ../Controlador/llista.php');
    die();
}*/