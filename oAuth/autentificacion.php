<?php

require_once("configuracion.php");

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);
    $oauth = new Google_Service_Oauth2($client);
    $user = $oauth->userinfo->get();
    $email = $user->email;
    $nombre = $user->name;
    $provider = "google";
    $foto = $user->picture;

    if (!emailExists($email)) {
        registerUserOAuth($nombre, $email, $foto, $provider, $token["access_token"]);
    }
    $_SESSION['usuario'] = $email;
}