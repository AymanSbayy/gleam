-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 31-05-2024 a las 13:28:39
-- Versión del servidor: 10.11.7-MariaDB-1:10.11.7+maria~ubu2204
-- Versión de PHP: 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `a.sbay_gleam`
--
CREATE DATABASE IF NOT EXISTS `a.sbay_gleam` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `a.sbay_gleam`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombre`) VALUES
(1, 'Hogar y jardineria'),
(2, 'Electrodomesticos'),
(3, 'Deportes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `idCompra` int(10) NOT NULL AUTO_INCREMENT,
  `producto` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `total` double NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`idCompra`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`idCompra`, `producto`, `cantidad`, `total`, `fecha`, `hora`) VALUES
(10, 175, 4, 181.4879, '2024-05-29', '00:00:00'),
(11, 176, 6, 96.7879, '2024-05-29', '00:00:00'),
(12, 177, 3, 241.9879, '2024-05-29', '00:00:00'),
(13, 178, 2, 846.9879, '2024-05-29', '00:00:00'),
(14, 179, 5, 1088.9879, '2024-05-29', '00:00:00'),
(15, 180, 4, 786.4879, '2024-05-29', '00:00:00'),
(16, 181, 3, 302.4879, '2024-05-29', '00:00:00'),
(17, 182, 5, 181.4879, '2024-05-25', '00:00:00'),
(18, 183, 3, 967.9879, '2024-05-29', '00:00:00'),
(19, 184, 7, 423.4879, '2024-05-29', '00:00:00'),
(20, 185, 5, 362.9879, '2024-05-29', '00:00:00'),
(21, 186, 10, 120.9879, '2024-05-29', '00:00:00'),
(22, 187, 4, 241.9879, '2024-05-29', '00:00:00'),
(23, 188, 6, 181.4879, '2024-05-29', '00:00:00'),
(24, 189, 12, 33.2889, '2024-05-29', '00:00:00'),
(25, 190, 15, 22.1889, '2024-05-29', '00:00:00'),
(26, 191, 8, 157.2879, '2024-05-29', '00:00:00'),
(27, 192, 5, 483.9879, '2024-05-29', '00:00:00'),
(28, 193, 3, 362.9879, '2024-05-29', '00:00:00'),
(29, 194, 10, 96.7879, '2024-05-29', '00:00:00'),
(30, 195, 7, 120.9879, '2024-05-29', '00:00:00'),
(31, 196, 3, 483.9879, '2024-05-29', '00:00:00'),
(32, 197, 4, 362.9879, '2024-05-29', '00:00:00'),
(33, 198, 5, 181.4879, '2024-05-29', '00:00:00'),
(34, 199, 8, 72.5879, '2024-05-29', '00:00:00'),
(35, 200, 4, 241.9879, '2024-05-29', '00:00:00'),
(36, 201, 3, 362.9879, '2024-05-29', '00:00:00'),
(37, 202, 5, 96.7879, '2024-05-29', '00:00:00'),
(38, 203, 4, 217.7879, '2024-05-29', '00:00:00'),
(39, 204, 6, 120.9879, '2024-05-29', '00:00:00'),
(40, 205, 5, 157.2879, '2024-05-29', '00:00:00'),
(41, 206, 8, 48.3879, '2024-05-29', '00:00:00'),
(42, 207, 7, 60.4879, '2024-05-29', '00:00:00'),
(43, 208, 10, 36.2879, '2024-05-29', '00:00:00'),
(44, 209, 2, 604.9879, '2024-05-29', '00:00:00'),
(45, 210, 1, 1209.9879, '2024-05-29', '00:00:00'),
(46, 211, 2, 725.9879, '2024-05-29', '00:00:00'),
(47, 212, 10, 60.4879, '2024-05-29', '00:00:00'),
(48, 213, 6, 145.1879, '2024-05-29', '00:00:00'),
(49, 214, 7, 108.8879, '2024-05-29', '00:00:00'),
(50, 215, 2, 1088.9879, '2024-05-29', '00:00:00'),
(51, 216, 4, 241.9879, '2024-05-29', '00:00:00'),
(52, 175, 4, 181.4879, '2024-05-30', '00:00:00'),
(53, 176, 6, 96.7879, '2024-05-30', '00:00:00'),
(54, 177, 3, 241.9879, '2024-05-30', '00:00:00'),
(55, 178, 2, 846.9879, '2024-05-30', '00:00:00'),
(56, 179, 5, 1088.9879, '2024-05-30', '00:00:00'),
(57, 180, 4, 786.4879, '2024-05-30', '00:00:00'),
(58, 181, 3, 302.4879, '2024-05-30', '00:00:00'),
(59, 182, 5, 181.4879, '2024-05-30', '00:00:00'),
(60, 183, 3, 967.9879, '2024-05-30', '00:00:00'),
(61, 184, 7, 423.4879, '2024-05-30', '00:00:00'),
(62, 185, 5, 362.9879, '2024-05-30', '00:00:00'),
(63, 186, 10, 120.9879, '2024-05-30', '00:00:00'),
(64, 187, 4, 241.9879, '2024-05-30', '00:00:00'),
(65, 188, 6, 181.4879, '2024-05-30', '00:00:00'),
(66, 189, 12, 33.2889, '2024-05-30', '00:00:00'),
(67, 190, 15, 22.1889, '2024-05-30', '00:00:00'),
(68, 191, 8, 157.2879, '2024-05-30', '00:00:00'),
(69, 192, 5, 483.9879, '2024-05-30', '00:00:00'),
(70, 193, 3, 362.9879, '2024-05-30', '00:00:00'),
(71, 194, 10, 96.7879, '2024-05-30', '00:00:00'),
(72, 195, 7, 120.9879, '2024-05-30', '00:00:00'),
(73, 196, 3, 483.9879, '2024-05-30', '00:00:00'),
(74, 197, 4, 362.9879, '2024-05-30', '00:00:00'),
(75, 198, 5, 181.4879, '2024-05-30', '00:00:00'),
(76, 199, 8, 72.5879, '2024-05-30', '00:00:00'),
(77, 200, 4, 241.9879, '2024-05-30', '00:00:00'),
(78, 201, 3, 362.9879, '2024-05-30', '00:00:00'),
(79, 202, 5, 96.7879, '2024-05-30', '00:00:00'),
(80, 203, 4, 217.7879, '2024-05-30', '00:00:00'),
(81, 204, 6, 120.9879, '2024-05-30', '00:00:00'),
(82, 205, 5, 157.2879, '2024-05-30', '00:00:00'),
(83, 206, 8, 48.3879, '2024-05-30', '00:00:00'),
(84, 207, 7, 60.4879, '2024-05-30', '00:00:00'),
(85, 208, 10, 36.2879, '2024-05-30', '00:00:00'),
(86, 209, 2, 604.9879, '2024-05-30', '00:00:00'),
(87, 210, 1, 1209.9879, '2024-05-30', '00:00:00'),
(88, 211, 2, 725.9879, '2024-05-30', '00:00:00'),
(89, 212, 10, 60.4879, '2024-05-30', '00:00:00'),
(90, 213, 6, 145.1879, '2024-05-30', '00:00:00'),
(91, 214, 7, 108.8879, '2024-05-30', '00:00:00'),
(92, 215, 2, 1088.9879, '2024-05-30', '00:00:00'),
(93, 216, 4, 241.9879, '2024-05-30', '00:00:00'),
(94, 179, 6, 6533.93, '2024-05-30', '17:54:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_envio`
--

