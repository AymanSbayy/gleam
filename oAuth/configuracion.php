<?php

require_once("../vendor/autoload.php");
require_once("../Model/consultas_usuarios.php");
require_once("../Middleware/LoggedIn.php");

$client_id = "104014291509-d17dlm3rd8e6shgvarenv72dn371nv00.apps.googleusercontent.com";
$client_secret = "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";
$redirect_uri = "https://slateblue-cat-348405.hostingersite.com/Controlador/welcome.php";

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");