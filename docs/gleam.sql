-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2024 a las 17:40:49
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gleam`
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
  PRIMARY KEY (`idCompra`)
) ENGINE=InnoDB AUTO_INCREMENT=290 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`idCompra`, `producto`, `cantidad`, `total`) VALUES
(35, 52, 5, 12.1),
(36, 16, 4, 1796.03),
(37, 16, 6, 2694.04),
(38, 27, 6, 954.04),
(40, 89, 10, 108.9),
(41, 90, 10, 21.78),
(42, 91, 12, 156.82),
(43, 92, 27, 676.27),
(44, 93, 27, 676.27),
(45, 94, 27, 676.27),
(46, 95, 27, 676.27),
(47, 96, 12, 300.56),
(48, 97, 12, 300.56),
(49, 98, 12, 300.56),
(61, 110, 5, 181.4879),
(62, 111, 2, 967.9879),
(63, 112, 4, 181.4879),
(64, 113, 6, 96.7879),
(65, 114, 3, 241.9879),
(66, 115, 2, 846.9879),
(67, 116, 5, 1088.9879),
(68, 117, 4, 786.4879),
(69, 118, 3, 302.4879),
(70, 119, 5, 181.4879),
(71, 120, 2, 967.9879),
(72, 112, 4, 181.4879),
(73, 113, 6, 96.7879),
(74, 114, 3, 241.9879),
(75, 115, 2, 846.9879),
(76, 116, 5, 1088.9879),
(77, 117, 4, 786.4879),
(78, 118, 3, 302.4879),
(79, 119, 5, 181.4879),
(80, 120, 2, 967.9879),
(81, 121, 4, 181.4879),
(82, 122, 6, 96.7879),
(83, 123, 3, 241.9879),
(84, 124, 2, 846.9879),
(85, 125, 5, 1088.9879),
(86, 126, 4, 786.4879),
(87, 127, 3, 302.4879),
(88, 128, 5, 181.4879),
(89, 129, 2, 967.9879),
(90, 121, 4, 181.4879),
(91, 122, 6, 96.7879),
(92, 123, 3, 241.9879),
(93, 124, 2, 846.9879),
(94, 125, 5, 1088.9879),
(95, 126, 4, 786.4879),
(96, 127, 3, 302.4879),
(97, 128, 5, 181.4879),
(98, 129, 2, 967.9879),
(99, 130, 4, 181.4879),
(100, 131, 6, 96.7879),
(101, 132, 3, 241.9879),
(102, 133, 2, 846.9879),
(103, 134, 5, 1088.9879),
(104, 135, 4, 786.4879),
(105, 136, 3, 302.4879),
(106, 137, 5, 181.4879),
(107, 138, 2, 967.9879),
(108, 130, 4, 181.4879),
(109, 131, 6, 96.7879),
(110, 132, 3, 241.9879),
(111, 133, 2, 846.9879),
(112, 134, 5, 1088.9879),
(113, 135, 4, 786.4879),
(114, 136, 3, 302.4879),
(115, 137, 5, 181.4879),
(116, 138, 2, 967.9879),
(117, 130, 4, 181.4879),
(118, 131, 6, 96.7879),
(119, 132, 3, 241.9879),
(120, 133, 2, 846.9879),
(121, 134, 5, 1088.9879),
(122, 135, 4, 786.4879),
(123, 136, 3, 302.4879),
(124, 137, 5, 181.4879),
(125, 139, 2, 967.9879),
(126, 130, 4, 181.4879),
(127, 131, 6, 96.7879),
(128, 132, 3, 241.9879),
(129, 133, 2, 846.9879),
(130, 134, 5, 1088.9879),
(131, 135, 4, 786.4879),
(132, 136, 3, 302.4879),
(133, 137, 5, 181.4879),
(134, 140, 2, 967.9879),
(135, 130, 4, 181.4879),
(136, 131, 6, 96.7879),
(137, 132, 3, 241.9879),
(138, 133, 2, 846.9879),
(139, 134, 5, 1088.9879),
(140, 135, 4, 786.4879),
(141, 136, 3, 302.4879),
(142, 137, 5, 181.4879),
(143, 141, 2, 967.9879),
(144, 130, 4, 181.4879),
(145, 131, 6, 96.7879),
(146, 132, 3, 241.9879),
(147, 133, 2, 846.9879),
(148, 134, 5, 1088.9879),
(149, 135, 4, 786.4879),
(150, 136, 3, 302.4879),
(151, 137, 5, 181.4879),
(152, 142, 0, 967.9879),
(153, 130, 4, 181.4879),
(154, 131, 6, 96.7879),
(155, 132, 3, 241.9879),
(156, 133, 2, 846.9879),
(157, 134, 5, 1088.9879),
(158, 135, 4, 786.4879),
(159, 136, 3, 302.4879),
(160, 137, 5, 181.4879),
(161, 142, 0, 967.9879),
(162, 130, 4, 181.4879),
(163, 131, 6, 96.7879),
(164, 132, 3, 241.9879),
(165, 133, 2, 846.9879),
(166, 134, 5, 1088.9879),
(167, 135, 4, 786.4879),
(168, 136, 3, 302.4879),
(169, 137, 5, 181.4879),
(170, 143, 0, 967.9879),
(171, 130, 4, 181.4879),
(172, 131, 6, 96.7879),
(173, 132, 3, 241.9879),
(174, 133, 2, 846.9879),
(175, 134, 5, 1088.9879),
(176, 135, 4, 786.4879),
(177, 136, 3, 302.4879),
(178, 137, 5, 181.4879),
(179, 144, 0, 967.9879),
(180, 130, 4, 181.4879),
(181, 131, 6, 96.7879),
(182, 132, 3, 241.9879),
(183, 133, 2, 846.9879),
(184, 134, 5, 1088.9879),
(185, 135, 4, 786.4879),
(186, 136, 3, 302.4879),
(187, 137, 5, 181.4879),
(188, 145, 0, 967.9879),
(189, 130, 4, 181.4879),
(190, 131, 6, 96.7879),
(191, 132, 3, 241.9879),
(192, 133, 2, 846.9879),
(193, 134, 5, 1088.9879),
(194, 135, 4, 786.4879),
(195, 136, 3, 302.4879),
(196, 137, 5, 181.4879),
(197, 146, 0, 967.9879),
(198, 130, 4, 181.4879),
(199, 131, 6, 96.7879),
(200, 132, 3, 241.9879),
(201, 133, 2, 846.9879),
(202, 134, 5, 1088.9879),
(203, 135, 4, 786.4879),
(204, 136, 3, 302.4879),
(205, 137, 5, 181.4879),
(206, 146, 0, 967.9879),
(207, 130, 4, 181.4879),
(208, 131, 6, 96.7879),
(209, 132, 3, 241.9879),
(210, 133, 2, 846.9879),
(211, 134, 5, 1088.9879),
(212, 135, 4, 786.4879),
(213, 136, 3, 302.4879),
(214, 137, 5, 181.4879),
(215, 146, 0, 967.9879),
(216, 130, 4, 181.4879),
(217, 131, 6, 96.7879),
(218, 132, 3, 241.9879),
(219, 133, 2, 846.9879),
(220, 134, 5, 1088.9879),
(221, 135, 4, 786.4879),
(222, 136, 3, 302.4879),
(223, 137, 5, 181.4879),
(224, 147, 0, 967.9879),
(225, 130, 4, 181.4879),
(226, 131, 6, 96.7879),
(227, 132, 3, 241.9879),
(228, 133, 2, 846.9879),
(229, 134, 5, 1088.9879),
(230, 135, 4, 786.4879),
(231, 136, 3, 302.4879),
(232, 137, 5, 181.4879),
(233, 148, 0, 967.9879),
(234, 130, 4, 181.4879),
(235, 131, 6, 96.7879),
(236, 132, 3, 241.9879),
(237, 133, 2, 846.9879),
(238, 134, 5, 1088.9879),
(239, 135, 4, 786.4879),
(240, 136, 3, 302.4879),
(241, 137, 5, 181.4879),
(242, 149, 0, 967.9879),
(243, 130, 4, 181.4879),
(244, 131, 6, 96.7879),
(245, 132, 3, 241.9879),
(246, 133, 2, 846.9879),
(247, 134, 5, 1088.9879),
(248, 135, 4, 786.4879),
(249, 136, 3, 302.4879),
(250, 137, 5, 181.4879),
(251, 150, 0, 967.9879),
(252, 130, 4, 181.4879),
(253, 131, 6, 96.7879),
(254, 132, 3, 241.9879),
(255, 133, 2, 846.9879),
(256, 134, 5, 1088.9879),
(257, 135, 4, 786.4879),
(258, 136, 3, 302.4879),
(259, 137, 5, 181.4879),
(260, 151, 0, 967.9879),
(261, 130, 4, 181.4879),
(262, 131, 6, 96.7879),
(263, 132, 3, 241.9879),
(264, 133, 2, 846.9879),
(265, 134, 5, 1088.9879),
(266, 135, 4, 786.4879),
(267, 136, 3, 302.4879),
(268, 137, 5, 181.4879),
(269, 152, 0, 967.9879),
(270, 130, 4, 181.4879),
(271, 131, 6, 96.7879),
(272, 132, 3, 241.9879),
(273, 133, 2, 846.9879),
(274, 134, 5, 1088.9879),
(275, 135, 4, 786.4879),
(276, 136, 3, 302.4879),
(277, 137, 5, 181.4879),
(278, 153, 0, 967.9879),
(279, 154, 4, 181.4879),
(280, 155, 6, 96.7879),
(281, 156, 3, 241.9879),
(282, 157, 2, 846.9879),
(283, 158, 5, 1088.9879),
(284, 159, 4, 786.4879),
(285, 160, 3, 302.4879),
(286, 161, 5, 181.4879),
(287, 162, 0, 967.9879),
(288, 163, 12, 182.95),
(289, 164, 12, 182.95);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_envio`
--

