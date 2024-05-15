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

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/product.js"></script>

</head>

<body>
    <?php include("Components/navbar.php"); ?>
    <?php include("Components/email_verified.php"); ?>

    <hr class="hrr">
    <div id="alert" name="alert">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-md-6">
                    <img src="<?php echo $productos['imagen'] ?>" alt="Imagen del Producto" class="img-thumbnail" style="max-width: 550px;" />
                </div>
                <div class="col-12 col-md-6">
                    <h1><?php echo $productos['nombre'] ?></h1>
                    <?php if ($productos['descuento'] > 0) : ?>
                        <p class="card-price mt-5">

                            <span class="badge bg-danger" style="font-size: 16px;"><?php echo $productos['descuento'] ?>% Descuento</span>
                            <span style="font-size: 24px; color: red;"><?php echo number_format($productos['precio'] - ($productos['precio'] * $productos['descuento'] / 100), 2, ',', '.') ?>€</span>
                        <p>Precio Anterior: <del><?php echo number_format($productos['precio'], 2, ',', '.') ?>€</del></p>
                        </p>
                    <?php else : ?>
                        <p class="card-price mt-5" style="font-size: 24px;"><?php echo number_format($productos['precio'], 2, ',', '.') ?>€</p>
                    <?php endif; ?>
                    <form action="process_purchase.php" method="POST">
                        <div class="row mt-5">
                            <div class="col">
                                <label for="cantidad" class="form-label" style="font-size: 22px;">Cantidad:</label>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" id="unidades_venta" name="unidades_venta" required style="width: 70px;" value="1" min="1" max="<?php echo $stock?>">
                            </div>
                            <p style="font-size: 16px; color: red;"><strong>Atencion: </strong> Solo quedan <?php echo $stock?> unidades disponibles</p>
                            <p class="mt-3" style="font-size: 16px;"><?php echo $productos['descripcion'] ?></p>
                            <p class="mt-3" style="font-size: 16px;"><i class="fas fa-truck"></i> Este producto llega en <?php echo date('d/m/Y', strtotime('+2 days')) ?></p>
                        </div>
                        <div class="col mt-3">
                            <button type="submit" class="btn btn-dark" style="width: 100%;">Comprar</button>
                        </div>
                    </form>
                    <a href="#" class="btn btn-secondary mt-2" style="width: 100%;" onclick="añadirCesta('<?php echo $productos['codigo_barras']; ?>', $('#unidades_venta').val())">Añadir al carrito</a>
                </div>
                <!-- Hidden inputs -->
                <input type="hidden" id="codigo_barras" value="<?php echo $productos['codigo_barras'] ?>">
            </div>
        </div>
        <hr class="hrr mt-5">

        <div class="container mt-5">
            <h2>Más productos de <?php echo $subcategoria['nombre'] ?></h2>
            <div class="row">
                <?php
                $random_products = array_rand($productos_relacionados, min(6, count($productos_relacionados)));
                foreach ($random_products as $index) {
                    $productos = $productos_relacionados[$index];
                    if ($productos['codigo_barras'] == $codigo_barras) {
                        continue;
                    }
                ?>
                    <div class="col-12 col-md-6 col-lg-4 mt-5">
                        <div class="card card card-personal2">
                            <a href="producto.php?codigo_barras=<?php echo $productos['codigo_barras']; ?>">
                                <img src="<?php echo $productos['imagen']; ?>" class="card-img" alt="<?php echo $productos['nombre']; ?>">
                            </a>
                            <div class="intro">
                                <h5 class=""><?php echo $productos['nombre']; ?></h5>
                                <?php
                                if ($productos['descuento'] > 0) {
                                    echo '<p class="card-price">';
                                    echo '<del>' . number_format($productos['precio'], 2, ',', '.') . ' €</del>';
                                    echo '<span style="font-size: 16px; margin-left: 10px;">' . number_format($productos['precio'] - ($productos['precio'] * $productos['descuento'] / 100), 2, ',', '.') . ' €</span>';
                                    echo '</p>';
                                } else {
                                    echo '<p class="">' . number_format($productos['precio'], 2, ',', '.') . ' €</p>';
                                }
                                ?>
                                <!-- hidden inputs -->
                                <a href="#" style="color: white;" class="btn" id="añadir_cesta" onclick="añadirCesta('<?php echo $productos['codigo_barras']; ?>', 1)">Añadir al carrito</a>
                                <a href="producto.php?codigo_barras=<?php echo $productos['codigo_barras']; ?>" style="color: white;" class="btn">Ver producto</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <hr class="hrr mt-5">
        <div class="container mt-5">
            <h2>Opiniones de los clientes</h2>
            <!-- Aqui se mostraran las opiniones de los clientes (comentarios) -->
        </div>
    </div>




    <?php include("Components/footer.php"); ?>

</body>

</html>