<?php 

require_once("../Middleware/LoggedIn.php");
require_once("../Middleware/isAdmin.php");
require_once("../Model/consultas_productos.php");
require_once("../Model/consultas_categorias.php");

$productos = getAllProducts();
$productosPorPagina = 10;
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$totalPaginas = ceil(count($productos) / $productosPorPagina);
$productosPaginados = array_slice($productos, ($pagina - 1) * $productosPorPagina, $productosPorPagina);

$stock = getStock();

$categorias = getCaregories();



include_once("../Vista/Admin/añade_productos.php");