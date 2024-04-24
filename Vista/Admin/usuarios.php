<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/admin.css">
    <script src="../public/js/Admin/script.js" defer></script>

</head>

<body>
    <div class="wrapper">
        <?php include_once("../Vista/Components/admin_nav.php"); ?>
        <main class="content px-3 py-4">
            <div class="container-fluid">
                <div class="mb-3">
                    <h1 class="h1">Usuarios</h1>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Listado de Usuarios</h5>
                                <input type="text" id="searchInput" class="form-control" placeholder="Buscar...">
                                <div class="table-responsive">
                                    <table id="userTable" class="table mt-4">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Rol</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($usuarios as $usuario) : ?>
                                                <tr>
                                                    <td><?php echo $usuario['idUsuario'] ?></td>
                                                    <td><?php echo $usuario['nombre'] ?></td>
                                                    <td><?php echo $usuario['email'] ?></td>
                                                    <td><?php echo $usuario['administrador'] == 1 ? 'Administrador' : 'Usuario' ?></td>
                                                    <td>
                                                        <a href="../Controlador/eliminar_usuario.php?id=<?php echo $usuario['idUsuario'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                                        <a href="../Controlador/bloquear_usuario.php?id=<?php echo $usuario['idUsuario'] ?>" class="btn btn-secondary"><i class="lni lni-lock"></i></a>
                                                        <a href="../Controlador/hacer_admin.php?id=<?php echo $usuario['idUsuario'] ?>" class="btn btn-success"><i class="lni lni-user"></i></a>
                                                        <a href="../Controlador/quitar_admin.php?id=<?php echo $usuario['idUsuario'] ?>" class="btn btn-info"><i class="lni lni-user"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="pagination" class="d-flex justify-content-center mt-3">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination
                                        <?php echo $pagina <= 1 ? 'disabled' : '' ?>">
                                            <a class="page-link" href="?pagina=<?php echo $pagina - 1; ?>">Anterior</a>
                                            </li>
                                            <?php for ($i = 0; $i < $totalPaginas; $i++) : ?>
                                                <li class="page-item
                                            <?php echo $pagina == $i + 1 ? 'active' : '' ?>">
                                                    <a class="page-link" href="?pagina=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a>
                                                </li>
                                            <?php endfor; ?>
                                            <li class="page-item <?php echo $pagina >= $totalPaginas ? 'disabled' : '' ?>">
                                                <a class="page-link" href="?pagina=<?php echo $pagina + 1; ?>">Siguiente</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="tab">
                                    <button class="tablinks" onclick="openTab(event, 'hoy')">Usuarios registrados hoy</button>
                                    <button class="tablinks" onclick="openTab(event, 'semana')">Usuarios registrados esta semana</button>
                                    <button class="tablinks" onclick="openTab(event, 'mes')">Usuarios registrados este mes</button>
                                </div>

                                <div id="hoy" class="tabcontent">
                                    <h3>Usuarios registrados hoy</h3>
                                    <p>Aquí va la información de los usuarios registrados hoy.</p>
                                    <canvas id="chartHoy"></canvas>
                                </div>

                                <div id="semana" class="tabcontent">
                                    <h3>Usuarios registrados esta semana</h3>
                                    <p>Aquí va la información de los usuarios registrados esta semana.</p>
                                    <canvas id="chartSemana"></canvas>
                                </div>

                                <div id="mes" class="tabcontent">
                                    <h3>Usuarios registrados este mes</h3>
                                    <p>Aquí va la información de los usuarios registrados este mes.</p>
                                    <canvas id="chartMes"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
        </main>
    </div>
</body>

</html>