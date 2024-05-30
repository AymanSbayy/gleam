<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Perfil</title>

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
    <script src="../public/js/menu.js"></script>
    <script src="../public/js/auth.js"></script>
    <script src="../public/js/perfil.js"></script>
</head>

<body>

    <?php include("Components/navbar.php"); ?>

    <?php if (isset($mensaje) && $mensaje) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>¡Pedido realizado correctamente!</strong> Se ha enviado un correo electrónico con la información y la factura en formato PDF.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <div class="profile-menu">
        <p style="font-size: 1.25rem;" class="mt-5"><strong>Hola</strong></p>
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

    <h1 style="font-size: 1.25rem;" class="content mt-5">Accede a tus datos personales y dirección</h1>

    <div class="content mt-4">
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <h4>Contraseña</h4>
                </div>
                <div class="col d-flex justify-content-end">
                    <i id="change_psswd" class="change_psswd">Cambiar Contraseña</i>
                    <i style="margin-left: 3px;" class="fas fa-pencil-alt pencil-icon"></i>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>***********</p>
                </div>
                <p style="font-size: 12px;">Si deseas cambiar tu contraseña, haz click en "Cambiar Contraseña", para cerrar la pestana de cambio de contraseña, haz click en "Cambiar Contraseña" de nuevo.</p>
            </div>
        </div>
        <div id="change-password-form" style="display: none;">
            <div class="mb-3">
                <h4>Antigua contraseña</h4>
                <input type="password" class="form-control" id="current-password" name="current-password">
            </div>
            <div class="mb-3">
                <h4>Nueva contraseña</h4>
                <input type="password" class="form-control" id="new-password" name="new-password">
            </div>
            <div class="mb-3">
                <h4>Confirmar contraseña</h4>
                <input type="password" class="form-control" id="confirm-password" name="confirm-password">
            </div>
            <button style="width: 100%;" type="button" class="btn btn-dark" id="save-password">Guardar</button>
        </div>
        <hr>
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <h4>Datos personales</h4>
                </div>
                <div class="col d-flex justify-content-end">
                    <i id="change_personal_info" class="change_psswd">Cambiar Datos</i>
                    <i style="margin-left: 3px;" class="fas fa-pencil-alt pencil-icon"></i>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p style="font-size: 12px;"><?php echo $perfil_usuario['nombre'] ?></p>
                    <p style="font-size: 12px;"><?php echo $perfil_usuario['telefono'] ?></p>
                </div>
                <p style="font-size: 12px;">Trata de mantener tus datos actualizados, si deseas cambiar tu nombre o teléfono, haz click en "Cambiar Datos", para cerrar la pestana de cambio de datos, haz click en "Cambiar Datos" de nuevo.</p>
            </div>
        </div>
        <div id="change-personal-info-form" style="display: none;">
            <div class="mb-3"></div>
            <h4>Foto de perfil</h4>
            <div class="file-input-container">
                <?php if (strpos($perfil_usuario['foto'], 'http') === false && !empty($perfil_usuario['foto'])) {
                            $perfil_usuario['foto'] = 'data:image/jpeg;base64,' . $perfil_usuario['foto'];
                        }

                        if (empty($perfil_usuario['foto'])) {
                            $perfil_usuario['foto'] = '../public/svg/login.svg';
                        }
                ?>
                <img src="<?php echo $perfil_usuario['foto'] ?>" id="profile-image" alt="profile-picture" class="profile-image" onclick="$('input[type=file]').click();">
                <input type="file" class="form-control" id="profile-picture" name="profile-picture" accept="image/*" onchange="previewImage(event)">
                <div class="overlay">
                    <i class="fas fa-pencil-alt"></i>
                </div>
            </div>
            <div class="mb-3">
                <h4>Nombre</h4>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $perfil_usuario['nombre'] ?>">
            </div>
            <div class="mb-3">
                <h4>Teléfono</h4>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $perfil_usuario['telefono'] ?>">
            </div>
            <button style="width: 100%;" type="button" class="btn btn-dark" id="save-personal-info">Guardar</button>
        </div>
        <hr>
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <h4>Datos de facturación</h4>
                </div>
                <div class="col d-flex justify-content-end">
                    <i id="add_billing_info" class="change_psswd">Añadir nuevos datos de facturación</i>
                    <i style="margin-left: 3px;" class="fas fa-plus"></i>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="perfil-container">
                        <?php if (!empty($datos_facturacion)) { ?>
                            <?php foreach ($datos_facturacion as $facturacion) { ?>
                                <div class="perfil-card">
                                    <h4><?php echo $facturacion['nombre'] ?></h4>
                                    <div class="mb-3">
                                        <p style="font-size: 12px;">Dirección: <?php echo $facturacion['direccion'] ?></p>
                                        <p style="font-size: 12px;">Ciudad: <?php echo $facturacion['ciudad'] ?></p>
                                        <p style="font-size: 12px;">Provincia: <?php echo $facturacion['provincia'] ?></p>
                                        <p style="font-size: 12px;">Código postal: <?php echo $facturacion['codigoPostal'] ?></p>
                                        <p style="font-size: 12px;">País: <?php echo $facturacion['pais'] ?></p>
                                    </div>
                                    <div class="overlay" onclick="showEditForm('<?php echo $facturacion['idDireccionFacturacion']; ?>', '<?php echo $facturacion['nombre']; ?>', '<?php echo $facturacion['direccion']; ?>', '<?php echo $facturacion['ciudad']; ?>', '<?php echo $facturacion['provincia']; ?>', '<?php echo $facturacion['codigoPostal']; ?>', '<?php echo $facturacion['pais']; ?>')">
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <p style="font-size: 12px;">No tienes datos de facturación guardados</p>
                        <?php } ?>
                    </div>
                </div>
                <p style="font-size: 12px;">Si deseas añadir nuevos datos de facturación, haz click en "Añadir nuevos datos de facturación", para cerrar la pestana de añadir datos de facturación, haz click en "Añadir nuevos datos de facturación" de nuevo.</p>
            </div>
        </div>
        <div id="add-billing-info-form" style="display: none;">
            <div class="mb-3">
                <h4>Nombre</h4>
                <input type="text" class="form-control" id="billing-name" name="billing-name">
                <input type="hidden" id="facturacion-id" value="">
            </div>
            <div class="mb-3">
                <h4>Dirección</h4>
                <input type="text" class="form-control" id="billing-address" name="billing-address">
            </div>
            <div class="mb-3">
                <h4>Código postal</h4>
                <input type="text" class="form-control" id="billing-postal-code" name="billing-postal-code">
            </div>
            <div class="mb-3">
                <h4>País</h4>
                <input type="text" class="form-control" id="billing-country" name="billing-country">
            </div>
            <div class="mb-3">
                <h4>Ciudad</h4>
                <input type="text" class="form-control" id="billing-city" name="billing-city">
            </div>
            <div class="mb-3">
                <h4>Provincia</h4>
                <input type="text" class="form-control" id="billing-province" name="billing-province">
            </div>
            <button style="width: 100%;" type="button" class="btn btn-dark" id="save-billing-info">Guardar</button>
        </div>
        <hr>
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <h4>Direcciones de envío</h4>
                </div>
                <div class="col d-flex justify-content-end">
                    <i id="add_shipping_info" class="change_psswd">Añadir nueva dirección de envío</i>
                    <i style="margin-left: 3px;" class="fas fa-plus"></i>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="perfil-container">
                        <?php if (!empty($datos_envio)) { ?>
                            <?php foreach ($datos_envio as $envio) { ?>
                                <div class="perfil-card">
                                    <h4><?php echo $envio['nombre'] ?></h4>
                                    <div class="mb-3">
                                        <p style="font-size: 12px;">Dirección: <?php echo $envio['direccion'] ?></p>
                                        <p style="font-size: 12px;">Ciudad: <?php echo $envio['ciudad'] ?></p>
                                        <p style="font-size: 12px;">Provincia: <?php echo $envio['provincia'] ?></p>
                                        <p style="font-size: 12px;">Código postal: <?php echo $envio['codigoPostal'] ?></p>
                                        <p style="font-size: 12px;">País: <?php echo $envio['pais'] ?></p>
                                    </div>
                                    <div class="overlay" onclick="showEditFormShipping('<?php echo $envio['idDireccionEnvio']; ?>', '<?php echo $envio['nombre']; ?>', '<?php echo $envio['direccion']; ?>', '<?php echo $envio['ciudad']; ?>', '<?php echo $envio['provincia']; ?>', '<?php echo $envio['codigoPostal']; ?>', '<?php echo $envio['pais']; ?>')">
                                        <i class="fas fa-pencil-alt"></i>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <p style="font-size: 12px;">No tienes direcciones de envío guardadas</p>
                        <?php } ?>
                    </div>
                </div>
                <p style="font-size: 12px;">Si deseas añadir una nueva dirección de envío, haz click en "Añadir nueva dirección de envío", para cerrar la pestana de añadir dirección de envío, haz click en "Añadir nueva dirección de envío" de nuevo.</p>
            </div>
        </div>
        <div id="add-shipping-info-form" style="display: none;">
            <div class="mb-3">
                <h4>Nombre</h4>
                <input type="text" class="form-control" id="shipping-name" name="shipping-name">
                <input type="hidden" id="envio-id" value="">
            </div>
            <div class="mb-3">
                <h4>Dirección</h4>
                <input type="text" class="form-control" id="shipping-address" name="shipping-address">
            </div>
            <div class="mb-3">
                <h4>Código postal</h4>
                <input type="text" class="form-control" id="shipping-postal-code" name="shipping-postal-code">
            </div>
            <div class="mb-3">
                <h4>País</h4>
                <input type="text" class="form-control" id="shipping-country" name="shipping-country">
            </div>
            <div class="mb-3">
                <h4>Ciudad</h4>
                <input type="text" class="form-control" id="shipping-city" name="shipping-city">
            </div>
            <div class="mb-3">
                <h4>Provincia</h4>
                <input type="text" class="form-control" id="shipping-province" name="shipping-province">
            </div>
            <button style="width: 100%;" type="button" class="btn btn-dark" id="save-shipping-info">Guardar</button>
        </div>
    </div>


    <?php include("Components/footer.php"); ?>

</body>

</html>