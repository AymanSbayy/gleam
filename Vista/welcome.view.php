<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GLEAM</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">

    <!-- Estilos -->
    <link rel="stylesheet" href="../public/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    
    <script type="module" src="../public/js/welcome.js"></script>
    <script src="../public/js/auth.js"></script>
</head>

<body>
    <?php include("Components/navbar.php"); ?>
    <?php include("Components/email_verified.php"); ?>

    <hr class="hrr">
    <div id="alert" name="alert">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active d-item">
                    <img src="../public/images/hogar_banner.jpg" class="d-block w-100 d-img" alt="Slide 1">
                    <div class="carousel-caption d-none d-md-block d-caption text-start">
                        <h1 class="display-5 fw-bolder text-capitalize">Hogar y Jardinería</h1>
                        <p class="mt-3 fs-3 text-uppercase">Transforma tu hogar y jardín en un oasis de confort y belleza</p>
                        <div>
                            <a class="btnfos btnfos-1" href="shop.php?categoria=Hogar y jardinería" onclick="app.processingButton(event)">
                                <svg>
                                    <rect x="0" y="0" fill="none" width="100%" height="100%" />
                                </svg>
                                Ver más
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item d-item">
                    <img src="../public/images/electro_banner.jpg" class="d-block w-100 d-img" alt="Slide 2">
                    <div class="carousel-caption d-none d-md-block d-caption text-start">
                        <h1 class="display-5 fw-bolder text-capitalize">Electrodomésticos</h1>
                        <p class="mt-3 fs-3 text-uppercase">Descubre la tecnología que simplifica tu vida diaria en casa</p>
                        <div>
                            <a class="btnfos btnfos-1" href="shop.php?categoria=Electrodomésticos" onclick="app.processingButton(event)">
                                <svg>
                                    <rect x="0" y="0" fill="none" width="100%" height="100%" />
                                </svg>
                                Ver más
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item d-item">
                    <img src="../public/images/deportes_banner.jpg" class="d-block w-100 d-img" alt="Slide 3">
                    <div class="carousel-caption d-none d-md-block d-caption text-start">
                        <h1 class="display-5 fw-bolder text-capitalize">Deportes</h1>
                        <p class="mt-3 fs-3 text-uppercase">Eleva tu rendimiento y alcanza tus metas deportivas con equipamiento de calidad</p>
                        <div>
                            <a class="btnfos btnfos-1" href="shop.php?categoria=Deportes" onclick="app.processingButton(event)">
                                <svg>
                                    <rect x="0" y="0" fill="none" width="100%" height="100%" />
                                </svg>
                                Ver más
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container">
            <div class="Carousel">
                <h2 class="text-center mt-5">Productos destacados de esta semana</h2>
                <div class="slick-list" id="slick-list">
                    <div class="slick-track" id="track">
                        <?php foreach ($productosVendidos as $producto) { ?>
                            <div class="slick">
                                <div class="card card-personal">
                                    <a href="producto.php?codigo_barras=<?php echo $producto['codigo_barras']; ?>">
                                        <img src="<?php echo $producto['imagen']; ?>" class="card-img" alt="<?php echo $producto['nombre']; ?>">
                                    </a>
                                    <div class="intro">
                                        <h5 class=""><?php echo $producto['nombre']; ?></h5>
                                        <?php
                                        if ($producto['descuento'] > 0) {
                                            echo '<p class="card-price">';
                                            echo '<del>' . number_format($producto['precio'], 2, ',', '.') . ' €</del>';
                                            echo '<span style="font-size: 16px; margin-left: 10px;">' . number_format($producto['precio'] - ($producto['precio'] * $producto['descuento'] / 100), 2, ',', '.') . ' €</span>';
                                            echo '</p>';
                                        } else {
                                            echo '<p class="">' . number_format($producto['precio'], 2, ',', '.') . ' €</p>';
                                        }
                                        ?>
                                        <a href="#" style="color: white;" class="btn" id="añadir_cesta" onclick="añadirCesta('<?php echo (string)$producto['codigo_barras']; ?>', 1)">Añadir al carrito</a>
                                        <a href="producto.php?codigo_barras=<?php echo $producto['codigo_barras']; ?>" style="color: white;" class="btn">Ver producto</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <button class="slick-arrow slick-prev" id="button-prev" data-button="button-prev" onclick="app.processingButton(event)">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" class="svg-inline--fa fa-chevron-left fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path>
                        </svg>
                    </button>
                    <button class="slick-arrow slick-next" id="button-next" data-button="button-next" onclick="app.processingButton(event)">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" class="svg-inline--fa fa-chevron-right fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <hr class="mt-5">

        <div class="container-fluid">
            <h2 class="text-center mt-5 title">Subcategorías más populares</h2>
            <div class="row mt-5">
                <div class="col-12 col-sm-6 col-md-3 no-padding-col card2">
                    <img src="https://images.prismic.io/velodrom-retail/a8e67cde-4a49-4eb6-bbe2-f38c869bdba7_mechanism_ss21_20_7A-hd-hd.jpeg?auto=format%2Ccompress&fit=max&q=50&w=1800" class="card-img2" alt="...">
                    <div class="card-body">
                        <h5 class="card-title2">Ciclismo</h5>
                        <p class="card-text2">Descubre las mejores bicicletas y accesorios para disfrutar de tus rutas favoritas</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 no-padding-col card2">
                    <img src="https://img.pccomponentes.com/pcblog/3764/tipos-ordenadores-sobremesa.jpg" class="card-img2" alt="...">
                    <div class="card-body">
                        <h5 class="card-title2">Ordenadores</h5>
                        <p class="card-text2">Descubre las mejores bicicletas y accesorios para disfrutar de tus rutas favoritas</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 no-padding-col card2">
                    <img src="https://cnnespanol.cnn.com/wp-content/uploads/2021/12/211201164602-file-sony-playstation-5-microsoft-xbox-series-x-consoles-restricted-super-tease.jpg?quality=100&strip=info" class="card-img2" alt="...">
                    <div class="card-body">
                        <h5 class="card-title2">Consolas</h5>
                        <p class="card-text2">Descubre las mejores bicicletas y accesorios para disfrutar de tus rutas favoritas</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 no-padding-col card2">
                    <img src="https://lyadesign.es/cdn/shop/products/Diseo-de-lmpara-de-suspensin-vidrio-triturado-7-lmparas-0_1200x.jpg?v=1669061044" class="card-img2" alt="...">
                    <div class="card-body">
                        <h5 class="card-title2">Lamparas</h5>
                        <p class="card-text2">Descubre las mejores bicicletas y accesorios para disfrutar de tus rutas favoritas</p>
                    </div>
                </div>
            </div>
        </div>


        <?php include("Components/footer.php"); ?>

</body>

</html>