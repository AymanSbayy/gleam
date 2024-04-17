<?php
// Iniciem la sessio en cas de que no estigui iniciada
if (!isset($_SESSION)) {
    session_start([
        'cookie_lifetime' => 1800,
    ]);
}

// Comprovem si l'usuari te la sessio iniciada
// en cas contrari, el redirigim a la pagina de login
// i acabem l'execucio del script
function isLoggedIn() {
    if (!isset($_SESSION['usuario'])) {
        return false;
    }
}
