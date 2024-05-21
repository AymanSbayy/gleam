<?php

function userIsBlocked($email) {
    require_once("../Model/consultas_usuarios.php");
    $user = getUserByEmail($email);
    return $user['bloqueado'];
}

function validateTelefono($telefono) {
    if (empty($telefono)) {
        return "El teléfono es obligatorio";
    } else if (!preg_match("/^[0-9]{9}$/", $telefono)) {
        return "El teléfono debe tener 9 dígitos";
    }
}

// Validate nombrecompleto
function validateNombreCompleto($nombrecompleto) {
    //Comprobar que haya obligatoriamente tambien apellidos
    if (empty($nombrecompleto)) {
        return "El nombre y apellidos son obligatorios";
    } else if (!preg_match("/^[a-zA-Z-' ]*$/", $nombrecompleto)) {
        return "Solo se permiten letras y espacios en blanco";
    } else if (strlen($nombrecompleto) > 100) {
        return "El nombre y apellidos no pueden tener más de 100 caracteres";
    } 
}

// Validate email
function validateEmail($email) {
    // Add your validation logic here
    if (strlen($email) == 0) {
        return "El correo electrónico es obligatorio";
    } else if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        return "El correo electrónico no es válido";
    } else if (strlen($email) > 100) {
        return "El correo electrónico no puede tener más de 100 caracteres";
    } else if (emailExists($email)) {
        return "El correo electrónico ya está en uso";
    }
    
}

// Validate password

function validatePassword($password) {
    if (strlen($password) == 0) {
        return "La contraseña es obligatoria";
    } else if (strlen($password) < 8) {
        return "La contraseña debe tener al menos 8 caracteres";
    } else if (strlen($password) > 100) {
        return "La contraseña no puede tener más de 100 caracteres";
    } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
        return "La contraseña debe contener al menos una letra mayúscula, una letra minúscula y un número";
    }
}

function validateDireccion($direccion) {
    if ($direccion == "") {
        return false;
    } else if (strlen($direccion) > 100) {
        return "La dirección no puede tener más de 100 caracteres";
    }
}

function validateCodigoPostal($codigo_postal) {
    if (empty($codigo_postal)) {
        return "El código postal es obligatorio";
    } else if (!preg_match("/^[0-9]{5}$/", $codigo_postal)) {
        return "El código postal debe tener 5 dígitos";
    }
}

function validateCiudad($ciudad) {
    if (empty($ciudad)) {
        return "La ciudad es obligatoria";
    } else if (strlen($ciudad) > 100) {
        return "La ciudad no puede tener más de 100 caracteres";
    }
}

function validateProvincia($provincia) {
    if (empty($provincia)) {
        return "La provincia es obligatoria";
    } else if (strlen($provincia) > 100) {
        return "La provincia no puede tener más de 100 caracteres";
    }
}

function validatePais($pais) {
    if (empty($pais)) {
        return "El país es obligatorio";
    } else if (strlen($pais) > 100) {
        return "El país no puede tener más de 100 caracteres";
    }
}

