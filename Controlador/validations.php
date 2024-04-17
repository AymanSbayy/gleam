<?php
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

