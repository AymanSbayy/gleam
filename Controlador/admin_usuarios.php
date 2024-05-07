<?php

require_once("../Middleware/LoggedIn.php");
require_once("../Middleware/isAdmin.php");
require_once("../Model/consultas_usuarios.php");

$usuarios = getUsers();
$usuariosPorPagina = 10;
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$totalPaginas = ceil(count($usuarios) / $usuariosPorPagina);
$usuariosPaginados = array_slice($usuarios, ($pagina - 1) * $usuariosPorPagina, $usuariosPorPagina);

include_once("../Vista/Admin/usuarios.php");