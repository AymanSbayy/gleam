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
        $mail->Body = "Haz click en el siguiente enlace para activar tu cuenta: <a href='http://localhost/gleam/Controlador/activacion.php?token=$activation_token'>Activar cuenta</a>";
        $mail->AltBody = 'Haz click en el siguiente enlace para activar tu cuenta: http://localhost/gleam/Controlador/activacion.php?token=$activation_token';
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
