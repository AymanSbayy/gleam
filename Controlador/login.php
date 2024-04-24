<?php

require_once("../vendor/autoload.php");

require_once("../Model/consultas_usuarios.php");
require_once("../Middleware/LoggedIn.php");


if (isLoggedIn() == false) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (empty($email) || empty($password)) {
            $errors = [
                "password" => "El correo electrónico y la contraseña son obligatorios",
            ];
            echo json_encode($errors);
        } else {
            $result = loginUser($email, $password);
            if ($result) {
                if (isAccountVerified($email)) {
                    $_SESSION["usuario"] = $email;
                    echo json_encode(["success" => "Has iniciado sesión correctamente"]);
                } else {
                    $errors = [
                        "password" => "La cuenta no ha sido verificada",
                    ];
                    echo json_encode($errors);
                }
            } else {
                $errors = [
                    "password" => "El correo electrónico o la contraseña son incorrectos",
                ];
                echo json_encode($errors);
            }
        }
    } else {
        header("Location: ../index.php");
    }
}




