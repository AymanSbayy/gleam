<?php

include_once("../Model/consultas_productos.php");
include_once("../Model/consultas_usuarios.php");
include_once("../Middleware/LoggedIn.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once("../vendor/autoload.php");
require_once('../vendor/tecnickcom/tcpdf/tcpdf.php');

if (isLoggedIn()) {
    if (isset($_POST['action']) && $_POST['action'] == "realizar_pedido") {
        $user = getUserByEmail($_SESSION['usuario']);
        if (isset($_POST['selectedAddress'])) {
            $direccion = $_POST['selectedAddress'];
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No se ha seleccionado una dirección de envío']);
            return;
        }

        if (isset($_POST['selectedBillingAddress'])) {
            $facturacion = $_POST['selectedBillingAddress'];
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No se ha seleccionado una dirección de facturación']);
            return;
        }

        if (isset($_POST['payingData'])) {
            $payingData = $_POST['payingData'];
            $payingMethod = $payingData['method'];
            if ($payingMethod == "visa") {
                if (!$payingData['name'] == "" && !$payingData['number'] == "" && !$payingData['expiry'] == "" && !$payingData['cvc'] == "") {
                    $currentYear = intval(date('y'));
                    $currentMonth = intval(date('m'));

                    if (isset($payingData['expiry'])) {
                        $expiry = $payingData['expiry'];
                        $expiryParts = explode('/', $expiry);
                        $expiryMonth = intval($expiryParts[0]);
                        $expiryYear = intval($expiryParts[1]);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Falta la fecha de caducidad de la tarjeta de crédito']);
                        return;
                    }

                    if ($expiryYear < $currentYear || ($expiryYear == $currentYear && $expiryMonth < $currentMonth)) {
                        echo json_encode(['status' => 'error', 'message' => 'La tarjeta de crédito ha expirado']);
                        return;
                    }

                    $payingData['number'] = str_replace(' ', '', $payingData['number']);
                    if (!preg_match('/^[0-9]{16}$/', $payingData['number'])) {
                        echo json_encode(['status' => 'error', 'message' => 'El número de tarjeta de crédito no es válido']);
                        return;
                    }

                    if (!preg_match('/^[0-9]{3}$/', $payingData['cvc'])) {
                        echo json_encode(['status' => 'error', 'message' => 'El código de seguridad de la tarjeta de crédito no es válido']);
                        return;
                    }
                    $name = $payingData['name'];
                    $number = $payingData['number'];
                    $expiry = $payingData['expiry'];
                    $cvc = $payingData['cvc'];
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Faltan datos de la tarjeta de crédito']);
                    return;
                }
            } else if ($payingMethod == "mastercard") {
                if (!$payingData['name'] == "" && !$payingData['number'] == "" && !$payingData['expiry'] == "" && !$payingData['cvc'] == "") {
                    $currentYear = intval(date('y'));
                    $currentMonth = intval(date('m'));

                    $matches = [];
                    preg_match('/^([0-9]{2})\/([0-9]{2})$/', $payingData['expiry'], $matches);

                    $expiryMonth = intval($matches[1]);
                    $expiryYear = intval($matches[2]);

                    if ($expiryYear < $currentYear || ($expiryYear == $currentYear && $expiryMonth < $currentMonth)) {
                        echo json_encode(['status' => 'error', 'message' => 'La tarjeta de crédito ha expirado']);
                        return;
                    }

                    $payingData['number'] = str_replace(' ', '', $payingData['number']);

                    if (!preg_match('/^[0-9]{16}$/', $payingData['number'])) {
                        echo json_encode(['status' => 'error', 'message' => 'El número de tarjeta de crédito no es válido']);
                        return;
                    }

                    if (!preg_match('/^[0-9]{3}$/', $payingData['cvc'])) {
                        echo json_encode(['status' => 'error', 'message' => 'El código de seguridad de la tarjeta de crédito no es válido']);
                        return;
                    }

                    $name = $payingData['name'];
                    $number = $payingData['number'];
                    $expiry = $payingData['expiry'];
                    $cvc = $payingData['cvc'];
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Faltan datos de la tarjeta de crédito']);
                    return;
                }
            } else if ($payingMethod == "paypal") {
                if (!$payingData['email'] == "") {
                    $email = $payingData['email'];
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Faltan datos de la cuenta de PayPal']);
                    return;
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'No se ha seleccionado un método de pago']);
                return;
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No se ha seleccionado un método de pago']);
            return;
        }

        $productos = [];

        $carrito = json_decode($_COOKIE['carrito'], true);

        if (empty($carrito)) {
            echo json_encode(['status' => 'error', 'message' => 'El carrito está vacío']);
            return;
        } else {
            $subtotal = 0;
            $totalDescuento = 0;
            $ivaProducto = 0;

            foreach ($carrito as $carrito) {
                $producto = getProductoByCodigoBarras($carrito['codigo_barras']);
                $producto['cantidad'] = $carrito['cantidad'];
                $total_producto = 0;
                $stock = getStockByProducto($producto['idProducto']);

                if ($stock['cantidadDisponible'] < $producto['cantidad']) {
                    echo json_encode(['status' => 'error', 'message' => 'No hay suficiente stock para el producto ' . $producto['nombre']]);
                    return;
                }

                if ($producto['descuento'] > 0) {
                    $total_producto = $producto['precio'] * $carrito['cantidad'] - $producto['precio'] * $carrito['cantidad'] * $producto['descuento'] / 100;
                } else {
                    $total_producto = $producto['precio'] * $carrito['cantidad'];
                }
                registrarVenta($producto['idProducto'], $producto['cantidad'], $user['idUsuario'], $total_producto);

                $stock = $stock['cantidadDisponible'] - $producto['cantidad'];
                updateStock($producto['idProducto'], $stock);
                array_push($productos, $producto);
                $subtotal += $producto['precio'] * $carrito['cantidad'];
                if ($producto['descuento'] > 0) {
                    $totalDescuento += number_format($producto['precio'] * $carrito['cantidad'] * $producto['descuento'] / 100, 2);
                }

                $iva = $producto['IVA'];
                $ivaProducto += number_format($producto['precio'] * $iva / 100, 2);
            }
            $iva = $ivaProducto;
            $total = number_format($subtotal + $iva - $totalDescuento, 2);

            $total = floatval($total);
        }
        registrarPedido($user['idUsuario'], $direccion, $facturacion, $total, $payingMethod);
        setcookie('carrito', '', time() - 3600, '/');
        $pdfPath = generateInvoicePDF($user, $productos, $subtotal, $iva, $total, $totalDescuento);
        sendEmail($user['email'], $productos, $subtotal, $iva, $total, $totalDescuento, $pdfPath);
        setcookie('mensaje', true, time() + 1, '/');
        echo json_encode(['status' => 'success', 'message' => 'Pedido realizado correctamente']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No se ha enviado el formulario correctamente. Por favor, inténtelo de nuevo.']);
        return;
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No se ha iniciado sesión. Por favor, inicie sesión para realizar un pedido.']);
    return;
}

function generateInvoicePDF($user, $productos, $subtotal, $iva, $total, $totalDescuento)
{
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Configuración de la página
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Gleam');
    $pdf->SetTitle('Factura');
    $pdf->SetSubject('Factura de compra');
    $pdf->SetKeywords('TCPDF, PDF, factura, test, guide');

    // Configuración de los márgenes
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // Configuración del encabezado y pie de página
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // Configuración de la fuente
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // Configuración de las imágenes
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // Configuración de la relación de aspecto de las imágenes
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // Añadir una página
    $pdf->AddPage();

    // Contenido de la factura
    $html = '<h1>Factura</h1>
             <h2>Fecha: ' . date('d-m-Y') . '</h2>
             <h3>Empresa: Gleam</h3>
             <p>Dirección: 123 Calle Principal, Ciudad</p>
             <p>Teléfono: +1234567890</p>
             <p>Email: info@gleam.com</p>
             <h3>Cliente: ' . $user['nombre'] . '</h3>
             <p>Email: ' . $user['email'] . '</p>';

    // Tabla de productos
    $html .= '<table border="1" cellpadding="5">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Imagen</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>';

    foreach ($productos as $producto) {
        $html .= '<tr>
                    <td>' . $producto['nombre'] . '</td>
                    <td><img src="' . $producto['imagen'] . '" height="50" width="50"></td>
                    <td>' . $producto['cantidad'] . '</td>
                    <td>' . $producto['precio'] . ' €</td>
                    <td>' . ($producto['precio'] * $producto['cantidad']) . ' €</td>
                  </tr>';
    }

    $html .= '</tbody></table>';

    // Resumen de precios
    $html .= '<p>Subtotal: ' . $subtotal . ' €</p>
              <p>IVA: ' . $iva . ' €</p>
              <p>Descuento: ' . $totalDescuento . ' €</p>
              <h2>Total: ' . $total . ' €</h2>';

    // Escribir el HTML en el PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Output del PDF y retorno del nombre del archivo
    $pdfFileName = tempnam(sys_get_temp_dir(), 'factura_') . '.pdf';
    $pdf->Output($pdfFileName, 'F');
    return $pdfFileName;
}

function sendEmail($email, $productos, $subtotal, $iva, $total, $totalDescuento, $pdfPath)
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'a.sbay@sapalomera.cat';
        $mail->Password = 'ukjw hkmf ucio virs';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom('a.sbay@sapalomera.cat', 'Gleam');
        $mail->addAddress($email);
        $mail->addReplyTo('a.sbay@sapalomera.cat', 'Gleam');
        $mail->isHTML(true);
        $mail->Subject = 'Resumen de tu pedido';
        $mail->Body = "<html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    font-size: 14px;
                }
                .container {
                    width: 100%;
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #f4f4f4;
                }
                .header {
                    background-color: #f4f4f4;
                    padding: 10px;
                    text-align: center;
                }
                .content {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                .footer {
                    background-color: #f4f4f4;
                    padding: 10px;
                    text-align: center;
                }
                .logo {
                    text-align: center;
                    margin-bottom: 20px;
                }
                .btn {
                    display: inline-block;
                    padding: 10px 20px;
                    background-color: #007bff;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 5px;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>Resumen de tu pedido</h1>
                </div>
                <div class='content'>
                    <p>¡Gracias por tu pedido! Aquí tienes un resumen de tu compra:</p>
                    <table>
                        <thead>
                            <tr>
                            <th>Imagen</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>";
        foreach ($productos as $producto) {
            $mail->Body .= "<tr>
                                <td><img src='$producto[imagen]' alt='$producto[nombre]' width='50'></td>
                                <td>$producto[nombre]</td>
                                <td>$producto[cantidad]</td>
                                <td>$producto[precio] €</td>
                            </tr>";
        }
        $mail->Body .= "</tbody>
                    </table>
                    <p>Envío: Gratuito</p>
                    <p>Subtotal: $subtotal €</p>
                    <p>IVA: $iva €</p>
                    <p>Descuento: $totalDescuento €</p>
                    <p>Total: $total €</p>
                </div>
                <img src='https://i.imgur.com/D4PI3iN.png' alt='Logo de Gleam' width='15%' class='logo'>
                <div class='footer'>
                    <p>Gracias por confiar en nosotros</p>
                </div>
            </div>
        </body>
        </html>";
        $mail->addAttachment($pdfPath);
        $mail->send();
    } catch (Exception $e) {
        echo "El mensaje no se ha podido enviar. Error: {$mail->ErrorInfo}";
    }
}
