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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                            <div class="card mt-3" style="padding:35px;">
                                <h4 class="card-title text-center">Resumen general diario</h4>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center">
                                            <i class="lni lni-cart-full text-danger display-6"></i>
                                            <div class="ms-3">
                                                <h5 class="mb-0">Compras totales de hoy</h5>
                                                <span class="text-danger"><?php echo number_format($comprasDiarias, 2); ?>€</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center">
                                            <i class="lni lni-coin text-success display-6"></i>
                                            <div class="ms-3">
                                                <h5 class="mb-0">Ventas totales de hoy</h5>
                                                <span class="text-success"><?php echo number_format($ventasDiarias, 2); ?>€</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center">
                                            <i class="lni lni-money-protection text-primary display-6"></i>
                                            <div class="ms-3">
                                                <h5 class="mb-0">Ganancias totales de hoy</h5>
                                                <span class="text-primary"><?php echo number_format($gananciasDiarias, 2); ?>€</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center">
                                            <i class="lni lni-cart-full text-violet display-6"></i>
                                            <div class="ms-3">
                                                <h5 class="mb-0">Total de compras</h5>
                                                <span class="text-violet"><?php echo $countCompras; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card mt-3" style="padding:35px;">
                                <div class="card-body">
                                    <h5 class="card-title ">Registro de las últimas 5 ventas</h5>
                                    <table class="table table-striped mt-4">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Hora</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ultimasVentas = array_slice($productosVendidosDiarios, -5);
                                            foreach ($ultimasVentas as $producto) : ?>
                                                <tr>
                                                    <td><?php echo $producto['idVenta']; ?></td>
                                                    <td><?php echo $producto['fecha']; ?></td>
                                                    <td><?php echo $producto['hora']; ?></td>
                                                    <td><?php echo number_format($producto['total'], 2); ?>€</td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="card-body">
                                        <canvas id="gananciasTotales_hoy" style="max-height: 300px;"></canvas>
                                        <p class="mt-3">Ganancias esperadas: <span id="gananciasDiarias_esperadas" class="badge bg-dark text-white">2000€</span></p>
                                        <p class="mt-3">Ganancias totales: <span id="gananciasDiarias_totales" class="badge <?php echo ($gananciasDiarias > 2000) ? 'bg-success' : 'bg-danger'; ?> text-white"><?php echo number_format($gananciasDiarias, 2); ?>€</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col md-6 mt-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Estadísticas de las ventas de esta semana</h5>
                                    <canvas id="salesChart" style="max-height: 300px;"></canvas>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </main>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        var ctx = document.getElementById('gananciasTotales_hoy').getContext('2d');
        var gananciasTotales_hoy = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Ganancias totales', 'Ganancias esperadas'],
                datasets: [{
                    label: 'Ganancias totales',
                    data: [
                        <?php echo $gananciasDiarias; ?>,
                        2000
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctxSales = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctxSales, {
            type: 'line',
            data: {
                labels: <?php echo $diasJson; ?>,
                datasets: [{
                    label: 'Ventas',
                    data: <?php echo $ventasSemanaJson; ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>