INSERT INTO `datos_envio` (`idDireccionEnvio`, `idUsuario`, `nombre`, `direccion`, `ciudad`, `provincia`, `codigoPostal`, `pais`) VALUES
(1, 54, 'Casa Blanes', 'Carrer Josep Carner, 5, 3/2', 'Blanes de Mar', 'Girona', 17300, 'España'),
(2, 54, 'Casa Blanes 2', 'Carrer MontFerran', 'Blanes de Mar', 'Girona', 17300, 'Francia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_facturacion`
--

DROP TABLE IF EXISTS `datos_facturacion`;
CREATE TABLE IF NOT EXISTS `datos_facturacion` (
  `idDireccionFacturacion` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `direccion` text NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `codigoPostal` int(5) NOT NULL,
  `pais` varchar(30) NOT NULL,
  PRIMARY KEY (`idDireccionFacturacion`),
  KEY `usuario_facturacion` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_facturacion`
--

INSERT INTO `datos_facturacion` (`idDireccionFacturacion`, `idUsuario`, `nombre`, `direccion`, `ciudad`, `provincia`, `codigoPostal`, `pais`) VALUES
(1, 54, 'Casa Blanes', 'Carrer Josep Carner, 5 3/2', 'Paris', 'Girona', 17300, 'España'),
(2, 54, 'casa malgrat', 'Carrer Mossen Feliz paradeda ', 'Malgrat de MAr', 'Barcelona', 13800, 'España'),
(3, 54, 'Casa blanes 2', 'Carrer Mont-ferran 3 - 3/1', 'Blanes de Mar', 'Girona', 17300, 'España');

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
  `total` double NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `fk_usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `codigo_barras`, `nombre`, `descripcion`, `precio`, `IVA`, `descuento`, `activo`, `idCategoria`, `idSubcategoria`, `imagen`) VALUES
(16, '1234567890987', 'Sony PlayStation 5 Slim Digital Edition', 'La consola PS5® Digital Edition abre nuevas posibilidades de juego nunca antes imaginadas en formato Slim. Disfruta de una carga de juegos casi instantánea con un disco SSD ultrarrápido, una interacción más profunda con soporte para retroalimentación háptica, disparadores adaptativos y audio 3D, y una nueva generación de increíbles juegos de PlayStation®.', 371.08, 21, 5, 1, 2, 7, 'https://assets.mmsrg.com/isr/166325/c1/-/ASSET_MMS_134330132?x=536&y=402&format=jpg&quality=80&sp=yes&strip=yes&trim&ex=536&ey=402&align=center&resizesource&unsharp=1.5x1+0.7+0.02&cox=0&coy=0&cdx=536&cdy=402'),
(26, '5632341686587', 'Amazon Echo Dot', 'NUESTRO ECHO DOT CON MEJOR CALIDAD DE SONIDO HASTA LA FECHA: disfruta de un audio mejorado respecto al anterior Echo Dot con Alexa, con un sonido potente en cualquier habitación, con voces más nítidas y graves más intensos.\r\n', 53.69, 21, 0, 1, 2, 7, 'https://assets.mmsrg.com/isr/166325/c1/-/ASSET_MMS_98657830?x=536&y=402&format=jpg&quality=80&sp=yes&strip=yes&trim&ex=536&ey=402&align=center&resizesource&unsharp=1.5x1+0.7+0.02&cox=0&coy=0&cdx=536&cdy=402'),
(27, '8976543233433', 'BRIMNES', 'Los espacios reducidos requieren soluciones de almacenaje inteligentes. Este armario cuenta con una barra para colgar vestidos y camisas, y estantes para colocar prendas dobladas, zapatos y bolsos, además de una puerta con espejo.\r\n\r\n', 131.41, 21, 0, 1, 1, 4, 'https://static.islas.ikea.es/assets/images/586/0858640_PE655296_S4.webp'),
(154, '1234567890123', 'Aspiradora Hoover', '\"Aspiradora de escoba recargable Hoover HF500 con cepillo antienredos y almacenamiento compacto\"', 149.99, 21, 0, 1, 2, 8, 'https://www.crisabora.com/img/productos/162552_HOOV_ASPIRADORA-HOOVER-AT75011-AT70-39001419_1.jpg\r'),
(155, '2345678901234', 'Licuadora Oster', '\"Licuadora de alto rendimiento Oster BLSTMB-CBG con motor de 1200W y jarra de vidrio resistente al calor\"', 79.99, 21, 0, 1, 2, 9, 'https://saracomercial.com/storage/sku/oster-licuadoras-licuadora-clasica-oster-croma-1-1-1703164644.jpg\r'),
(156, '3456789012345', 'Cafetera Nespresso', '\"Cafetera automática Nespresso Essenza Mini con sistema de cápsulas y función de ahorro de energía\"', 199.99, 21, 2, 1, 2, 9, 'https://m.media-amazon.com/images/I/612JC+iG44L._AC_UF894,1000_QL80_DpWeblab_.jpg'),
(157, '4567890123456', 'Smart TV Samsung 55\"', '\"Smart TV LED Samsung 55\' 4K UHD con tecnología HDR y sistema operativo Tizen\"', 699.99, 21, 0, 1, 2, 7, 'https://images.samsung.com/is/image/samsung/p6pim/es/qe55q60bauxxc/gallery/es-qled-q60b-414877-qe55q60bauxxc-534376765?$650_519_PNG$\r'),
(158, '5678901234567', 'Teléfono móvil iPhone 12', '\"Teléfono móvil iPhone 12 con pantalla Super Retina XDR de 6.1 pulgadas y chip A14 Bionic\"', 899.99, 21, 5, 1, 2, 7, 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/refurb-iphone-12-black-2020?wid=2000&hei=1897&fmt=jpeg&qlt=95&.v=1635202741000\r'),
(159, '6789012345678', 'Portátil HP Pavilion', '\"Portátil HP Pavilion con pantalla de 15.6 pulgadas, procesador Intel Core i5 y 8GB de RAM\"', 649.99, 21, 0, 1, 2, 7, 'https://www.hp.com/es-es/shop/Html/Merch/Images/7P6T7EA-ABE_1750x1285.jpg\r'),
(160, '7890123456789', 'Escritorio de madera', '\"Escritorio de madera maciza con cajones y compartimentos para almacenamiento\"', 249.99, 21, 0, 1, 1, 4, 'https://media.blenom.com/product/escritorio-oniro-regulable-800x800.jpg\r'),
(161, '8901234567890', 'Silla ergonómica', '\"Silla ergonómica ajustable con soporte lumbar y reposabrazos acolchados\"', 149.99, 21, 0, 1, 1, 4, 'https://www.ofisillas.es/images/product/1/large/pl_1_1_6066.jpg\r'),
(162, '9012345678901', 'Juego de sofás', '\"Juego de sofás de tela con estructura de madera y cojines extraíbles\"', 799.99, 21, 0, 1, 1, 4, 'https://m.media-amazon.com/images/I/61nLx0XQBgS._AC_UF894,1000_QL80_.jpg'),
(164, '1234567890967', 'ADAZ Rosa Eterna', 'Las hojas y los pétalos están hechos de plástico de alta calidad, y el tallo de la flor está hecho de polietileno y chapado con lámina de oro. Las hojas son la textura clara y la flor vívida, la flor vívida, duradera, no es fácil de romper, se pueden conservar para siempre y nunca se desvanecen.', 14, 21, 0, 1, 1, 3, 'https://m.media-amazon.com/images/I/71arK8KLfeL._AC_SX569_.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `stocks`
--

INSERT INTO `stocks` (`idStock`, `idProducto`, `cantidadDisponible`) VALUES
(3, 16, 78),
(6, 26, 4),
(7, 27, 7),
(95, 154, 4),
(96, 155, 6),
(97, 156, 3),
(98, 157, 2),
(99, 158, 5),
(100, 159, 4),
(101, 160, 3),
(102, 161, 5),
(103, 162, 0),
(105, 164, 12);

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
  `password` text NOT NULL,
  `administrador` tinyint(1) NOT NULL,
  `bloqueado` int(2) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `telefono` text NOT NULL,
  `foto` text NOT NULL,
  `provider` text DEFAULT NULL,
  `provider_id` text DEFAULT NULL,
  `account_activation_token` text DEFAULT NULL,
  `reset_token` text DEFAULT NULL,
  `reset_token_expires` date DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `email`, `password`, `administrador`, `bloqueado`, `fechaRegistro`, `telefono`, `foto`, `provider`, `provider_id`, `account_activation_token`, `reset_token`, `reset_token_expires`, `created_at`, `updated_at`) VALUES
(54, 'Ayman Sbay Zekkari', 'a.sbay@sapalomera.cat', '', 1, 0, '2024-04-19', '', 'https://lh3.googleusercontent.com/a/ACg8ocL6PpqHU5VM_wOfp9cl8ORuw10-1Jp9UwV4IkG9eY3aF1MkxA=s96-c', 'google', 'ya29.a0Ad52N39ywFq_FFtP-vNPDMtRVGyCFFqdZj6haN77ucZUZ6X8qrs07njjXTlhLxYMyT594cQX_QzdKYsfr9UMQqWmEGwMwWSxxEX4g-S_LzyTIKfS8CCrzVJvb46lPJZpObqf8QKOqIE43pWmEz696C4b_ZmpnGoiIQaCgYKAa8SARMSFQHGX2MiOFGhfIzI3oUozIJ2Nrz7bQ0169', NULL, NULL, NULL, NULL, NULL),
(67, 'Ayman Zekkari', 'ayman.zekkari2@gmail.com', '$2y$10$/ctsQFp90V2fwrd.5JYV5uUqhXVxuv2TNh8/2tGvDZWDzvgDvGQje', 0, 0, '2024-05-20', '691717544', 'iVBORw0KGgoAAAANSUhEUgAAAfQAAABsCAMAAACrSrAiAAABG3pUWHRSYXcgcHJvZmlsZSB0eXBlIGV4aWYAAHjanVLJcQQhDPwThUMQanGFwxxb5QwcvhvQeHf2txaFJBpodBDOn+9H+BqCJMFSqbnlLBRr1rTTqbJkmzqKTT3lYe7FOx7y7peUEGixlk0dP4nThznuj8Tr/EV0ObHTS8+N3R+I2x0/nFDrO5FHgLhelsMvOBF04dEJzr5sbrXcUnuccpf6nKUWRc+GbmbRsh5Fs+YjGW22hA7TPfdhAyIaDKAunBGCNIdyDL8AuheScW1EMFFlBrJ59CP1MJvzAszuFfbvSMwIqucgp8Yq96QflH0Sdu4ye8TAA33GwfBQZveE/0GFPjYv+H61vMtrgf+seETv8kltrtKE/9Qm/AKXBpVXt2NsUAAAAYRpQ0NQSUNDIHByb2ZpbGUAAHicfZE9SMNAHMVfW0v9aHGwg4hDhupkFy3iWKpYBAulrdCqg8mlX9CkIUlxcRRcCw5+LFYdXJx1dXAVBMEPEGcHJ0UXKfF/SaFFjAfH/Xh373H3DvC2akwx+uKAopp6JpkQ8oVVIfAKP0IYwgBiIjO0VHYxB9fxdQ8PX++iPMv93J8jJBcNBngE4jjTdJN4g3h209Q47xOHWUWUic+Jp3S6IPEj1yWH3ziXbfbyzLCey8wTh4mFcg9LPcwqukIcI47Iikr53rzDMuctzkqtwTr35C8MFtWVLNdpjiOJJaSQhgAJDVRRg4korSopBjK0n3Dxj9n+NLkkclXByLGAOhSIth/8D353a5Rmpp2kYALwv1jWxwQQ2AXaTcv6Pras9gngewau1K6/3gLmPklvdrXIETC8DVxcdzVpD7jcAUafNFEXbclH01sqAe9n9E0FYOQWGFxzeuvs4/QByFFXyzfAwSEwWabsdZd39/f29u+ZTn8/nmJyuBXhs1oAAA5VaVRYdFhNTDpjb20uYWRvYmUueG1wAAAAAAA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/Pgo8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJYTVAgQ29yZSA0LjQuMC1FeGl2MiI+CiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiCiAgICB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiCiAgICB4bWxuczpHSU1QPSJodHRwOi8vd3d3LmdpbXAub3JnL3htcC8iCiAgICB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgeG1wTU06RG9jdW1lbnRJRD0iZ2ltcDpkb2NpZDpnaW1wOjliYTc0MGZlLTVlNWYtNDQ4YS05ZGM2LWY4ODJjNmM1MzM2OSIKICAgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDoxOTlhM2RkZi0wODM3LTQ3ZjYtOTg2ZS1iMWI3ZmYyNTlmNDEiCiAgIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDowMDE3Y2VmOS03MTViLTQzZTctYjU5Yi0yZDE0MzcxOWIwYjAiCiAgIEdJTVA6QVBJPSIyLjAiCiAgIEdJTVA6UGxhdGZvcm09IldpbmRvd3MiCiAgIEdJTVA6VGltZVN0YW1wPSIxNzE1NTk4NjUwMjQ4NTM3IgogICBHSU1QOlZlcnNpb249IjIuMTAuMzQiCiAgIGRjOkZvcm1hdD0iaW1hZ2UvcG5nIgogICB0aWZmOk9yaWVudGF0aW9uPSIxIgogICB4bXA6Q3JlYXRvclRvb2w9IkdJTVAgMi4xMCIKICAgeG1wOk1ldGFkYXRhRGF0ZT0iMjAyNDowNToxM1QxMzoxMDo0NyswMjowMCIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjQ6MDU6MTNUMTM6MTA6NDcrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJzYXZlZCIKICAgICAgc3RFdnQ6Y2hhbmdlZD0iLyIKICAgICAgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDplNmZiYjA3My0yZTJhLTQ3MGMtOGQ0Yi0xNWJjOTBmYTVlNDkiCiAgICAgIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkdpbXAgMi4xMCAoV2luZG93cykiCiAgICAgIHN0RXZ0OndoZW49IjIwMjQtMDUtMTNUMTM6MDg6NTkiLz4KICAgICA8cmRmOmxpCiAgICAgIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiCiAgICAgIHN0RXZ0OmNoYW5nZWQ9Ii8iCiAgICAgIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6OTg3YzQ1YjAtMDE3OS00NTIzLThiZDctNWFiNDA1YjhmYjE5IgogICAgICBzdEV2dDpzb2Z0d2FyZUFnZW50PSJHaW1wIDIuMTAgKFdpbmRvd3MpIgogICAgICBzdEV2dDp3aGVuPSIyMDI0LTA1LTEzVDEzOjEwOjUwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAKPD94cGFja2V0IGVuZD0idyI/PsFWPdsAAAJYUExURQAAAAAAAAAAAP8AAO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJO0cJP8AT/8AAP8A/P9/f/+AgKoAAP8ASO0cJP///yBS59MAAAABdFJOUwBA5thmAAAAAWJLR0QAiAUdSAAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAAd0SU1FB+gFDQsKMjIkMgkAAAA7dEVYdENvbW1lbnQAeHI6ZDpEQUYtcmJtVHJmRTo0LGo6NDE5NDM5NzkxMDU1NTIyMDU3Myx0OjI0MDMwNTIxlvtARAAAAYdJREFUeNrt20sKAkEQRMFG738nP9Dn8gJuVMSxXuResCocUDt7LRERERERmZX9pzFtEP2NTYRGnbuJ13aRGXT6LrY5g+i7MSX0N/axoc/axzZjEH0z96gHP9YedegJ9F2ejzpz6NCTe2EOHXpgM8yDv2qY99SZB/+XY947iGIeVGce7FMgD/bIkPcao8gD7HMnAT8c3WWbn6K7/gRdoAt0OQS6r1QF9A0dOnTo0KFDhw4degt9ztGUQzbo0EeaQ4euNwMdOnTo0H17hw4dOnTo0KFDh/5/5oN2BR069JnqM+eADp36SHRFih669gx06gF0Tbkeun5kD10tNoeuDN1D14HPobv6UEN35+XZIr6D/vNBXWb79KP36SsEukAX6AJdoAt0gS7QBbpAhw79ILt2yjbs4AU6dOgBdCUK6NAL6tChQ4cOHTp06ND9TocOHTp06NRr6I7ZoFMPoDtRh049gK4900NXmeqhK8r10PUje+hqsTl0dWsRkQPmvNbpcl3rdj/IG3oASmL2eH+y7JgAAAAASUVORK5CYII=', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
