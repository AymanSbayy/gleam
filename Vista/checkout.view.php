<!-- This is going to be the checkout page -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tramitar tu pedido en GLEAM</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">


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
    <script src="../public/js/perfil.js"></script>
    <script src="../public/js/checkout.js"></script>

</head>

<body class="checkout">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand mx-auto" href="welcome.php">
                <img src="../public/images/logo_privisional.png" alt="" class="d-inline-block align-text-top" height="40">
            </a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-7 fondo_blanco">
                <p style="font-size: 1.25rem;"><strong>Selecciona tu dirección de envío</strong></p>
                <div class="perfil-container" id="envio-container">
                    <?php if (!empty($direcciones)) { ?>
                        <?php foreach ($direcciones as $envio) { ?>
                            <div class="perfil-card2 custom-select maxwidth" onclick="selectDireccionEnvio('<?php echo $envio['idDireccionEnvio']; ?>', this)" id="custom-select-envio" name="custom-select-envio">
                                <p style="font-size: 12px;">Dirección: <?php echo $envio['direccion'] ?></p>
                                <div class="overlay">
                                    <i class="fas fa-check"></i>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <p style="font-size: 12px;">No tienes direcciones de envío guardadas</p>
                    <?php } ?>
                </div>
                <p class="change_psswd" id="nueva_direccion">Usar una nueva dirección de envío</p>
                <div id="add-shipping-info-form" style="display: none;">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="shipping-name" name="shipping-name" placeholder="Nombre de la direccion">
                        <input type="hidden" id="selectedAddress" value="">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="shipping-address" name="shipping-address" placeholder="Direccion: Calle, número, piso, puerta">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="shipping-postal-code" name="shipping-postal-code" placeholder="Código Postal">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="shipping-country" name="shipping-country" placeholder="País">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="shipping-city" name="shipping-city" placeholder="Ciudad">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="shipping-province" name="shipping-province" placeholder="Provincia">
                    </div>
                    <button style="width: 100%;" type="button" class="btn btn-dark" id="añadir-direccion-envio">Guardar</button>
                </div>
                <p style="font-size: 1.25rem;" class="mt-3"><strong>Selecciona tu dirección de facturación</strong></p>
                <div class="perfil-container" id="facturacion-container">
                    <?php if (!empty($facturaciones)) { ?>
                        <?php foreach ($facturaciones as $facturacion) { ?>
                            <div class="perfil-card2 custom-select maxwidth" id="custom-select-facturacion" name="custom-select-facturacion" onclick="selectDireccionFacturacion('<?php echo $facturacion['idDireccionFacturacion']; ?>', this)">
                                <p style="font-size: 12px;">Dirección: <?php echo $facturacion['direccion'] ?></p>
                                <div class="overlay">
                                    <i class="fas fa-check"></i>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <p style="font-size: 12px;">No tienes datos de facturación guardados</p>
                    <?php } ?>

                    
                </div>
                <p class="change_psswd" id="nueva_facturacion">Usar una nueva dirección de facturación</p>
                <div id="add-billing-info-form" style="display: none;">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="billing-name" name="billing-name" placeholder="Nombre de la dirección">
                        <input type="hidden" id="selectedBillingAddress" value="">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="billing-address" name="billing-address" placeholder="Direccion: Calle, número, piso, puerta">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="billing-postal-code" name="billing-postal-code" placeholder="Código Postal">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="billing-country" name="billing-country" placeholder="País">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="billing-city" name="billing-city" placeholder="Ciudad">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="billing-province" name="billing-province" placeholder="Provincia">
                    </div>
                    <button style="width: 100%;" type="button" class="btn btn-dark" id="añadir-direccion-facturacion">Guardar</button>
                </div>

                <div class="mt-3">
                    <p style="font-size: 1.25rem;"><strong>Selecciona tu método de pago</strong></p>
                    <input type="hidden" id="selectedPaymentMethod" value="">
                    <div class="payment-container">
                        <div class="payment-card custom-select2" id="paga_visa" onclick="selectPaymentMethod('visa', this)">
                            <img src="../public/images/visa-logo.jpg" alt="Visa" class="payment-logo">
                            <div class="overlay2">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                        <div class="payment-card custom-select2" id="paga_masterc" onclick="selectPaymentMethod('mastercard', this)">
                            <img src="../public/images/mastercard.png" alt="Mastercard" class="payment-logo">
                            <div class="overlay2">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                        <div class="payment-card custom-select2" id="paga_paypal" onclick="selectPaymentMethod('paypal', this)">
                            <img src="../public/images/paypal.png" alt="Paypal" class="payment-logo">
                            <div class="overlay2">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="visa-form" class="mt-5" style="display: none;">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="visa-name" name="visa-name" placeholder="Nombre del titular de la tarjeta">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="visa-number" name="visa-number" placeholder="XXXX XXXX XXXX XXXX" maxlength="19" oninput="formatVisaNumber(this)">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3" style="max-width: 200px;">
                            <input type="text" class="form-control" id="visa-expiry" name="visa-expiry" placeholder="MM/YY" maxlength="5" oninput="formatVisaExpiry(this)">
                        </div>
                        <div class="col-md-6 mb-3" style="max-width: 200px;">
                            <input type="text" class="form-control" id="visa-cvc" name="visa-cvc" placeholder="CVC" maxlength="3">
                        </div>
                    </div>
                </div>
                <div id="mastercard-form" class="mt-5" style="display: none;">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="mastercard-name" name="mastercard-name" placeholder="Nombre del titular de la tarjeta">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="mastercard-number" name="mastercard-number" placeholder="XXXX XXXX XXXX XXXX" maxlength="19" oninput="formatMastercardNumber(this)">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3" style="max-width: 200px;">
                            <input type="text" class="form-control" id="mastercard-expiry" name="mastercard-expiry" placeholder="MM/YY" maxlength="5" oninput="formatMastercardExpiry(this)">
                        </div>
                        <div class="col-md-6 mb-3" style="max-width: 200px;">
                            <input type="text" class="form-control" id="mastercard-cvc" name="mastercard-cvc" placeholder="CVC" maxlength="3">
                        </div>
                    </div>
                </div>
                <div id="paypal-form" class="mt-5" style="display: none;">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="paypal-email" name="paypal-email" placeholder="Correo electrónico de Paypal">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="fondo_blanco">
                    <div class="">
                        <h5 class="">Resumen del pedido</h5>
                        <?php foreach ($productos as $product) { ?>
                            <div class="row mt-3">
                                <div class="col-3">
                                    <img src="<?php echo $product['imagen'] ?>" alt="<?php echo $product['nombre'] ?>" class="img-fluid">
                                </div>
                                <div class="col-6">
                                    <p class=""><?php echo $product['nombre'] ?></p>
                                    <?php if ($product['descuento'] > 0) { ?>
                                        <p class=""><del><?php echo number_format($product['precio'], 2) ?> € </del><span style="font-size: 16px; margin-left: 10px; font-weight: bold;"><?php echo number_format($product['precio'] - ($product['precio'] * $product['descuento'] / 100), 2) ?> €</span></p>
                                    <?php } else { ?>
                                        <p class=""><?php echo $product['precio'] ?> €</p>
                                    <?php } ?>
                                </div>
                                <div class="col-3">
                                    <p class=""><?php echo $product['cantidad'] ?> unidades</p>
                                </div>
                            </div>
                        <?php } ?>
                        <hr class="hrr mt-3">
                        <div class="row mt-3">
                            <div class="col-6">
                                <p class="">Subtotal: <span style="font-weight: bold;"><?php echo number_format($subtotal, 2) ?> €</span></p>
                                <p class="">Descuento: <span style="font-weight: bold;"><?php echo number_format($totalDescuento, 2) ?> €</span></p>
                                <p class="">IVA: <span style="font-weight: bold;"><?php echo number_format($iva, 2) ?> €</span></p>
                                <p class="">Envío: <span style="font-weight: bold;">GRATIS</span></p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">Total: <span style="font-weight: bold;"><?php echo number_format($subtotal + $iva - $totalDescuento, 2) ?> €</span></p>
                            </div>
                        </div>
                        <button type="button" class="btn btn-dark mt-3" id="realizar_pedido" style="width: 100%;">Realizar pedido</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("Components/footer.php"); ?>

</body>

</html>