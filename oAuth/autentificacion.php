<?php

require_once("configuracion.php");
require_once("../Controlador/validations.php");

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);
    $oauth = new Google_Service_Oauth2($client);
    $user = $oauth->userinfo->get();
    $email = $user->email;
    $nombre = $user->name;
    $provider = "google";
    $foto = $user->picture;

    if (!userIsBlocked($email) == 1) {
        header("Location: ../Controlador/welcome.php");
        if (!emailExists($email)) {

            registerUserOAuth($nombre, $email, $foto, $provider, $token["access_token"]);
            $_SESSION['usuario'] = $email;
        } else {
            $_SESSION['usuario'] = $email;
        }
    } else {
        header("Location: ../Controlador/welcome.php");
    }
}