DROP TABLE IF EXISTS `datos_envio`;
CREATE TABLE IF NOT EXISTS `datos_envio` (
  `idDireccionEnvio` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `direccion` text NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `codigoPostal` int(5) NOT NULL,
  `pais` varchar(30) NOT NULL,
  PRIMARY KEY (`idDireccionEnvio`),
  KEY `usuario_direccion` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_envio`
--

INSERT INTO `datos_envio` (`idDireccionEnvio`, `idUsuario`, `nombre`, `direccion`, `ciudad`, `provincia`, `codigoPostal`, `pais`) VALUES
(3, 82, 'Casa Blanes 2', 'Carrer MontFerran, 3 3/3', 'Blanes de Mar', 'Girona', 17300, 'España'),
(4, 81, 'prova3', 'C/Vilar petit', 'blanes', 'gi', 8080, 'esp'),
(5, 85, 'Casa Malgrat', 'C/Mossen Felix Paradeda', 'Malgrat de Mar', 'Barcelona', 18300, 'España'),
(6, 85, 'Casa Blanes', 'Carrer Josep Carner', 'Blanes de Mar', 'Girona', 17300, 'España'),
(7, 86, 'Ayman', 'Ayman2', 'Pala', 'Barcelona', 8574, 'Españita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_facturacion`
--

DROP TABLE IF EXISTS `datos_facturacion`;
CREATE TABLE IF NOT EXISTS `datos_facturacion` (
  `idDireccionFacturacion` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `direccion` text NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `codigoPostal` int(5) NOT NULL,
  `pais` varchar(30) NOT NULL,
  PRIMARY KEY (`idDireccionFacturacion`),
  KEY `usuario_facturacion` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_facturacion`
--

INSERT INTO `datos_facturacion` (`idDireccionFacturacion`, `idUsuario`, `nombre`, `direccion`, `ciudad`, `provincia`, `codigoPostal`, `pais`) VALUES
(4, 82, 'Casa Blanes', 'Carrer Josep Carner, 5 3/2', 'Blanes de Mar', 'Giron', 17300, 'España'),
(5, 82, 'Casa blanes 2', 'Carrer Mont-ferran 3 - 3/1', 'Blanes de Mar', 'Girona', 17300, 'España'),
(16, 85, 'Blanes', 'C/Josep Carner. 5 3/2 ', 'Blanes de Mar', 'Girona', 17300, 'España'),
(17, 85, 'Malgrat', 'C/Mossen Félix Paradeda, 54 2', 'Malgrat de Mar', 'Barcelona', 18300, 'España'),
(18, 85, 'Girona', 'C/Girona del Prat', 'Girona', 'Girona', 17200, 'España'),
(19, 86, 'FGHFGD', 'DFSBGN4', 'asdfrtgf', 'sdfgdherterd', 34562, 'Casa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_pago`
--

DROP TABLE IF EXISTS `datos_pago`;
CREATE TABLE IF NOT EXISTS `datos_pago` (
  `idDatosPago` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `tipoPago` varchar(30) NOT NULL,
  `proveedor` varchar(30) NOT NULL,
  `numeroTarjeta` int(16) NOT NULL,
  `codigoSeguridad` int(3) NOT NULL,
  PRIMARY KEY (`idDatosPago`),
  KEY `usuario_pagos` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pedido`
--

DROP TABLE IF EXISTS `detalles_pedido`;
CREATE TABLE IF NOT EXISTS `detalles_pedido` (
  `idDetallePedido` int(11) NOT NULL AUTO_INCREMENT,
  `idPedido` int(20) NOT NULL,
  `idProducto` int(10) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precioUnitario` double NOT NULL,
  PRIMARY KEY (`idDetallePedido`),
  KEY `fk_pedido` (`idPedido`),
  KEY `fk_producto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `idPedido` int(20) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `total` float NOT NULL,
  `direccion` int(11) NOT NULL,
  `facturacion` int(11) NOT NULL,
  `metodoPago` text NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `fk_usuario` (`idUsuario`),
  KEY `fk_direccion` (`direccion`),
  KEY `fk_facturacion` (`facturacion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `idUsuario`, `fecha`, `total`, `direccion`, `facturacion`, `metodoPago`) VALUES
(1, 85, '2024-05-30', 786.49, 5, 16, 'paypal'),
(2, 85, '2024-05-30', 55.48, 6, 16, 'paypal'),
(3, 85, '2024-05-30', 483.99, 5, 16, 'paypal'),
(4, 85, '2024-05-30', 241.99, 5, 16, 'paypal'),
(5, 85, '2024-05-30', 544.48, 6, 17, 'paypal'),
(6, 86, '2024-05-30', 786.47, 7, 19, 'paypal'),
(7, 86, '2024-05-30', 701.77, 7, 19, 'paypal'),
(8, 85, '2024-05-30', 786.49, 6, 16, 'paypal'),
(9, 82, '2024-05-30', 120.99, 3, 4, 'visa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `idProducto` int(10) NOT NULL AUTO_INCREMENT,
  `codigo_barras` text NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `IVA` double NOT NULL,
  `descuento` double NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idSubcategoria` int(11) NOT NULL,
  `imagen` text NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `fk_categoria` (`idCategoria`),
  KEY `fk_subcategoria` (`idSubcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `codigo_barras`, `nombre`, `descripcion`, `precio`, `IVA`, `descuento`, `activo`, `idCategoria`, `idSubcategoria`, `imagen`) VALUES
(175, '1234567890123', 'Aspiradora Hoover', '\"Aspiradora de escoba recargable Hoover HF500 con cepillo antienredos y almacenamiento compacto\"', 149.99, 21, 0, 1, 2, 8, 'https://www.crisabora.com/img/productos/162552_HOOV_ASPIRADORA-HOOVER-AT75011-AT70-39001419_1.jpg\r'),
(176, '2345678901234', 'Licuadora Oster', '\"Licuadora de alto rendimiento Oster BLSTMB-CBG con motor de 1200W y jarra de vidrio resistente al calor\"', 79.99, 21, 0, 1, 2, 9, 'https://saracomercial.com/storage/sku/oster-licuadoras-licuadora-clasica-oster-croma-1-1-1703164644.jpg\r'),
(177, '3456789012345', 'Cafetera Nespresso', '\"Cafetera automática Nespresso Essenza Mini con sistema de cápsulas y función de ahorro de energía\"', 199.99, 21, 0, 1, 2, 9, 'https://m.media-amazon.com/images/I/612JC+iG44L._AC_UF894,1000_QL80_DpWeblab_.jpg\r'),
(178, '4567890123456', 'Smart TV Samsung 55\"', '\"Smart TV LED Samsung 55\' 4K UHD con tecnología HDR y sistema operativo Tizen\"', 699.99, 21, 0, 1, 2, 7, 'https://images.samsung.com/is/image/samsung/p6pim/es/qe55q60bauxxc/gallery/es-qled-q60b-414877-qe55q60bauxxc-534376765?$650_519_PNG$\r'),
(179, '5678901234567', 'Teléfono móvil iPhone 12', '\"Teléfono móvil iPhone 12 con pantalla Super Retina XDR de 6.1 pulgadas y chip A14 Bionic\"', 899.99, 21, 0, 1, 2, 7, 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/refurb-iphone-12-black-2020?wid=2000&hei=1897&fmt=jpeg&qlt=95&.v=1635202741000\r'),
(180, '6789012345678', 'Portátil HP Pavilion', '\"Portátil HP Pavilion con pantalla de 15.6 pulgadas, procesador Intel Core i5 y 8GB de RAM\"', 649.99, 21, 0, 1, 2, 7, 'https://www.hp.com/es-es/shop/Html/Merch/Images/7P6T7EA-ABE_1750x1285.jpg\r'),
(181, '7890123456789', 'Escritorio de madera', '\"Escritorio de madera maciza con cajones y compartimentos para almacenamiento\"', 249.99, 21, 0, 1, 1, 4, 'https://media.blenom.com/product/escritorio-oniro-regulable-800x800.jpg\r'),
(182, '8901234567890', 'Silla ergonómica', '\"Silla ergonómica ajustable con soporte lumbar y reposabrazos acolchados\"', 149.99, 21, 0, 1, 1, 4, 'https://www.ofisillas.es/images/product/1/large/pl_1_1_6066.jpg\r'),
(183, '9012345678901', 'Juego de sofás', '\"Juego de sofás de tela con estructura de madera y cojines extraíbles\"', 799.99, 21, 0, 1, 1, 4, 'https://m.media-amazon.com/images/I/61nLx0XQBgS._AC_UF894,1000_QL80_.jpg'),
(184, '0123456789012', 'Bicicleta de montaña', '\"Bicicleta de montaña con cuadro de aluminio y suspensión delantera\"', 349.99, 21, 0, 1, 3, 1, 'https://s.libertaddigital.com/2022/06/09/bicicleta-de-montana-savadeck-svmb0013.jpg\r'),
(185, '1123456789012', 'Máquina de remo', '\"Máquina de remo con resistencia ajustable y pantalla LCD\"', 299.99, 21, 0, 1, 3, 5, 'https://media.cecotec.cloud/category/maquina-de-remo.png\r'),
(186, '2123456789012', 'Set de pesas', '\"Set de pesas ajustables de 5 a 25 kg con maletín de almacenamiento\"', 99.99, 21, 0, 1, 3, 5, 'https://contents.mediadecathlon.com/m13263828/k$98c94c5d5a47d54ef3470f23afbd382f/sq/08b5b1a7-8860-4bba-bfc3-4ed892d08abd_c251c1c14.jpg?format=auto&f=800x0\r'),
(187, '3123456789012', 'Cortadora de césped', '\"Cortadora de césped eléctrica con ajuste de altura y recogedor\"', 199.99, 21, 0, 1, 1, 2, 'https://media.adeo.com/marketplace/MKP/89138213/c1d9f0539152a7008a2c2c878710df65.jpeg?width=3000&height=3000&format=jpg&quality=80&fit=bounds\r'),
(188, '4123456789012', 'Hidrolavadora', '\"Hidrolavadora de alta presión con boquillas intercambiables y manguera de 5 metros\"', 149.99, 21, 0, 1, 1, 2, 'https://storage.googleapis.com/catalog-pictures-carrefour-es/catalog/pictures/hd_510x_/4054278786575_1.jpg\r'),
(189, '5123456789012', 'Maceta decorativa', '\"Maceta de cerámica decorativa para interior y exterior\"', 29.99, 21, 10, 1, 1, 3, 'https://m.media-amazon.com/images/I/71YdwbwVu9L._AC_UF894,1000_QL80_.jpg\r'),
(190, '6123456789012', 'Cojín floral', '\"Cojín decorativo con diseño floral y relleno de espuma\"', 19.99, 21, 10, 1, 1, 3, 'https://www.rossodecora.es/24465-large_default/cojin-floral-con-flecos.jpg\r'),
(191, '7123456789012', 'Monitor de actividad física', '\"Monitor de actividad física con GPS y monitor de frecuencia cardíaca\"', 129.99, 21, 0, 1, 3, 5, 'https://maxitec.vteximg.com.br/arquivos/ids/197651-500-500/maxitec-everbrilliant-monitor-de-actividad-fisica-y-presion-arterial-verde-cd09hrblkgr-1.jpg?v=638304412887100000\r'),
(192, '8123456789012', 'Patinete eléctrico', '\"Patinete eléctrico plegable con autonomía de 30 km y velocidad máxima de 25 km/h\"', 399.99, 21, 0, 1, 3, 1, 'https://ecoxtrem.com/1897-large_default/patinete-electrico-ecoxtrem-250w-velocidad-25kmh-autonomia-30km-plegable-tipo-xiaomi.jpg\r'),
(193, '9123456789012', 'Trampolín', '\"Trampolín con red de seguridad y marco de acero galvanizado\"', 299.99, 21, 0, 1, 3, 5, 'https://storage.googleapis.com/catalog-pictures-carrefour-es/catalog/pictures/hd_510x_/8436038135780_1.jpg\r'),
(194, '0223456789012', 'Piscina inflable', '\"Piscina inflable para niños con capacidad de 300 litros y material resistente\"', 79.99, 21, 0, 1, 3, 6, 'https://img.aosomcdn.com/thumbnail/100/n0/product/2022/04/22/Rjh98a1804fff6006.jpg\r'),
(195, '1223456789012', 'Barbacoa portátil', '\"Barbacoa portátil a carbón con parrilla ajustable y ruedas para transporte\"', 99.99, 21, 0, 1, 1, 4, 'https://edeusto.com/78471-medium_default/barbacoa-portatil-con-chimenea.jpg\r'),
(196, '2223456789012', 'Robot de cocina', '\"Robot de cocina multifunción con pantalla táctil y múltiples accesorios\"', 399.99, 21, 0, 1, 2, 9, 'https://cdn1.lecuine.com/5038-large_default/cook-expert-robot-de-cocina.jpg\r'),
(197, '3223456789012', 'Aire acondicionado portátil', '\"Aire acondicionado portátil con control remoto y temporizador\"', 299.99, 21, 0, 1, 2, 8, 'https://infiniton.es/3815-large_default/pac-a202b.jpg\r'),
(198, '4223456789012', 'Microondas LG', '\"Microondas LG con función de grill y descongelamiento rápido\"', 149.99, 21, 0, 1, 2, 9, 'https://cdn.milar.es/estaticos/extras/cache/fotos/productos/00/00/12/24/63/500X500_8806087908824-A-1.webp\r'),
(199, '5223456789012', 'Plancha de vapor', '\"Plancha de vapor con base de cerámica y función de auto limpieza\"', 59.99, 21, 0, 1, 2, 8, 'https://m.media-amazon.com/images/I/71fAvKg3JyL._AC_UF894,1000_QL80_.jpg\r'),
(200, '6223456789012', 'Deshumidificador', '\"Deshumidificador con capacidad de 20 litros y apagado automático\"', 199.99, 21, 0, 1, 2, 8, 'https://m.media-amazon.com/images/I/610GkPJaLEL._AC_UF894,1000_QL80_.jpg\r'),
(201, '7223456789012', 'Aspiradora robot', '\"Aspiradora robot con mapeo láser y control por app\"', 299.99, 21, 0, 1, 2, 8, 'https://www.lacasadelelectrodomestico.com/blog/wp-content/uploads/2023/06/mejor-robot-aspirador.jpg\r'),
(202, '8223456789012', 'Parrilla eléctrica', '\"Parrilla eléctrica con superficie antiadherente y control de temperatura\"', 79.99, 21, 0, 1, 2, 9, 'https://www.lapolar.cl/dw/image/v2/BCPP_PRD/on/demandware.static/-/Sites-master-catalog/default/dwa20d9c2f/images/large/4CC18904551.jpg?sw=1200&sh=1200&sm=fit\r'),
(203, '9223456789012', 'Purificador de aire', '\"Purificador de aire con filtro HEPA y modo silencioso\"', 179.99, 21, 0, 1, 2, 8, 'https://media.cecotec.cloud/05625/totalpure-1500-connected_1.png\r'),
(204, '0323456789012', 'Ventilador de torre', '\"Ventilador de torre con control remoto y múltiples velocidades\"', 99.99, 21, 0, 1, 2, 8, 'https://orbegozo.com/wp-content/uploads/2019/03/ventilador-torre-orbegozo-TWM-1010_1.jpg\r'),
(205, '1323456789012', 'Cámara de seguridad', '\"Cámara de seguridad WiFi con visión nocturna y detección de movimiento\"', 129.99, 21, 0, 1, 2, 8, 'https://m.media-amazon.com/images/I/61yKyzSrVBL._AC_UF894,1000_QL80_.jpg\r'),
(206, '2323456789012', 'Lámpara de mesa', '\"Lámpara de mesa LED con ajuste de brillo y puerto USB\"', 39.99, 21, 0, 1, 1, 4, 'https://casika.es/47123-large_default/lampara-sobremesa-frida-blanca-36cm.jpg\r'),
(207, '3323456789012', 'Batidora de mano', '\"Batidora de mano con múltiples velocidades y accesorios\"', 49.99, 21, 0, 1, 2, 9, 'https://www.marialunarillos.com/media/catalog/product/cache/babc9c3930426724bed95a50193e0e01/b/a/batidora-de-mano-o-varillas-el_ctricas-con-vaso-roja---5khbv83---kitchenaid.jpg\r'),
(208, '4323456789012', 'Tostadora', '\"Tostadora de pan con ranuras anchas y función de descongelado\"', 29.99, 21, 0, 1, 2, 9, 'https://www.jata.es/53601-large_default/tostadora-doble-ranura-larga.jpg\r'),
(209, '5323456789012', 'Lavajillas', '\"Lavajillas de 12 cubiertos con programas de lavado rápidos y eficientes\"', 499.99, 21, 0, 1, 2, 9, 'https://imagedelivery.net/4fYuQyy-r8_rpBpcY7lH_A/falabellaPE/20039846_1/w=1500,h=1500\r'),
(210, '6323456789012', 'Frigorífico LG', '\"Frigorífico LG con sistema No Frost y dispensador de agua\"', 999.99, 21, 0, 1, 2, 9, 'https://www.lg.com/es/images/frigorificos/md07529924/gallery/8806091257475_01.jpg\r'),
(211, '7323456789012', 'Set de jardín', '\"Set de muebles de jardín con mesa y tres sillas de ratán\"', 599.99, 21, 0, 1, 1, 4, 'https://m.media-amazon.com/images/I/91D+xxtYazL._AC_UF894,1000_QL80_.jpg\r'),
(212, '8323456789012', 'Tendedero', '\"Tendedero plegable de acero inoxidable con múltiples niveles\"', 49.99, 21, 0, 1, 1, 4, 'https://storage.googleapis.com/catalog-pictures-carrefour-es/catalog/pictures/hd_510x_/5904134949981_1.jpg\r'),
(213, '9323456789012', 'Freidora sin aceite', '\"Freidora sin aceite con capacidad de 5 litros y pantalla digital\"', 119.99, 21, 0, 1, 2, 9, 'https://media.cecotec.cloud/03316/cecofry-full-lnoxblack-5500-pro_z3nb8s_1.png\r'),
(214, '0423456789012', 'Plancha para ropa', '\"Plancha para ropa vertical con vapor continuo y soporte plegable\"', 89.99, 21, 0, 1, 2, 8, 'https://t1.uc.ltmcdn.com/es/posts/9/5/7/el_deposito_de_agua_16759_3_600.jpg\r'),
(215, '1423456789012', 'Televisor LG 65\"', '\"Televisor LG 65\' OLED con resolución 4K y tecnología AI ThinQ\"', 899.99, 21, 0, 1, 2, 7, 'https://www.lg.com/cac/images/tv-barra-de-sonido/md07579271/gallery/D-1.jpg\r'),
(216, '2423456789012', 'Refrigerador portátil', '\"Refrigerador portátil de 30 litros con función de congelación rápida\"', 199.99, 21, 0, 1, 2, 9, 'https://d2qc09rl1gfuof.cloudfront.net/product/BX-YSSCZBXSH-CF55/portable-freezer-m100-1.2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stocks`
--

DROP TABLE IF EXISTS `stocks`;
CREATE TABLE IF NOT EXISTS `stocks` (
  `idStock` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(10) NOT NULL,
  `cantidadDisponible` int(10) NOT NULL,
  PRIMARY KEY (`idStock`),
  KEY `fk_productes` (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `stocks`
--

INSERT INTO `stocks` (`idStock`, `idProducto`, `cantidadDisponible`) VALUES
(116, 175, 4),
(117, 176, 17),
(118, 177, 8),
(119, 178, 6),
(120, 179, 0),
(121, 180, 10),
(122, 181, 6),
(123, 182, 15),
(124, 183, 104),
(125, 184, 14),
(126, 185, 8),
(127, 186, 8),
(128, 187, 7),
(129, 188, 12),
(130, 189, 9),
(131, 190, 15),
(132, 191, 16),
(133, 192, 10),
(134, 193, 6),
(135, 194, 20),
(136, 195, 13),
(137, 196, 5),
(138, 197, 4),
(139, 198, 9),
(140, 199, 16),
(141, 200, 8),
(142, 201, 5),
(143, 202, 10),
(144, 203, 8),
(145, 204, 12),
(146, 205, 10),
(147, 206, 16),
(148, 207, 14),
(149, 208, 20),
(150, 209, 4),
(151, 210, 2),
(152, 211, 4),
(153, 212, 20),
(154, 213, 12),
(155, 214, 14),
(156, 215, 4),
(157, 216, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

DROP TABLE IF EXISTS `subcategorias`;
CREATE TABLE IF NOT EXISTS `subcategorias` (
  `idSubcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`idSubcategoria`),
  KEY `fkk_categoria` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`idSubcategoria`, `nombre`, `idCategoria`) VALUES
(1, 'Ciclismo', 3),
(2, 'Jardineria', 1),
(3, 'Decoracion floral', 1),
(4, 'Interiores', 1),
(5, 'Fitness', 3),
(6, 'Acuaticos', 3),
(7, 'Entretenimiento', 2),
(8, 'Hogar', 2),
(9, 'Cocina', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `password` text DEFAULT NULL,
  `administrador` tinyint(1) NOT NULL,
  `bloqueado` int(2) DEFAULT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `telefono` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `provider` text DEFAULT NULL,
  `provider_id` text DEFAULT NULL,
  `account_activation_token` text DEFAULT NULL,
  `reset_token` text DEFAULT NULL,
  `reset_token_expires` date DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `email`, `password`, `administrador`, `bloqueado`, `fechaRegistro`, `telefono`, `foto`, `provider`, `provider_id`, `account_activation_token`, `reset_token`, `reset_token_expires`, `created_at`, `updated_at`) VALUES
(81, 'xmm', 'backendisthedarkside@gmail.com', NULL, 1, NULL, '2024-05-24', '456456467', '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', 'google', 'ya29.a0AXooCgtkUOfrWU2ukL7buG6hlcx-rpCDTt6HAfeKu9MbY4z3-3jAmswlhBaJ5xzAnAvyl-UPj1YlHp08la0CCb6B14jjsyjs3QI3027go55BAFyrmqPFwY-9QBefv9U88dRgBDXbJ_SXdJecFzXgM6L0WUAZMmIp8PDlaCgYKAdQSARMSFQHGX2Mi4madOg7j40paGlpeH4Y5FA0171', NULL, NULL, NULL, NULL, NULL),
(82, 'Ayman Sbay Zekkari', 'a.sbay@sapalomera.cat', NULL, 1, NULL, '2024-05-27', '', 'https://lh3.googleusercontent.com/a/ACg8ocL6PpqHU5VM_wOfp9cl8ORuw10-1Jp9UwV4IkG9eY3aF1MkxA=s96-c', 'google', 'ya29.a0AXooCgtU3lVSnJjpXWJkFnfM2kfP6L3GQnLH_FNnNMTql5pBpeG7U4xebWoGe-pw3KDpk9KN7xaP9-WRg3dYaMCtUlB6FOcB6Pci2IDPOCbWJx7fY8NjtxSNY4Y5ds-HcdZhyN5ql-tEALU0LILCcCiG9EZpiezR1lVbaCgYKAXsSARMSFQHGX2MiTkyaCOIejEFnOdd9TiYXQA0171', NULL, NULL, NULL, NULL, NULL),
(84, 'Elyass el Jerari', 'e.jerari@sapalomera.cat', '$2y$10$rj2cf9Vc9rmgmHntku9on..dT4j9bx7dfGjsKX4qgwbpujFpyjXpy', 1, 0, '2024-05-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'Ayman Zekkari', 'ayman.zekkari2@gmail.com', '$2y$10$E0Ux2khdcBI7lP07REO8b.gPbCvSihBfKLY71KMzqoOMLZIDBxe7m', 0, 0, '2024-05-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'Mark Alvarez', 'm.alvarez@sapalomera.cat', '$2y$10$j3Ft9Ci55cZR6jinjt44jux.q6pKtH8ydeZIoz1b1LxKUTjQPxXUq', 1, 0, '2024-05-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `idVenta` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL,
  `fecha` date NOT NULL,
  `llegaEl` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`idVenta`),
  KEY `producto` (`idProducto`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idVenta`, `idProducto`, `idUsuario`, `cantidad`, `total`, `fecha`, `llegaEl`, `hora`) VALUES
(1, 175, 85, 1, 149.99, '2024-05-28', '2024-06-01', '00:00:00'),
(2, 179, 85, 1, 899.99, '2024-05-30', '2024-05-01', '00:00:00'),
(3, 197, 85, 1, 299.99, '2024-05-30', '2024-06-01', '00:00:00'),
(4, 175, 85, 1, 149.99, '2024-05-30', '2024-06-01', '00:00:00'),
(5, 179, 85, 1, 899.99, '2024-05-30', '2024-06-01', '00:00:00'),
(6, 197, 85, 1, 299.99, '2024-05-30', '2024-06-01', '00:00:00'),
(7, 175, 85, 1, 149.99, '2024-05-30', '2024-06-01', '00:00:00'),
(8, 179, 85, 1, 899.99, '2024-05-30', '2024-06-01', '00:00:00'),
(9, 197, 85, 1, 299.99, '2024-05-30', '2024-06-01', '00:00:00'),
(10, 175, 85, 1, 149.99, '2024-05-30', '2024-06-01', '00:00:00'),
(11, 179, 85, 1, 899.99, '2024-05-30', '2024-06-01', '00:00:00'),
(12, 175, 85, 1, 149.99, '2024-05-30', '2024-06-01', '00:00:00'),
(13, 179, 85, 1, 899.99, '2024-05-30', '2024-06-01', '00:00:00'),
(14, 175, 85, 1, 149.99, '2024-05-30', '2024-06-01', '00:00:00'),
(15, 179, 85, 1, 899.99, '2024-05-30', '2024-06-01', '00:00:00'),
(16, 175, 85, 1, 149.99, '2024-05-30', '2024-06-01', '00:00:00'),
(17, 179, 85, 1, 899.99, '2024-05-30', '2024-06-01', '00:00:00'),
(18, 179, 85, 1, 899.99, '2024-05-30', '2024-06-01', '00:00:00'),
(19, 179, 85, 1, 899.99, '2024-05-30', '2024-06-01', '00:00:00'),
(20, 180, 85, 1, 649.99, '2024-05-30', '2024-06-01', '00:00:00'),
(21, 190, 85, 1, 17.991, '2024-05-30', '2024-06-02', '00:00:00'),
(22, 189, 85, 1, 26.991, '2024-05-30', '2024-06-02', '00:00:00'),
(23, 183, 85, 1, 799.99, '2024-05-30', '2024-06-02', '00:00:00'),
(24, 190, 85, 1, 17.991, '2024-05-30', '2024-06-02', '00:00:00'),
(25, 189, 85, 1, 26.991, '2024-05-30', '2024-06-02', '00:00:00'),
(26, 183, 85, 1, 799.99, '2024-05-30', '2024-06-02', '00:00:00'),
(27, 190, 85, 1, 17.991, '2024-05-30', '2024-06-02', '00:00:00'),
(28, 189, 85, 1, 26.991, '2024-05-30', '2024-06-02', '00:00:00'),
(29, 183, 85, 1, 799.99, '2024-05-30', '2024-06-02', '00:00:00'),
(30, 190, 85, 1, 17.991, '2024-05-30', '2024-06-02', '00:00:00'),
(31, 189, 85, 1, 26.991, '2024-05-30', '2024-06-02', '00:00:00'),
(32, 183, 85, 1, 799.99, '2024-05-30', '2024-06-02', '00:00:00'),
(33, 190, 85, 1, 17.991, '2024-05-30', '2024-06-01', '00:00:00'),
(34, 189, 85, 1, 26.991, '2024-05-30', '2024-06-01', '00:00:00'),
(35, 183, 85, 1, 799.99, '2024-05-30', '2024-06-01', '00:00:00'),
(36, 190, 85, 1, 17.991, '2024-05-30', '2024-06-01', '00:00:00'),
(37, 189, 85, 1, 26.991, '2024-05-30', '2024-06-01', '00:00:00'),
(38, 183, 85, 1, 799.99, '2024-05-30', '2024-06-01', '00:00:00'),
(39, 190, 85, 1, 17.991, '2024-05-30', '2024-06-01', '00:00:00'),
(40, 189, 85, 1, 26.991, '2024-05-30', '2024-06-01', '00:00:00'),
(41, 183, 85, 1, 799.99, '2024-05-30', '2024-06-01', '00:00:00'),
(42, 190, 85, 1, 17.991, '2024-05-30', '2024-06-01', '00:00:00'),
(43, 189, 85, 1, 26.991, '2024-05-30', '2024-06-01', '00:00:00'),
(44, 183, 85, 1, 799.99, '2024-05-30', '2024-06-01', '00:00:00'),
(45, 190, 85, 1, 17.991, '2024-05-30', '2024-06-01', '00:00:00'),
(46, 189, 85, 1, 26.991, '2024-05-30', '2024-06-01', '00:00:00'),
(47, 183, 85, 1, 799.99, '2024-05-30', '2024-06-01', '00:00:00'),
(48, 190, 85, 1, 17.991, '2024-05-30', '2024-06-01', '00:00:00'),
(49, 189, 85, 1, 26.991, '2024-05-30', '2024-06-01', '00:00:00'),
(50, 190, 85, 1, 17.991, '2024-05-30', '2024-06-01', '00:00:00'),
(51, 189, 85, 1, 26.991, '2024-05-30', '2024-06-01', '00:00:00'),
(52, 190, 85, 1, 17.991, '2024-05-30', '2024-06-01', '00:00:00'),
(53, 189, 85, 1, 26.991, '2024-05-30', '2024-06-01', '00:00:00'),
(54, 190, 85, 1, 17.991, '2024-05-30', '2024-06-01', '00:00:00'),
(55, 189, 85, 1, 26.991, '2024-05-30', '2024-06-01', '00:00:00'),
(56, 190, 85, 1, 17.991, '2024-05-30', '2024-06-01', '00:00:00'),
(57, 189, 85, 1, 26.991, '2024-05-30', '2024-06-01', '00:00:00'),
(58, 190, 85, 1, 17.991, '2024-05-30', '2024-06-01', '00:00:00'),
(59, 189, 85, 1, 26.991, '2024-05-30', '2024-06-01', '00:00:00'),
(60, 196, 85, 1, 399.99, '2024-05-30', '2024-06-01', '17:11:38'),
(61, 187, 85, 1, 199.99, '2024-05-30', '2024-06-01', '17:14:31'),
(62, 198, 85, 1, 149.99, '2024-05-30', '2024-06-01', '18:42:14'),
(63, 201, 85, 1, 299.99, '2024-05-30', '2024-06-01', '18:42:14'),
(64, 181, 86, 1, 249.99, '2024-05-30', '2024-06-01', '19:15:57'),
(65, 179, 86, 1, 899.99, '2024-05-30', '2024-06-01', '19:15:57'),
(66, 186, 86, 1, 99.99, '2024-05-30', '2024-06-01', '19:15:57'),
(67, 185, 86, 1, 299.99, '2024-05-30', '2024-06-01', '19:15:57'),
(68, 181, 86, 1, 249.99, '2024-05-30', '2024-06-01', '19:16:00'),
(69, 179, 86, 1, 899.99, '2024-05-30', '2024-06-01', '19:16:00'),
(70, 186, 86, 1, 99.99, '2024-05-30', '2024-06-01', '19:16:00'),
(71, 185, 86, 1, 299.99, '2024-05-30', '2024-06-01', '19:16:00'),
(72, 181, 86, 1, 249.99, '2024-05-30', '2024-06-01', '19:16:03'),
(73, 179, 86, 1, 899.99, '2024-05-30', '2024-06-01', '19:16:03'),
(74, 186, 86, 1, 99.99, '2024-05-30', '2024-06-01', '19:16:03'),
(75, 185, 86, 1, 299.99, '2024-05-30', '2024-06-01', '19:16:03'),
(76, 181, 86, 1, 249.99, '2024-05-30', '2024-06-01', '19:16:03'),
(77, 179, 86, 1, 899.99, '2024-05-30', '2024-06-01', '19:16:03'),
(78, 186, 86, 1, 99.99, '2024-05-30', '2024-06-01', '19:16:03'),
(79, 185, 86, 1, 299.99, '2024-05-30', '2024-06-01', '19:16:03'),
(80, 181, 86, 1, 249.99, '2024-05-30', '2024-06-01', '19:16:03'),
(81, 179, 86, 1, 899.99, '2024-05-30', '2024-06-01', '19:16:03'),
(82, 186, 86, 1, 99.99, '2024-05-30', '2024-06-01', '19:16:03'),
(83, 185, 86, 1, 299.99, '2024-05-30', '2024-06-01', '19:16:03'),
(84, 181, 86, 1, 249.99, '2024-05-30', '2024-06-01', '19:16:03'),
(85, 179, 86, 1, 899.99, '2024-05-30', '2024-06-01', '19:16:03'),
(86, 186, 86, 1, 99.99, '2024-05-30', '2024-06-01', '19:16:03'),
(87, 185, 86, 1, 299.99, '2024-05-30', '2024-06-01', '19:16:03'),
(88, 181, 86, 1, 249.99, '2024-05-30', '2024-06-01', '19:16:03'),
(89, 179, 86, 1, 899.99, '2024-05-30', '2024-06-01', '19:16:03'),
(90, 186, 86, 1, 99.99, '2024-05-30', '2024-06-01', '19:16:03'),
(91, 185, 86, 1, 299.99, '2024-05-30', '2024-06-01', '19:16:03'),
(92, 181, 86, 1, 249.99, '2024-05-30', '2024-06-01', '19:16:03'),
(93, 179, 86, 1, 899.99, '2024-05-30', '2024-06-01', '19:16:03'),
(94, 186, 86, 1, 99.99, '2024-05-30', '2024-06-01', '19:16:03'),
(95, 185, 86, 1, 299.99, '2024-05-30', '2024-06-01', '19:16:03'),
(96, 181, 86, 1, 249.99, '2024-05-30', '2024-06-01', '19:16:03'),
(97, 179, 86, 1, 899.99, '2024-05-30', '2024-06-01', '19:16:03'),
(98, 186, 86, 1, 99.99, '2024-05-30', '2024-06-01', '19:16:03'),
(99, 185, 86, 1, 299.99, '2024-05-30', '2024-06-01', '19:16:03'),
(100, 181, 86, 1, 249.99, '2024-05-30', '2024-06-01', '19:16:03'),
(101, 179, 86, 1, 899.99, '2024-05-30', '2024-06-01', '19:16:03'),
(102, 186, 86, 1, 99.99, '2024-05-30', '2024-06-01', '19:16:04'),
(103, 185, 86, 1, 299.99, '2024-05-30', '2024-06-01', '19:16:04'),
(104, 181, 86, 1, 249.99, '2024-05-30', '2024-06-01', '19:21:33'),
(105, 179, 86, 1, 899.99, '2024-05-30', '2024-06-01', '19:21:33'),
(106, 186, 86, 1, 99.99, '2024-05-30', '2024-06-01', '19:21:33'),
(107, 185, 86, 1, 299.99, '2024-05-30', '2024-06-01', '19:21:33'),
(108, 181, 86, 1, 249.99, '2024-05-30', '2024-06-01', '19:21:35'),
(109, 181, 86, 1, 249.99, '2024-05-30', '2024-06-01', '19:21:41'),
(110, 181, 86, 1, 249.99, '2024-05-30', '2024-06-01', '19:22:20'),
(111, 186, 86, 1, 99.99, '2024-05-30', '2024-06-01', '19:22:20'),
(112, 185, 86, 1, 299.99, '2024-05-30', '2024-06-01', '19:22:20'),
(113, 176, 86, 1, 79.99, '2024-05-30', '2024-06-01', '19:27:37'),
(114, 177, 86, 1, 199.99, '2024-05-30', '2024-06-01', '19:27:37'),
(115, 185, 86, 1, 299.99, '2024-05-30', '2024-06-01', '19:27:37'),
(116, 180, 85, 1, 649.99, '2024-05-30', '2024-06-01', '19:36:33'),
(117, 195, 82, 1, 99.99, '2024-05-30', '2024-06-01', '20:05:23');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datos_envio`
--
ALTER TABLE `datos_envio`
  ADD CONSTRAINT `usuario_direccion` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_facturacion`
--
ALTER TABLE `datos_facturacion`
  ADD CONSTRAINT `usuario_facturacion` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_pago`
--
ALTER TABLE `datos_pago`
  ADD CONSTRAINT `usuario_pagos` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  ADD CONSTRAINT `fk_pedido` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`idPedido`),
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_direccion` FOREIGN KEY (`direccion`) REFERENCES `datos_envio` (`idDireccionEnvio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_facturacion` FOREIGN KEY (`facturacion`) REFERENCES `datos_facturacion` (`idDireccionFacturacion`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_subcategoria` FOREIGN KEY (`idSubcategoria`) REFERENCES `subcategorias` (`idSubcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `fk_productes` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `fkk_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `producto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
