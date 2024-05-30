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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <script src="../public/js/menu.js"></script>
    <script src="../public/js/auth.js"></script>
</head>

<body>
    <?php include("Components/navbar.php"); ?>
    <?php include("Components/email_verified.php"); ?>
    <div id="alert" name="alert">
        <script>
            function number_format(amount, decimals, dec_point, thousands_sep) {
                amount = (amount + '').replace(/[^0-9+\-Ee.]/g, '');
                var n = !isFinite(+amount) ? 0 : +amount,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function(n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }

            function filtrarProductos(categoria) {
                $.ajax({
                    url: "filtrar_productos.php",
                    type: "POST",
                    data: {
                        categoria: categoria
                    },
                    success: function(response) {
                        console.log(response);
                        $('#productos-container').empty();
                        $.each(response, function(index, producto) {
                            var html = '<div class="col-12 col-md-6 col-lg-4 mt-5">';
                            html += '<div class="card card-personal2">';
                            html += '<a href="producto.php?codigo_barras=' + producto.codigo_barras + '">';
                            html += '<img src="' + producto.imagen + '" class="card-img" alt="' + producto.nombre + '">';
                            html += '</a>';
                            html += '<div class="intro">';
                            html += '<h5 class="">' + producto.nombre + '</h5>';

                            if (producto.descuento > 0) {
                                html += '<p class="card-price">';
                                html += '<del>' + number_format(producto.precio, 2, ',', '.') + ' €</del>';
                                html += '<span style="font-size: 16px; margin-left: 10px;">' + number_format(producto.precio - (producto.precio * producto.descuento / 100), 2, ',', '.') + ' €</span>';
                                html += '</p>';
                            } else {
                                html += '<p class="">' + number_format(producto.precio, 2, ',', '.') + ' €</p>';
                            }

                            html += ' <a href="#" style="color: white;" id="añadir_cesta" onclick="añadirCesta(\'' + producto.codigo_barras + '\', 1)" class="btn">Añadir a la cesta</a>';
                            html += '<a href="producto.php?codigo_barras=' + producto.codigo_barras + '" style="color: white;" class="btn">Ver producto</a>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';

                            $('#productos-container').append(html);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error al filtrar productos:", error);
                    },
                });
            }
        </script>

        <div class="mt-5">
            <div class="row container-fluid">
                <div class="col-12 col-md-3">
                    <nav class="nav2">
                        <ul class="list">
                            <li class="list_item">
                                <div class="list_button">
                                    <img src="../public/svg/all.svg" alt="" class="list_img">
                                    <a onclick="filtrarProductos('all')" class="nav_link">Todo</a>
                                </div>
                            </li>

                            <li class="list_item">
                                <div class="list_button list_button-click">
                                    <img src="../public/svg/home.svg" alt="" class="list_img">
                                    <a onclick="filtrarProductos('Hogar y jardineria')" class="nav_link">Hogar y jardinería</a>
                                    <img src="../public/svg/arrow.svg" class="list_arrow">
                                </div>
                                <ul class="list_show">
                                    <li class="list_inside">
                                        <a onclick="filtrarProductos('Interiores')" class="nav_link nav_link--inside">Decoración de Interiores</a>
                                    </li>
                                    <li class="list_inside">
                                        <a onclick="filtrarProductos('Decoracion floral')" class="nav_link nav_link--inside">Decoración Floral</a>
                                    </li>
                                    <li class="list_inside">
                                        <a onclick="filtrarProductos('Jardineria')" class="nav_link nav_link--inside">Herramientas de Jardinería</a>
                                    </li>
                                </ul>

                            </li>

                            <li class="list_item">
                                <div class="list_button list_button-click">
                                    <img src="../public/svg/tecno.svg" alt="" class="list_img">
                                    <a onclick="filtrarProductos('Electrodomesticos')" class="nav_link">Electrodomésticos</a>
                                    <img src="../public/svg/arrow.svg" class="list_arrow">
                                </div>
                                <ul class="list_show">
                                    <li class="list_inside">
                                        <a onclick="filtrarProductos('Cocina')" class="nav_link nav_link--inside">Electrodomésticos de Cocina</a>
                                    </li>
                                    <li class="list_inside">
                                        <a onclick="filtrarProductos('Hogar')" class="nav_link nav_link--inside">Electrodomésticos para el Hogar</a>
                                    </li>
                                    <li class="list_inside">
                                        <a onclick="filtrarProductos('Entretenimiento')" class="nav_link nav_link--inside">Electrónica de Entretenimiento</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="list_item">
                                <div class="list_button list_button-click">
                                    <img src="../public/svg/sports.svg" alt="" class="list_img">
                                    <a onclick="filtrarProductos('Deportes')" class="nav_link">Deportes</a>
                                    <img src="../public/svg/arrow.svg" class="list_arrow">
                                </div>
                                <ul class="list_show">
                                    <li class="list_inside">
                                        <a onclick="filtrarProductos('Fitness')" class="nav_link nav_link--inside">Equipamiento para Fitness</a>
                                    </li>
                                    <li class="list_inside">
                                        <a onclick="filtrarProductos('Ciclismo')" class="nav_link nav_link--inside">Accesorios para Ciclismo</a>
                                    </li>
                                    <li class="list_inside">
                                        <a onclick="filtrarProductos('Acuaticos')" class="nav_link nav_link--inside">Equipamiento para Deportes Acuáticos</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </nav>
                </div>

                <!-- Fin de la barra lateral de categorías -->

                <!-- Mostrar productos -->
                <div class="col-12 col-md-8">
                    <div id="productos-container" class="row">
                        <?php
                        foreach ($productos as $producto) : ?>
                            <div class="col-12 col-md-6 col-lg-4 mt-5">
                                <div class="card card card-personal2">
                                    <a href="producto.php?codigo_barras=<?php echo $producto['codigo_barras']; ?>">
                                        <img src="<?php echo $producto['imagen']; ?>" class="card-img" alt="<?php echo $producto['nombre']; ?>">
                                    </a>
                                    <div class="intro">
                                        <h5 class=""><?php echo $producto['nombre']; ?></h5>
                                        
                                        <?php if ($producto['descuento'] > 0) : ?>
                                            <p class="card-price">
                                                <del><?php echo number_format($producto['precio'], 2, ',', '.'); ?> €</del>
                                                <span style="font-size: 16px; margin-left: 10px;"><?php echo number_format($producto['precio'] - ($producto['precio'] * $producto['descuento'] / 100), 2, ',', '.'); ?> €</span>
                                            </p>
                                        <?php else : ?>
                                            <p class=""><?php echo number_format($producto['precio'], 2, ',', '.'); ?> €</p>
                                        <?php endif; ?>
                                        
                                        <a href="#" style="color: white;" id="añadir_cesta" onclick="añadirCesta('<?php echo $producto['codigo_barras']; ?>', 1)" class="btn">Añadir a la cesta</a>
                                        <a href="producto.php?codigo_barras=<?php echo $producto['codigo_barras']; ?>" style="color: white;" class="btn">Ver producto</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Fin de mostrar productos -->
            </div>
        </div>
        <?php include("Components/footer.php"); ?>
</body>

</html>