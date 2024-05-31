<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pedidos</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Apercu&display=swap">

    <!-- Estilos -->
    <link rel="stylesheet" href="../public/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="../public/js/menu.js"></script>
    <script src="../public/js/auth.js"></script>
</head>

<body>

    <?php include("Components/navbar.php"); ?>
    <?php require_once("../Middleware/LoggedIn.php"); ?>
    <?php if (isset($mensaje) && $mensaje) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>¡Pedido realizado correctamente!</strong> Se ha enviado un correo electrónico con la información y la factura en formato PDF.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php }  ?>

    <div class="profile-menu">
        <p style="font-size: 1. 25rem;" class="mt-5"><strong>Hola</strong></p>
        <p style="font-size: .75rem; margin-top: -15px;"><?php echo $perfil_usuario['nombre'] ?></p>

        <ul>
            <div class="dropdown-divider mt-5"></div>
            <?php $current_page = basename($_SERVER['PHP_SELF']); ?>
            <li class="mt-5"><a href="perfil.php" <?php if ($current_page == "perfil.php") {
                                                        echo ' style="font-weight: bold;"';
                                                    } ?>>Datos personales y dirección</a></li>
            <li class="mt-2"><a href="pedidos.php" <?php if ($current_page == "pedidos.php") {
                                                        echo ' style="font-weight: bold;"';
                                                    } ?>>Mis pedidos</a></li>
            <div class="dropdown-divider"></div>
            <li class="mt-5"><a href="../Controlador/logout.php">Cerrar sesión</a></li>
        </ul>
    </div>

    <h1 style="font-size: 1.25rem;" class="content mt-5">Mis pedidos</h1>

    <div class="content mt-4">
        <?php
        $current_date = null;
        if (empty($productos_pedidos)) {
            echo '<p>No hay productos.</p>';
        } else {
            foreach ($productos_pedidos as $producto) {
                $producto_info = getProductoById($producto['idProducto']);
                $fecha_pedido = date('Y-m-d', strtotime($producto['fecha']));

                if ($current_date != $fecha_pedido) {
                    if ($current_date != null) {
                        echo '</tbody></table>';
                    }
                    $current_date = $fecha_pedido;
                    echo '<table class="table table-striped table-hover mt-5">
                            <thead class="thead-dark" style="background-color: #21164e;">
                                <tr>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Fecha estimada de entrega</th>
                                </tr>
                            </thead>
                            <tbody>';
                }
                
                echo '<tr>
                        <td><img src="' . $producto_info['imagen'] . '" alt="' . $producto_info['nombre'] . '" class="img-thumbnail" style="width: 100px;"></td>
                        <td>' . $producto_info['nombre'] . '</td>';
                        
                if ($producto_info['descuento'] > 0) {
                    echo '<td style="color:red;">' . number_format($producto['total'] - ($producto['total'] * $producto_info['descuento'] / 100), 2) . '€</td>';
                } else {
                    echo '<td>' . number_format($producto['total'], 2) . '€</td>';
                }
                        
                echo '<td>' . $producto['cantidad'] . '</td>
                        <td>';

                if ($producto['llegaEl'] > date('Y-m-d')) {
                    $fecha_entrega = new DateTime($producto['llegaEl']);
                    $fecha_actual = new DateTime(date('Y-m-d'));
                    $diferencia = $fecha_entrega->diff($fecha_actual);
                    echo '<span class="badge badge-warning">Su pedido llegará en ' . $diferencia->days . ' días</span>';
                } else {
                    echo '<span class="badge badge-success">Su pedido ha llegado</span>';
                }

                echo '</?></tr>';
            }

            if ($current_date != null) {
                echo '</tbody></table>';
            }
        }
        ?>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php include("Components/footer.php"); ?>

</body>

</html>