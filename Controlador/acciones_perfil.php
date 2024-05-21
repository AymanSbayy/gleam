<?php

require_once("../Model/consultas_usuarios.php");
require_once("../Middleware/LoggedIn.php");
require_once("validations.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'change_password') {
        $current_password = $_POST['currentPassword'];
        $new_password = $_POST['newPassword'];

        if (empty($current_password) || empty($new_password)) {
            echo json_encode(array('status' => 'error', 'message' => 'Por favor, rellena todos los campos'));
            return;
        }

        if (validatePassword($new_password)) {
            echo json_encode(array('status' => 'error', 'message' => 'La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número'));
            return;
        }

        $user = getUserByEmail($_SESSION["usuario"]);

        if ($user['provider'] !== null) {
            echo json_encode(array('status' => 'error', 'message' => 'No puedes cambiar la contraseña si has iniciado sesión con Google o Facebook'));
            return;
        }

        if (password_verify($current_password, $user['password'])) {
            $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            cambiarPassword($new_password, $user['idUsuario']);
            echo json_encode(array('status' => 'success', 'message' => 'Contraseña cambiada correctamente'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'La contraseña que has introducido no es correcta'));
        }
    } else if (isset($_POST['action']) && $_POST['action'] === 'change_personal_info') {
        if (isset($_FILES['foto'])) {
            if ($_FILES['foto']['size'] > 5000000) {
                echo json_encode(array('status' => 'error', 'message' => 'La imagen no puede pesar más de 5MB'));
                return;
            }
            $foto = $_FILES['foto'];
        } else {
            $foto = "";
        }

        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
        } else {
            $nombre = "";
        }

        if (isset($_POST['telefono'])) {
            $telefono = $_POST['telefono'];
        } else {
            $telefono = "";
        }

        if (empty($nombre) && empty($telefono) && empty($foto['name'])) {
            echo json_encode(array('status' => 'error', 'message' => 'Por favor, rellena al menos un campo'));
            return;
        }

        $user = getUserByEmail($_SESSION["usuario"]);

        if (empty($nombre)) {
            $nombre = $user['nombre'];
        } else if (validateNombreCompleto($nombre)) {
            echo json_encode(array('status' => 'error', 'message' => 'El nombre y apellidos no pueden tener más de 100 caracteres'));
            return;
        }
        if (empty($telefono)) {
            $telefono = $user['telefono'];
        } else if (validateTelefono($telefono)) {
            echo json_encode(array('status' => 'error', 'message' => 'El teléfono debe tener 9 dígitos'));
            return;
        }

        if (empty($foto['name'])) {
            $foto = $user['foto'];
        } else {
            $foto = file_get_contents($foto['tmp_name']);
            $foto = base64_encode($foto);
        }

        cambiarDatosPersonales($nombre, $telefono, $foto, $user['idUsuario']);
        echo json_encode(array('status' => 'success', 'message' => 'Datos personales cambiados correctamente'));
    } else if (isset($_POST['action']) && $_POST['action'] === 'save_shipping_info') {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            if (empty($id)) {
                if (!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['ciudad']) && !empty($_POST['provincia']) && !empty($_POST['codigoPostal']) && !empty($_POST['pais'])) {
                    $nombre = $_POST['nombre'];
                    $direccion = $_POST['direccion'];
                    $ciudad = $_POST['ciudad'];
                    $provincia = $_POST['provincia'];
                    $codigoPostal = $_POST['codigoPostal'];
                    $pais = $_POST['pais'];


                    if (validateDireccion($direccion)) {
                        echo json_encode(array('status' => 'error', 'message' => 'La dirección que has introducido no es válida'));
                        return;
                    }

                    if (validateCiudad($ciudad)) {
                        echo json_encode(array('status' => 'error', 'message' => 'La ciudad que has introducido no es válida'));
                        return;
                    }

                    if (validateProvincia($provincia)) {
                        echo json_encode(array('status' => 'error', 'message' => 'La provincia que has introducido no es válida'));
                        return;
                    }

                    if (validateCodigoPostal($codigoPostal)) {
                        echo json_encode(array('status' => 'error', 'message' => 'El código postal que has introducido no es válido'));
                        return;
                    }

                    if (validatePais($pais)) {
                        echo json_encode(array('status' => 'error', 'message' => 'El país que has introducido no es válido'));
                        return;
                    }

                    $user = getUserByEmail($_SESSION["usuario"]);

                    añadirDireccion($nombre, $direccion, $ciudad, $provincia, $codigoPostal, $pais, $user['idUsuario']);
                    echo json_encode(array('status' => 'success', 'message' => 'Dirección añadida correctamente'));
                } else {
                    echo json_encode(array('status' => 'error', 'message' => 'Por favor, rellena todos los campos'));
                }
            } else {
                if (!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['ciudad']) && !empty($_POST['provincia']) && !empty($_POST['codigoPostal']) && !empty($_POST['pais'])) {
                    $nombre = $_POST['nombre'];
                    $direccion = $_POST['direccion'];
                    $ciudad = $_POST['ciudad'];
                    $provincia = $_POST['provincia'];
                    $codigoPostal = $_POST['codigoPostal'];
                    $pais = $_POST['pais'];
                    $id = $_POST['id'];


                    if (validateDireccion($direccion)) {
                        echo json_encode(array('status' => 'error', 'message' => 'La dirección que has introducido no es válida'));
                        return;
                    }

                    if (validateCiudad($ciudad)) {
                        echo json_encode(array('status' => 'error', 'message' => 'La ciudad que has introducido no es válida'));
                        return;
                    }

                    if (validateProvincia($provincia)) {
                        echo json_encode(array('status' => 'error', 'message' => 'La provincia que has introducido no es válida'));
                        return;
                    }

                    if (validateCodigoPostal($codigoPostal)) {
                        echo json_encode(array('status' => 'error', 'message' => 'El código postal que has introducido no es válido'));
                        return;
                    }

                    if (validatePais($pais)) {
                        echo json_encode(array('status' => 'error', 'message' => 'El país que has introducido no es válido'));
                        return;
                    }

                    $user = getUserByEmail($_SESSION["usuario"]);

                    actualizarDireccion($id, $nombre, $direccion, $ciudad, $provincia, $codigoPostal, $pais, $user['idUsuario']);
                    echo json_encode(array('status' => 'success', 'message' => 'Dirección actualizada correctamente'));
                } else {
                    echo json_encode(array('status' => 'error', 'message' => 'Por favor, rellena todos los campos'));
                }
            }
        }
    } else if (isset($_POST['action']) && $_POST['action'] === 'save_billing_info') {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            if (empty($id)) {
                if (!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['ciudad']) && !empty($_POST['provincia']) && !empty($_POST['codigoPostal']) && !empty($_POST['pais'])) {
                    $nombre = $_POST['nombre'];
                    $direccion = $_POST['direccion'];
                    $ciudad = $_POST['ciudad'];
                    $provincia = $_POST['provincia'];
                    $codigoPostal = $_POST['codigoPostal'];
                    $pais = $_POST['pais'];

                    if (validateDireccion($direccion)) {
                        echo json_encode(array('status' => 'error', 'message' => 'La dirección que has introducido no es válida'));
                        return;
                    }

                    if (validateCiudad($ciudad)) {
                        echo json_encode(array('status' => 'error', 'message' => 'La ciudad que has introducido no es válida'));
                        return;
                    }

                    if (validateProvincia($provincia)) {
                        echo json_encode(array('status' => 'error', 'message' => 'La provincia que has introducido no es válida'));
                        return;
                    }

                    if (validateCodigoPostal($codigoPostal)) {
                        echo json_encode(array('status' => 'error', 'message' => 'El código postal que has introducido no es válido'));
                        return;
                    }

                    if (validatePais($pais)) {
                        echo json_encode(array('status' => 'error', 'message' => 'El país que has introducido no es válido'));
                        return;
                    }

                    $user = getUserByEmail($_SESSION["usuario"]);

                    añadirDatosFacturacion($nombre, $direccion, $ciudad, $provincia, $codigoPostal, $pais, $user['idUsuario']);
                    echo json_encode(array('status' => 'success', 'message' => 'Datos de facturación añadidos correctamente'));
                } else {
                    echo json_encode(array('status' => 'error', 'message' => 'Por favor, rellena todos los campos'));
                }
            } else {
                if (!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['ciudad']) && !empty($_POST['provincia']) && !empty($_POST['codigoPostal']) && !empty($_POST['pais'])) {
                    $nombre = $_POST['nombre'];
                    $direccion = $_POST['direccion'];
                    $ciudad = $_POST['ciudad'];
                    $provincia = $_POST['provincia'];
                    $codigoPostal = $_POST['codigoPostal'];
                    $pais = $_POST['pais'];
                    $id = $_POST['id'];

                    if (validateDireccion($direccion)) {
                        echo json_encode(array('status' => 'error', 'message' => 'La dirección que has introducido no es válida'));
                        return;
                    }

                    if (validateCiudad($ciudad)) {
                        echo json_encode(array('status' => 'error', 'message' => 'La ciudad que has introducido no es válida'));
                        return;
                    }

                    if (validateProvincia($provincia)) {
                        echo json_encode(array('status' => 'error', 'message' => 'La provincia que has introducido no es válida'));
                        return;
                    }

                    if (validateCodigoPostal($codigoPostal)) {
                        echo json_encode(array('status' => 'error', 'message' => 'El código postal que has introducido no es válido'));
                        return;
                    }

                    if (validatePais($pais)) {
                        echo json_encode(array('status' => 'error', 'message' => 'El país que has introducido no es válido'));
                        return;
                    }

                    $user = getUserByEmail($_SESSION["usuario"]);

                    actualizarDatosFacturacion($id, $nombre, $direccion, $ciudad, $provincia, $codigoPostal, $pais, $user['idUsuario']);
                    echo json_encode(array('status' => 'success', 'message' => 'Datos de facturación actualizados correctamente'));
                } else {
                    echo json_encode(array('status' => 'error', 'message' => 'Por favor, rellena todos los campos'));
                }
            }
        }
    }
}
