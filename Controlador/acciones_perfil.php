<?php

// Se incluyen los archivos necesarios
require_once("../Model/consultas_usuarios.php");
require_once("../Middleware/LoggedIn.php");
require_once("validations.php");

// Se verifica si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Se verifica si la acción es cambiar contraseña
    if (isset($_POST['action']) && $_POST['action'] === 'change_password') {
        // Se obtienen las contraseñas actuales y nuevas
        $current_password = $_POST['currentPassword'];
        $new_password = $_POST['newPassword'];

        // Se verifica que no haya campos vacíos
        if (empty($current_password) || empty($new_password)) {
            echo json_encode(array('status' => 'error', 'message' => 'Por favor, rellena todos los campos'));
            return;
        }

        // Se valida la nueva contraseña
        if (validatePassword($new_password)) {
            echo json_encode(array('status' => 'error', 'message' => 'La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número'));
            return;
        }

        // Se obtiene el usuario actual
        $user = getUserByEmail($_SESSION["usuario"]);

        // Se verifica si el usuario ha iniciado sesión con un proveedor externo
        if ($user['provider'] !== null) {
            echo json_encode(array('status' => 'error', 'message' => 'No puedes cambiar la contraseña si has iniciado sesión con login social'));
            return;
        }

        // Se verifica si la contraseña actual es correcta
        if (password_verify($current_password, $user['password'])) {
            // Se encripta la nueva contraseña
            $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            // Se cambia la contraseña en la base de datos
            cambiarPassword($new_password, $user['idUsuario']);
            echo json_encode(array('status' => 'success', 'message' => 'Contraseña cambiada correctamente'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'La contraseña que has introducido no es correcta'));
        }
    } 
    // Se verifica si la acción es cambiar información personal
    else if (isset($_POST['action']) && $_POST['action'] === 'change_personal_info') {
        // Se verifica si se ha enviado una foto
        if (isset($_FILES['foto'])) {
            // Se verifica el tamaño de la foto
            if ($_FILES['foto']['size'] > 5000000) {
                echo json_encode(array('status' => 'error', 'message' => 'La imagen no puede pesar más de 5MB'));
                return;
            }
            $foto = $_FILES['foto'];
        } else {
            $foto = "";
        }

        // Se obtienen los datos de nombre y teléfono
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

        // Se verifica que al menos un campo esté lleno
        if (empty($nombre) && empty($telefono) && empty($foto['name'])) {
            echo json_encode(array('status' => 'error', 'message' => 'Por favor, rellena al menos un campo'));
            return;
        }

        // Se obtiene el usuario actual
        $user = getUserByEmail($_SESSION["usuario"]);

        // Se verifica si el nombre está vacío
        if (empty($nombre)) {
            $nombre = $user['nombre'];
        } else if (validateNombreCompleto($nombre)) {
            echo json_encode(array('status' => 'error', 'message' => 'El nombre y apellidos no pueden tener más de 100 caracteres'));
            return;
        }
        // Se verifica si el teléfono está vacío
        if (empty($telefono)) {
            $telefono = $user['telefono'];
        } else if (validateTelefono($telefono)) {
            echo json_encode(array('status' => 'error', 'message' => 'El teléfono debe tener 9 dígitos'));
            return;
        }

        // Se verifica si la foto está vacía
        if (empty($foto['name'])) {
            $foto = $user['foto'];
        } else {
            // Se obtiene el contenido de la foto y se codifica en base64
            $foto = file_get_contents($foto['tmp_name']);
            $foto = base64_encode($foto);
        }

        // Se actualizan los datos personales en la base de datos
        cambiarDatosPersonales($nombre, $telefono, $foto, $user['idUsuario']);
        echo json_encode(array('status' => 'success', 'message' => 'Datos personales cambiados correctamente'));
    } 
    // Se verifica si la acción es guardar información de envío
    else if (isset($_POST['action']) && $_POST['action'] === 'save_shipping_info') {
        $id = "";
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        // Se verifica si el ID está vacío
        if (empty($id)) {
            // Se verifica que no haya campos vacíos
            if (!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['ciudad']) && !empty($_POST['provincia']) && !empty($_POST['codigoPostal']) && !empty($_POST['pais'])) {
                $nombre = $_POST['nombre'];
                $direccion = $_POST['direccion'];
                $ciudad = $_POST['ciudad'];
                $provincia = $_POST['provincia'];
                $codigoPostal = $_POST['codigoPostal'];
                $pais = $_POST['pais'];

                // Se validan los campos de dirección, ciudad, provincia, código postal y país
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

                // Se obtiene el usuario actual
                $user = getUserByEmail($_SESSION["usuario"]);

                // Se añade la dirección de envío en la base de datos
                añadirDireccion($nombre, $direccion, $ciudad, $provincia, $codigoPostal, $pais, $user['idUsuario']);
                echo json_encode(array('status' => 'success', 'message' => 'Dirección añadida correctamente'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Por favor, rellena todos los campos'));
            }
        } else {
            // Se verifica que no haya campos vacíos
            if (!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['ciudad']) && !empty($_POST['provincia']) && !empty($_POST['codigoPostal']) && !empty($_POST['pais'])) {
                $nombre = $_POST['nombre'];
                $direccion = $_POST['direccion'];
                $ciudad = $_POST['ciudad'];
                $provincia = $_POST['provincia'];
                $codigoPostal = $_POST['codigoPostal'];
                $pais = $_POST['pais'];
                $id = $_POST['id'];

                // Se validan los campos de dirección, ciudad, provincia, código postal y país
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

                // Se obtiene el usuario actual
                $user = getUserByEmail($_SESSION["usuario"]);

                // Se actualiza la dirección de envío en la base de datos
                actualizarDireccion($id, $nombre, $direccion, $ciudad, $provincia, $codigoPostal, $pais, $user['idUsuario']);
                echo json_encode(array('status' => 'success', 'message' => 'Dirección actualizada correctamente'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Por favor, rellena todos los campos'));
            }
        }
    } 
    // Se verifica si la acción es guardar información de facturación
    else if (isset($_POST['action']) && $_POST['action'] === 'save_billing_info') {
        $id = "";
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        // Se verifica si el ID está vacío
        if (empty($id)) {
            // Se verifica que no haya campos vacíos
            if (!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['ciudad']) && !empty($_POST['provincia']) && !empty($_POST['codigoPostal']) && !empty($_POST['pais'])) {
                $nombre = $_POST['nombre'];
                $direccion = $_POST['direccion'];
                $ciudad = $_POST['ciudad'];
                $provincia = $_POST['provincia'];
                $codigoPostal = $_POST['codigoPostal'];
                $pais = $_POST['pais'];

                // Se validan los campos de dirección, ciudad, provincia, código postal y país
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

                // Se obtiene el usuario actual
                $user = getUserByEmail($_SESSION["usuario"]);

                // Se añaden los datos de facturación en la base de datos
                añadirDatosFacturacion($nombre, $direccion, $ciudad, $provincia, $codigoPostal, $pais, $user['idUsuario']);
                echo json_encode(array('status' => 'success', 'message' => 'Datos de facturación añadidos correctamente', 'id' => $id, 'direccion' => $direccion));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Por favor, rellena todos los campos'));
            }
        } else {
            // Se verifica que no haya campos vacíos
            if (!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['ciudad']) && !empty($_POST['provincia']) && !empty($_POST['codigoPostal']) && !empty($_POST['pais'])) {
                $nombre = $_POST['nombre'];
                $direccion = $_POST['direccion'];
                $ciudad = $_POST['ciudad'];
                $provincia = $_POST['provincia'];
                $codigoPostal = $_POST['codigoPostal'];
                $pais = $_POST['pais'];
                $id = $_POST['id'];

                // Se validan los campos de dirección, ciudad, provincia, código postal y país
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

                // Se obtiene el usuario actual
                $user = getUserByEmail($_SESSION["usuario"]);

                // Se actualizan los datos de facturación en la base de datos
                actualizarDatosFacturacion($id, $nombre, $direccion, $ciudad, $provincia, $codigoPostal, $pais, $user['idUsuario']);
                echo json_encode(array('status' => 'success', 'message' => 'Datos de facturación actualizados correctamente'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Por favor, rellena todos los campos'));
            }
        }
    }
}
