<?php
require_once '../Middleware/LoggedIn.php';
require_once '../oAuth/autentificacion.php';
require_once '../Model/consultas_usuarios.php';



if (isLoggedIn() == false) {
    $usuario = null;
} else {
    $usuario = $_SESSION['usuario'];
    $info = getUserInfo($usuario);
}

$_COOKIE['page'] = $_SERVER['REQUEST_URI'];

?>

<header class="carousel">
    <div class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner carousel-inner2">
            <div class="carousel-item2 active">
                <p class="text-center">Bienvenido a la página de la tienda</p>
            </div>
            <div class="carousel-item2">
                <p class="text-center">Aquí encontrarás los mejores productos</p>
            </div>
            <div class="carousel-item2">
                <p class="text-center">¡No te quedes sin el tuyo!</p>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary nopadding">
        <div class="container-fluid">
            <!-- Primera sección: Icono de la página -->
            <div class="col-md-4">
                <a class="navbar-brand mt-2 mt-lg-0" href="../index.php">
                    <img src="../public/images/logo_privisional.png" height="40" alt="MDB Logo" loading="lazy" />
                </a>
            </div>

            <!-- Segunda sección: Botones de navegación -->
            <div class="col-md-4">
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 32 32">
                        <path d="M 4 7 L 4 9 L 28 9 L 28 7 Z M 4 15 L 4 17 L 28 17 L 28 15 Z M 4 23 L 4 25 L 28 25 L 28 23 Z"></path>
                    </svg>
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTienda" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                TIENDA
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownTienda">
                                <li><a class="dropdown-item" href="shop.php?categoria=hogar_jardineria">Hogar y jardinería</a></li>
                                <li><a class="dropdown-item" href="shop.php?categoria=electrodomesticos">Electrodomésticos</a></li>
                                <li><a class="dropdown-item" href="shop.php?categoria=deportes">Deportes</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sobre_nosotros.php">SOBRE NOSOTROS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="info.php">INFO</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Tercera sección: Iconos de usuario y carrito de compra -->
            <div class="col-md-4">
                <ul class="navbar-nav justify-content-end">
                    <?php
                    if ($usuario !== null) { ?>
                        <li class="nav-item">
                            <img src="<?php echo $info['foto']; ?>" alt="Foto de perfil" class="nav_icon" onclick="toggleMenu()" onmouseover="toggleMenu()" referrerpolicy="no-referrer">
                        </li>
                        <div class="sub-menu-wrap" id="SubMenu" onmouseleave="toggleMenu()">
                            <div class="sub-menu">
                                <div class="uer-info">
                                    <img src="<?php echo $info['foto']; ?>" alt="Foto de perfil">
                                    <h2>Ayman Sbay</h2>
                                </div>
                                <hr>
                                <?php if (isAdmin($usuario)) { ?>
                                    <a href="admin.php" class="sub-menu-link">
                                        <img src="../public/svg/login.svg">
                                        <p>Administración</p>
                                        <span>></span>
                                    </a>
                                <?php } ?>
                                <a href="perfil.php" class="sub-menu-link">
                                    <img src="../public/svg/login.svg">
                                    <p>Perfil</p>
                                    <span>></span>
                                </a>

                                <a href="pedidos.php" class="sub-menu-link">
                                    <img src="../public/svg/login.svg">
                                    <p>Pedidos</p>
                                    <span>></span>
                                </a>

                                <hr>

                                <a href="logout.php" class="sub-menu-link">
                                    <img src="../public/svg/login.svg">
                                    <p>Cerrar sesión</p>
                                    <span>></span>
                                </a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <li class="nav-item">
                            <img src="../public/svg/login.svg" alt="user" class="nav_icon" onclick="$('#loginModal').modal('show')">
                        </li>
                    <?php } ?>

                    <li class="nav-item">
                        <img src="../public/svg/basket.svg" alt="cart" class="nav_icon">
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script>
        function toggleMenu() {
            var menu = document.getElementById("SubMenu");
            menu.classList.toggle("open-menu");
        }
    </script>

</header>


<!-- Modal Login -->

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Iniciar sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-primary btn-lg" id="login">Iniciar sesión</button>
                    </div>
                    <hr>
                    <p class="text-center">¿Nuevo por aquí? <a href="#" data-bs-toggle="modal" data-bs-target="#registroModal" data-bs-dismiss="modal">Regístrate</a></p>
                </form>
            </div>
            <div class="d-grid gap-2">
                <a href="<?php echo $client->createAuthUrl(); ?>" class="btn btn-primary btn-lg">Iniciar sesión con Google</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Registro -->

<div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="registroModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registroModalLabel">Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="registroForm">
                    <div class="mb-3">
                        <label for="nombrecompletoreg" class="form-label">Nombre y apellidos</label>
                        <input type="text" class="form-control" id="nombrecompletoreg" name="nombrecompletoreg" required>
                    </div>
                    <div class="mb-3">
                        <label for="emailreg" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="emailreg" name="emailreg" required>
                    </div>
                    <div class="mb-3">
                        <label for="passwordreg" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="passwordreg" name="passwordreg" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-primary btn-lg" id="register">Registrarse</button>
                    </div>
                    <hr>
                    <p class="text-center">¿Ya tienes cuenta?<a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Inicia sesión</a></p>
                </form>
            </div>
        </div>
    </div>
</div>