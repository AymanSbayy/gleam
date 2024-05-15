<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/admin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../public/js/Admin/script.js" defer></script>
</head>

<body>
    <div class="wrapper">
        <?php include_once("../Vista/Components/admin_nav.php"); ?>
        <main class="content px-3 py-4">
            <div class="container-fluid">
                <div class="mb-3">
                    <h1 class="h3">Panel de Control</h1>

                    <div class="row mt-4">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Resumen General</h5>
                                    <p class="card-text mt-4">Total de ventas: 0</p>
                                    <p class="card-text">Número de Pedidos Pendientes: XX</p>
                                    <p class="card-text">Productos Activos: XX</p>
                                    <p class="card-text">Clientes Registrados: XX</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title ">Últimas ventas</h5>
                                    <table class="table mt-4">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>01/01/2021</td>
                                                <td>100€</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>01/01/2021</td>
                                                <td>100€</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>01/01/2021</td>
                                                <td>100€</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Actividad Reciente del Sistema</h5>
                                    <ul class="list-group mt-4">
                                        <li class="list-group-item">Nuevo producto agregado: "Producto F".</li>
                                        <li class="list-group-item">Pedido #1234 completado.</li>
                                        <li class="list-group-item">Nuevo cliente registrado: Cliente 6.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col md-6 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Estadísticas de Ventas</h5>
                                <canvas id="salesChart"></canvas>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>

    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>