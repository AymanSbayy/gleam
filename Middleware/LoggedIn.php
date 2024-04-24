<?php
// Iniciem la sessio en cas de que no estigui iniciada
if (!isset($_SESSION)) {
    session_start([
        'cookie_lifetime' => 1800,
    ]);
}

// Comprovem si l'usuari te la sessio iniciada

function isLoggedIn() {
    if (isset($_SESSION['usuario'])) {
        return true;
    } else {
        return false;
    }
}
