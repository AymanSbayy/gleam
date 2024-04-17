<?php


require_once("../vendor/autoload.php");
require_once("../Model/consultas_usuarios.php");
require_once("../Middleware/LoggedIn.php");

if (isLoggedIn() == false) {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $activation_token = $_GET["token"];
        $email = getMailByToken($activation_token);
        $result = activateUser($activation_token);

        if ($result) {
            $_SESSION["usuario"] = $email;
            header("Location: welcome.php?alert=activated");
            exit;
        } else {
            echo json_encode(["error" => "Ha ocurrido un error al activar la cuenta"]);
        }
    } else {
        header("Location: ../index.php");
    }
}
