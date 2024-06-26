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
    $sql = "INSERT INTO usuarios (nombre, email, password, administrador, fechaRegistro, account_activation_token, bloqueado) VALUES ('$nombrecompleto', '$email', '$password', 0, NOW(), '$activation_token_hash', 0)";
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
    if ($result) {
        return true;
    } else {
        return false;
    }
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

/**
 * Inicia sesión de un usuario.
 *
 * @param string $email Email del usuario.
 * @param string $password Contraseña del usuario.
 * @return boolean true si el usuario se ha logueado correctamente, false si no.
 */

function loginUser($email, $password) {
    $conn = connexion();
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        if (password_verify($password, $result["password"])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


/**
 * Comprueba si la cuenta de un usuario está verificada.
 *
 * @param string $email Email del usuario.
 * @return boolean true si la cuenta está verificada, false si no.
 */

function isAccountVerified($email) {
    $conn = connexion();
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result["account_activation_token"] == NULL) {
        return true;
    } else {
        return false;
    }
}

/**
 * Registrar un usuario con oAuth.
**/

function registerUserOAuth($nombrecompleto, $email, $foto, $provider, $token) {
    $conn = connexion();
    $sql = "INSERT INTO usuarios (nombre, email, foto, provider, provider_id, administrador, fechaRegistro) VALUES ('$nombrecompleto', '$email', '$foto', '$provider', '$token', 0, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return true;
}


function getUserInfo($email) {
    $conn = connexion();
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function isAdmin($email) {
    $conn = connexion();
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result["administrador"] == 1) {
        return true;
    } else {
        return false;
    }
}

function getUsers() {
    $conn = connexion();
    $sql = "SELECT * FROM usuarios";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function deleteUser($idUsuario) {
    $conn = connexion();
    $sql = "DELETE FROM usuarios WHERE idUsuario = $idUsuario";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function bloquearUser($idUsuario) {
    $conn = connexion();
    $sql = "UPDATE usuarios SET bloqueado = 1 WHERE idUsuario = $idUsuario";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function desbloquearUser($idUsuario) {
    $conn = connexion();
    $sql = "UPDATE usuarios SET bloqueado = 0 WHERE idUsuario = $idUsuario";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function quitarAdmin($idUsuario) {
    $conn = connexion();
    $sql = "UPDATE usuarios SET administrador = 0 WHERE idUsuario = $idUsuario";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function hacerAdmin($idUsuario) {
    $conn = connexion();
    $sql = "UPDATE usuarios SET administrador = 1 WHERE idUsuario = $idUsuario";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function getUserByEmail($email) {
    $conn = connexion();
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getDatosFacturacion($idUsuario) {
    $conn = connexion();
    $sql = "SELECT * FROM datos_facturacion WHERE idUsuario = :idUsuario";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getDatosEnvio($idUsuario) {
    $conn = connexion();
    $sql = "SELECT * FROM datos_envio WHERE idUsuario = :idUsuario";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function cambiarPassword($password, $idUsuario) {
    $conn = connexion();
    $sql = "UPDATE usuarios SET password = '$password' WHERE idUsuario = $idUsuario";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function cambiarDatosPersonales($nombre, $telefono, $foto, $idUsuario) {
    $conn = connexion();
    $sql = "UPDATE usuarios SET nombre = '$nombre', telefono = '$telefono', foto = '$foto' WHERE idUsuario = $idUsuario";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function añadirDireccion($nombre,  $direccion, $ciudad, $provincia, $codigoPostal, $pais, $user_id) {
    $conn = connexion();
    $sql = "INSERT INTO datos_envio (nombre, direccion, ciudad, provincia, codigoPostal, pais, idUsuario) VALUES ('$nombre', '$direccion', '$ciudad', '$provincia', '$codigoPostal', '$pais', $user_id)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function actualizarDireccion($id ,$nombre,  $direccion, $ciudad, $provincia, $codigoPostal, $pais, $user_id) {
    $conn = connexion();
    $sql = "UPDATE datos_envio SET nombre = '$nombre', direccion = '$direccion', ciudad = '$ciudad', provincia = '$provincia', codigoPostal = '$codigoPostal', pais = '$pais' WHERE idDireccionEnvio = $id AND idUsuario = $user_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function añadirDatosFacturacion($nombre, $direccion, $ciudad, $provincia, $codigoPostal, $pais, $user_id) {
    $conn = connexion();
    $sql = "INSERT INTO datos_facturacion (nombre, direccion, ciudad, provincia, codigoPostal, pais, idUsuario) VALUES ('$nombre', '$direccion', '$ciudad', '$provincia', '$codigoPostal', '$pais', $user_id)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function actualizarDatosFacturacion($id ,$nombre, $direccion, $ciudad, $provincia, $codigoPostal, $pais, $user_id) {
    $conn = connexion();
    $sql = "UPDATE datos_facturacion SET nombre = '$nombre', direccion = '$direccion', ciudad = '$ciudad', provincia = '$provincia', codigoPostal = '$codigoPostal', pais = '$pais' WHERE idDireccionFacturacion = $id AND idUsuario = $user_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}