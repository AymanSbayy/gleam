<?php

require_once("../Middleware/LoggedIn.php");
require_once("../Middleware/isAdmin.php");
require_once("../Model/consultas_usuarios.php");

$usuarios = getUsers();

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 2;
$totalPaginas = ceil(count($usuarios) / 10);
$usuariosPaginados = array_slice($usuarios, ($pagina - 1) * 10, 10);

include_once("../Vista/Admin/usuarios.php");