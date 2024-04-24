<?php

require_once("../Middleware/LoggedIn.php");


if (isLoggedIn()) {
    echo "<script>confirm('¿Estás seguro de que quieres cerrar sesión?')</script>";
    session_destroy();
}

header("Location: ../index.php");