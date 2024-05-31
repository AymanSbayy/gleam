<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/admin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="wrapper">
        <?php include_once("../Vista/Components/admin_nav.php"); ?>
        <main class="content px-3 py-4">
            <div class="container-fluid">
                <div class="mb-3">
                    <h1>Estadísticas</h1>
                </div>

                <div class="col-12 mt-4">
                    <div class="tab">
                        <button class="tablinks" onclick="openTab(event, 'diario')">Diario</button>
                        <button class="tablinks" onclick="openTab(event, 'semanal')">Semanal</button>
                        <button class="tablinks" onclick="openTab(event, 'mensual')">Mensual</button>
                    </div>

                    <div class="row tabcontent" id="diario" style="display:none;">
                        <div class="col-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="card mt-3" style="padding:35px;">
                                            <h4 class="card-title text-center">Resumen diario</h4>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <div class="d-flex align-items-center">
                                                        <i class="lni lni-cart-full text-danger display-6"></i>
                                                        <div class="ms-3">
                                                            <h5 class="mb-0">Compras totales</h5>
                                                            <span class="text-danger"><?php echo number_format($comprasDiarias, 2); ?>€</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="d-flex align-items-center">
                                                        <i class="lni lni-coin text-success display-6"></i>
                                                        <div class="ms-3">
                                                            <h5 class="mb-0">Ventas totales</h5>
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
                                                            <h5 class="mb-0">Ganancias totales</h5>
                                                            <span class="text-primary"><?php echo number_format($gananciasDiarias, 2); ?>€</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <canvas id="gananciasTotales_hoy" style="max-height: 300px;"></canvas>
                                                <p class="mt-3">Ganancias esperadas: <span id="gananciasDiarias_esperadas_hoy" class="badge bg-dark text-white">2000€</span></p>
                                                <p class="mt-3">Ganancias totales: <span id="gananciasDiarias_totales_hoy" class="badge <?php echo ($gananciasDiarias >= 2000) ? 'bg-success' : 'bg-danger'; ?> text-white"><?php echo number_format($gananciasDiarias, 2); ?>€</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="card mt-3" style="height: 430px;">
                                            <div class="card-body">
                                                <h4 class="card-title">Compras</h4>
                                                <div class="row">
                                                    <canvas id="comprasDiarias" style="max-height: 300px;"></canvas>
                                                    <p class="mt-3">Se han realizado un total de <span id="comprasDiarias_totales" class="badge bg-dark text-white"><?php echo $countCompras; ?></span> compras hoy.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="card mt-3" style="height: 430px;">
                                            <div class="card-body">
                                                <h4 class="card-title">Ventas</h4>
                                                <div class="row">
                                                    <canvas id="ventasDiarias" style="max-height: 300px;"></canvas>
                                                    <p class="mt-3">Se han realizado un total de <span id="ventasDiarias_totales" class="badge bg-dark text-white"><?php echo count($productosVendidosDiarios); ?></span> ventas hoy.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row tabcontent" id="semanal" style="display:none;">
                        <div class="col-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="card mt-3" style="padding:35px;">
                                            <h4 class="card-title text-center">Resumen Semanal</h4>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <div class="d-flex align-items-center">
                                                        <i class="lni lni-cart-full text-danger display-6"></i>
                                                        <div class="ms-3">
                                                            <h5 class="mb-0">Compras totales</h5>
                                                            <span class="text-danger"><?php echo number_format($comprasSemanales, 2); ?>€</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="d-flex align-items-center">
                                                        <i class="lni lni-coin text-success display-6"></i>
                                                        <div class="ms-3">
                                                            <h5 class="mb-0">Ventas totales</h5>
                                                            <span class="text-success"><?php echo number_format($ventasSemanales, 2); ?>€</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <div class="d-flex align-items-center">
                                                        <i class="lni lni-money-protection text-primary display-6"></i>
                                                        <div class="ms-3">
                                                            <h5 class="mb-0">Ganancias totales</h5>
                                                            <span class="text-primary"><?php echo number_format($gananciasSemanales, 2); ?>€</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <canvas id="gananciasTotales_semanales" style="max-height: 300px;"></canvas>
                                                <p class="mt-3">Ganancias esperadas: <span id="gananciasSemanal_esperadas" class="badge bg-dark text-white">5000€</span></p>
                                                <p class="mt-3">Ganancias totales: <span id="gananciasSemanal_totales" class="badge <?php echo ($gananciasSemanales >= 5000) ? 'bg-success' : 'bg-danger'; ?> text-white"><?php echo number_format($gananciasSemanales, 2); ?>€</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="card mt-3" style="height: 430px;">
                                            <div class="card-body">
                                                <h4 class="card-title">Compras</h4>
                                                <div class="row">
                                                    <canvas id="comprasSemanal" style="max-height: 300px;"></canvas>
                                                    <p class="mt-3">Se han realizado un total de <span id="comprasSemanal_totales" class="badge bg-dark text-white"><?php echo count($compras); ?></span> compras esta semana.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="card mt-3" style="height: 430px;">
                                            <div class="card-body">
                                                <h4 class="card-title">Ventas</h4>
                                                <div class="row">
                                                    <canvas id="ventasSemanal" style="max-height: 300px;"></canvas>
                                                    <p class="mt-3">Se han realizado un total de <span id="ventasSemanal_totales" class="badge bg-dark text-white"><?php echo count($productosVendidosSemanal); ?></span> ventas esta semana.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row tabcontent" id="mensual" style="display:none;">
                        <div class="col-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="card mt-3" style="padding:35px;">
                                            <h4 class="card-title text-center">Resumen Mensual</h4>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <div class="d-flex align-items-center">
                                                        <i class="lni lni-cart-full text-danger display-6"></i>
                                                        <div class="ms-3">
                                                            <h5 class="mb-0">Compras totales</h5>
                                                            <span class="text-danger"><?php echo number_format($comprasSemanales, 2); ?>€</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="d-flex align-items-center">
                                                        <i class="lni lni-coin text-success display-6"></i>
                                                        <div class="ms-3">
                                                            <h5 class="mb-0">Ventas totales</h5>
                                                            <span class="text-success"><?php echo number_format($ventasSemanales, 2); ?>€</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <div class="d-flex align-items-center">
                                                        <i class="lni lni-money-protection text-primary display-6"></i>
                                                        <div class="ms-3">
                                                            <h5 class="mb-0">Ganancias totales</h5>
                                                            <span class="text-primary"><?php echo number_format($gananciasSemanales, 2); ?>€</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <canvas id="gananciasTotales" style="max-height: 300px;"></canvas>
                                                <p class="mt-3">Ganancias esperadas: <span id="gananciasMensuales_esperadas" class="badge bg-dark text-white">10000€</span></p>
                                                <p class="mt-3">Ganancias totales: <span id="gananciasMensuales_totales" class="badge <?php echo ($gananciasMensuales >= 10000) ? 'bg-success' : 'bg-danger'; ?> text-white"><?php echo number_format($gananciasMensuales, 2); ?>€</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="card mt-3" style="height: 430px;">
                                            <div class="card-body">
                                                <h4 class="card-title">Compras</h4>
                                                <div class="row">
                                                    <canvas id="comprasMensuales" style="max-height: 300px;"></canvas>
                                                    <p class="mt-3">Se han realizado un total de <span id="comprasMensuales_totales" class="badge bg-dark text-white"><?php echo count($compras); ?></span> compras este mes.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="card mt-3" style="height: 430px;">
                                            <div class="card-body">
                                                <h4 class="card-title">Ventas
                                                    <div class="row">
                                                        <canvas id="ventasMensuales" style="max-height: 300px;"></canvas>
                                                        <p class="mt-3">Se han realizado un total de <span id="ventasMensuales_totales" class="badge bg-dark text-white"><?php echo count($productosVendidosMensual); ?></span> ventas este mes.</p>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        var ctx = document.getElementById('comprasMensuales').getContext('2d');
        var comprasMensuales = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                    for ($i = 0; $i < 12; $i++) {
                        echo '"' . $meses[$i] . '",';
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Compras mensuales',
                    data: [
                        <?php
                        for ($i = 0; $i < 12; $i++) {
                            $comprasMes = 0;
                            foreach ($compras as $compra) {
                                $fecha = new DateTime($compra['fecha']);
                                if ($fecha->format('m') == $i + 1) {
                                    $comprasMes += $compra['total'];
                                }
                            }
                            echo $comprasMes . ',';
                        }
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
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

        //Grafico circular de las ganancias totales del mes actual y las ganancias esperadas como referencia
        var ctx = document.getElementById('gananciasTotales').getContext('2d');
        var gananciasTotales = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Ganancias totales', 'Ganancias esperadas'],
                datasets: [{
                    label: 'Ganancias totales',
                    data: [
                        <?php echo $gananciasMensuales; ?>,
                        10000
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

        var ctx = document.getElementById('ventasMensuales').getContext('2d');
        var ventasMensuales = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                    for ($i = 0; $i < 12; $i++) {
                        echo '"' . $meses[$i] . '",';
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Ventas mensuales',
                    data: [
                        <?php
                        for ($i = 0; $i < 12; $i++) {
                            $ventasMes = 0;
                            foreach ($productosVendidos as $producto) {
                                $fecha = new DateTime($producto['fecha']);
                                if ($fecha->format('m') == $i + 1) {
                                    $ventasMes += $producto['total'];
                                }
                            }
                            echo $ventasMes . ',';
                        }
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
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

        var ctx = document.getElementById('comprasSemanal').getContext('2d');
        var comprasSemanal = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                    $dias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
                    for ($i = 0; $i < 7; $i++) {
                        echo '"' . $dias[$i] . '",';
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Compras semanales',
                    data: [
                        <?php
                        for ($i = 0; $i < 7; $i++) {
                            $comprasDia = 0;
                            foreach ($compras as $compra) {
                                $fecha = new DateTime($compra['fecha']);
                                if ($fecha->format('w') == $i) {
                                    $comprasDia += $compra['total'];
                                }
                            }
                            echo $comprasDia . ',';
                        }
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)'
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

        var ctx = document.getElementById('ventasSemanal').getContext('2d');
        var ventasSemanal = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                    $dias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
                    for ($i = 0; $i < 7; $i++) {
                        echo '"' . $dias[$i] . '",';
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Ventas semanales',
                    data: [
                        <?php
                        for ($i = 0; $i < 7; $i++) {
                            $ventasDia = 0;
                            foreach ($productosVendidos as $producto) {
                                $fecha = new DateTime($producto['fecha']);
                                if ($fecha->format('w') == $i) {
                                    $ventasDia += $producto['total'];
                                }
                            }
                            echo $ventasDia . ',';
                        }
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)'
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

        var ctx = document.getElementById('gananciasTotales_semanales').getContext('2d');
        var gananciasTotales_semanales = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Ganancias totales', 'Ganancias esperadas'],
                datasets: [{
                    label: 'Ganancias totales',
                    data: [
                        <?php echo $gananciasSemanales; ?>,
                        5000
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

        var ctx = document.getElementById('comprasDiarias').getContext('2d');
        var comprasDiarias = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                    for ($i = 0; $i < 24; $i++) {
                        echo '"' . $i . 'h",';
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Compras diarias',
                    data: [
                        <?php
                        for ($i = 0; $i < 24; $i++) {
                            echo $comprasHora[$i] . ',';
                        }
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
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

        var ctx = document.getElementById('ventasDiarias').getContext('2d');
        var ventasDiarias = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                    for ($i = 0; $i < 24; $i++) {
                        echo '"' . $i . 'h",';
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Ventas diarias',
                    data: [
                        <?php
                        for ($i = 0; $i < 24; $i++) {
                            echo $ventasHora[$i] . ',';
                        }
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
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


        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        window.onload = function() {
            openTab(event, 'diario');
        };
    </script>
</body>



</html>