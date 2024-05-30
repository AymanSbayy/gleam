<?php

require_once("../Middleware/LoggedIn.php");


if (isLoggedIn()) {
    session_destroy();
}

header("Location: ../index.php");