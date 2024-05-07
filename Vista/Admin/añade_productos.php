<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añade Productos</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <script src="../public/js/Admin/script.js" defer></script>
    <script src="../public/js/Admin/crud_productes.js" defer></script>

    <link rel="stylesheet" href="../public/css/admin.css">
</head>

<body>

    <div class="wrapper">
        <?php include_once("../Vista/Components/admin_nav.php"); ?>
        <?php include_once("../Vista/Components/agregar_producto_modal.php"); ?>
        <?php include_once("../Vista/Components/comprar_producto_existente.php"); ?>
        <?php include_once("../Vista/Components/importar_compra.php"); ?>
        <?php include_once("../Vista/Components/editar_producto.php"); ?>

        <main class="content px-3 py-4">
            <div class="container-fluid">
                <div class="mb-3">
                    <h1 class="h1">Todos los Productos</h1>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">Listado de Productos</h5>
                                    <div>
                                        <button class="btn btn-dark" onclick="$('#importModal').modal('show')"><i class="lni lni-cloud-download"></i> Importar compra</button>
                                        <button class="btn btn-dark" onclick="$('#agregarModal').modal('show')"><i class="lni lni-plus"></i> Comprar un nuevo producto</button>
                                        <button class="btn btn-dark" onclick="$('#comprarExist').modal('show')"><i class="lni lni-plus"></i> Comprar un producto existente</button>
                                    </div>
                                </div>
                                <input type="text" id="searchInput" class="form-control mt-4" placeholder="Buscar...">
                                <div class="table-responsive">
                                    <table id="userTable" class="table mt-4">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 20%;">Codigo de Barras</th>
                                                <th scope="col" style="width: 45%;">Nombre</th>
                                                <th scope="col" style="width: 10%;">Precio</th>
                                                <th scope="col" style="width: 10%;">Stock</th>
                                                <th scope="col" style="width: 15%;">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($productos as $producto) : ?>
                                                <tr>
                                                    <td><?php echo $producto['codigo_barras']; ?></td>
                                                    <td><?php echo $producto['nombre'] ?></td>
                                                    <td><?php echo $producto['precio'] ?> €</td>
                                                    <td>
                                                        <?php
                                                        $cantidad_disponible = 0;
                                                        foreach ($stock as $s) {
                                                            if ($s['idProducto'] === $producto['idProducto']) {
                                                                $cantidad_disponible = $s['cantidadDisponible'];
                                                                break;
                                                            }
                                                        }
                                                        echo $cantidad_disponible;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <button onclick="eliminarProducto(<?php echo $producto['idProducto'] ?>)" class="btn btn-danger"><i class="lni lni-trash-can"></i></button>
                                                        <button onclick="editarProducto(<?php echo $producto['codigo_barras'] ?>)" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editarModal"><i class="lni lni-pencil"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item <?php echo $pagina <= 1 ? 'disabled' : '' ?>">
                                                <a class="page-link" href="añadir_producto.php?pagina=<?php echo $pagina - 1 ?>">Anterior</a>
                                            </li>
                                            <?php for ($i = 0; $i < $totalPaginas; $i++) : ?>
                                                <li class="page-item <?php echo $pagina == $i + 1 ? 'active' : '' ?>"><a class="page-link" href="añadir_producto.php?pagina=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>
                                            <?php endfor; ?>
                                            <li class="page-item <?php echo $pagina >= $totalPaginas ? 'disabled' : '' ?>">
                                                <a class="page-link" href="añadir_producto.php?pagina=<?php echo $pagina + 1 ?>">Siguiente</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>