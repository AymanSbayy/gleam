<?php
require_once("db.constants.php");
function connexion()
{
    require 'db.constants.php';
    return new PDO("mysql:host=$HOST;dbname=$DB", "$USER", $PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}