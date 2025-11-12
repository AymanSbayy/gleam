<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once("../vendor/autoload.php");

require_once("../Model/consultas_usuarios.php");
require_once("../Middleware/LoggedIn.php");
require_once("validations.php");

if (isLoggedIn() == false) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombrecompleto = $_POST["nombrecompleto"];
        $email = $_POST["email"];
        $password = $_POST["password"];


        $errorNombreCompleto = validateNombreCompleto($nombrecompleto);
        $errorEmail = validateEmail($email);
        $errorPassword = validatePassword($password);

        if ($errorNombreCompleto || $errorEmail || $errorPassword) {
            $errors = [
                "nombrecompleto" => $errorNombreCompleto,
                "email" => $errorEmail,
                "password" => $errorPassword,
            ];
            echo json_encode($errors);
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $activation_token = bin2hex(random_bytes(16));
            $activation_token_hash = hash('sha256', $activation_token);
            $result = registerUser($nombrecompleto, $email, $password, $activation_token_hash);

            if ($result) {
                sendEmail($email, $activation_token);
                echo json_encode(["success" => "Se ha enviado un correo de activación a tu dirección de correo electrónico"]);
            } else {
                echo json_encode(["error" => "Ha ocurrido un error al registrar el usuario"]);
            }
        }
    } else {
        header("Location: ../index.php");
    }
}

function sendEmail($email, $activation_token)
{
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Debugoutput = 'html';
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'a.sbay@sapalomera.cat';
        $mail->Password = 'awdj gqpo zdfb krpo';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom('a.sbay@sapalomera.cat', 'Gleam');
        $mail->addAddress($email);
        $mail->addReplyTo('a.sbay@sapalomera.cat', 'Gleam');
        $mail->isHTML(true);
        $mail->Subject = 'Activación de cuenta';
        $mail->Subject = 'Activación de cuenta';
        $mail->Body = "<html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #fff;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                .logo {
                    text-align: center;
                    margin-bottom: 20px;
                }
                .content {
                    text-align: justify;
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
                    <div class='logo'>
                        <img src='ruta/a/tu/logo.png' alt='Logo'>
                    </div>
                    <div class='content'>
                        <p>Hola,</p>
                        <p>¡Gracias por registrarte! Para activar tu cuenta, haz click en el siguiente enlace:</p>
                        <p><a href='https://slateblue-cat-348405.hostingersite.com/Controlador/activacion.php?token=$activation_token' class='btn'>Activar cuenta</a></p>
                        <p>Si no puedes hacer click en el enlace, copia y pega la siguiente URL en tu navegador:</p>
                        <p>https://slateblue-cat-348405.hostingersite.com/Controlador/activacion.php?token=$activation_token</p>
                        <p>¡Gracias!</p>
                    </div>
                </div>
            </body>
        </html>";
        $mail->AltBody = "Hola,\n\n¡Gracias por registrarte! Para activar tu cuenta, visita el siguiente enlace:\nhttps://slateblue-cat-348405.hostingersite.com/Controlador/activacion.php?token=$activation_token\n\nSi no puedes acceder al enlace, copia y pega la URL en tu navegador.\n\n¡Gracias!";
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
