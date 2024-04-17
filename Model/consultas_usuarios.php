<?php

require_once("../database/pdo.php");


/**
 * Verifica si el email ya existe en la base de datos.
 *
 * @param 
 * @return boolean true si el email ya existe, false si no.
 */
function emailExists($email) {
    $conn = connexion();
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

/**
 * Registra un usuario en la base de datos.
 *
 * @param string $nombrecompleto Nombre completo del usuario.
 * @param string $email Email del usuario.
 * @param string $password Contraseña del usuario.
 * @return boolean true si el usuario se ha registrado correctamente, false si no.
 */

function registerUser($nombrecompleto, $email, $password, $activation_token_hash) {
    

    $conn = connexion();
    $sql = "INSERT INTO usuarios (nombre, email, password, administrador, fechaRegistro, account_activation_token) VALUES ('$nombrecompleto', '$email', '$password', 0, NOW(), '$activation_token_hash')";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();
    return $result;
}

/**
 * Activa la cuenta de un usuario.
 *
 * @param string $activation_token Token de activación.
 * @return boolean true si la cuenta se ha activado correctamente, false si no.
 */

function activateUser($activation_token) {
    $activation_token = hash('sha256', $activation_token);
    $conn = connexion();
    $sql = "UPDATE usuarios SET account_activation_token = NULL WHERE account_activation_token = '$activation_token'";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();
    return $result;
}


/**
 * Obtiene el email de un usuario a partir de un token de activación.
 *
 * @param string $activation_token Token de activación.
 * @return string Email del usuario.
 */

function getMailByToken($activation_token) {
    $activation_token = hash('sha256', $activation_token);
    $conn = connexion();
    $sql = "SELECT email FROM usuarios WHERE account_activation_token = '$activation_token'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result["email"];
}