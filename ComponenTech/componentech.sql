-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2021 a las 20:54:40
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `componentech`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idCargo` int(10) UNSIGNED NOT NULL,
  `cargo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idCargo`, `cargo`) VALUES
(1, 'Administrador'),
(2, 'Operario'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(10) UNSIGNED NOT NULL,
  `categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `categoria`) VALUES
(1, 'Computadores'),
(2, 'Procesadores'),
(3, 'Motherboards'),
(4, 'Memorias RAM'),
(5, 'Tarjetas de video'),
(6, 'Discos duros'),
(7, 'Gabinetes'),
(8, 'Fuentes'),
(9, 'Monitores'),
(10, 'Refrigeraciones'),
(11, 'Perifericos'),
(12, 'Sillas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clave`
--

CREATE TABLE `clave` (
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clave`
--

INSERT INTO `clave` (`correo`, `clave`) VALUES
('aboxhall8@lycos.com', 'alexboxhall'),
('akldasdas@aslfkasd.casd', '1234'),
('ameindl3@friendfeed.com', 'Aura92'),
('bkiddye5@usnews.com', 'Bronnie81'),
('bsandryi@histats.com', 'Blane52'),
('cyurmanovev7@geocities.com', 'Corene233'),
('diego@gmail.com', '1234'),
('erudolfg@dyndns.org', 'Erna223'),
('gnevinc@jugem.jp', 'Gradeigh72'),
('hfaunchd@miibeian.gov.cn', 'Hercule54'),
('hsidsaffa@globo.com', 'Halimeda73'),
('juan@gmail.com', '321'),
('kacendales@misena.edu.co', '1234'),
('lyakobowitchh@weebly.com', 'Libbey9'),
('malopez030@misena.edu.co', '1234'),
('marlonjaramillo23441@gmail.com', '123'),
('mpointingf@flavors.me', 'Morlee87'),
('pgentile1@exblog.jp', 'Pebrookx22'),
('pivanshintsev0@ustream.tv', 'Perrine1'),
('prueba4@gmail.com', '1234'),
('rodriguez@gmail.com', '1028'),
('rskille@admin.ch', 'Rae32'),
('sscrymgeour2@fc2.com', 'Sibylle55'),
('swelberry9@whitehouse.gov', 'Sholom34'),
('tslimanj@joomla.org', 'Tuck22'),
('tsprules4@weebly.com', 'Tiena32'),
('vmacavaddy6@comcast.net', 'Vasili2'),
('wtutingb@army.mil', 'Wyatt12'),
('yapalacios660@misena.edu.co', '1234'),
('yeren2@gmail.com', '1234'),
('yeren@gmail.com', '123'),
('yeren@gmail.com5', '1234'),
('yerenagmt2@gmail.com', '123'),
('yerenagmt@gmail.com', '1234'),
('yerend@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `idDetalles` int(10) UNSIGNED NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL,
  `totalCantidad` int(10) UNSIGNED NOT NULL,
  `FACTURA_idFactura` int(10) UNSIGNED NOT NULL,
  `PRODUCTO_idProducto` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`idDetalles`, `cantidad`, `totalCantidad`, `FACTURA_idFactura`, `PRODUCTO_idProducto`) VALUES
(1, 2, 5290000, 2152, 1000),
(2, 3, 2193000, 2355, 1003),
(3, 1, 2507000, 3312, 1004),
(4, 4, 11476000, 4213, 1002),
(5, 4, 1836000, 4233, 1005),
(6, 2, 1078000, 4412, 1006),
(7, 6, 3234000, 5125, 1006),
(8, 3, 8607000, 5231, 1004),
(29, 1, 2645000, 5260, 1000),
(30, 2, 1742000, 5260, 1017),
(35, 2, 5290000, 5265, 1000),
(36, 3, 11037000, 5266, 1001),
(37, 2, 246246, 5266, 1055),
(38, 3, 1377000, 5267, 1005),
(39, 2, 5290000, 5268, 1000),
(40, 5, 13225000, 5269, 1000),
(41, 3, 8607000, 5270, 1002),
(42, 3, 2193000, 5270, 1003),
(43, 1, 2869000, 5271, 1002),
(44, 1, 3679000, 5272, 1001),
(45, 1, 502000, 5273, 1016),
(46, 1, 539000, 5273, 1006),
(47, 2, 430000, 5273, 1008),
(48, 1, 2869000, 5274, 1002),
(49, 2, 1462000, 5274, 1003),
(50, 1, 539000, 5274, 1006),
(51, 3, 960000, 5274, 1010),
(52, 5, 2695000, 5275, 1006),
(53, 3, 1617000, 5276, 1006),
(54, 2, 5014000, 5277, 1004),
(55, 2, 1078000, 5277, 1006),
(56, 2, 5014000, 5278, 1004),
(57, 2, 1078000, 5278, 1006),
(58, 2, 5014000, 5279, 1004),
(59, 2, 1078000, 5279, 1006),
(60, 2, 520000, 5280, 1009),
(61, 2, 640000, 5280, 1010),
(62, 1, 123123, 5282, 1055),
(63, 1, 178000, 5283, 1030),
(64, 1, 1422000, 5283, 1031),
(65, 1, 1422000, 5284, 1031),
(66, 1, 123123, 5285, 1055),
(67, 1, 1422000, 5286, 1031),
(68, 1, 1422000, 5287, 1031),
(69, 1, 1422000, 5288, 1031),
(70, 1, 178000, 5289, 1030),
(71, 1, 1422000, 5289, 1031),
(72, 1, 1422000, 5290, 1031),
(75, 1, 1422000, 5292, 1031),
(76, 1, 1422000, 5293, 1031),
(77, 1, 1422000, 5294, 1031),
(78, 1, 178000, 5295, 1030),
(79, 1, 1422000, 5295, 1031),
(80, 1, 320000, 5297, 1010),
(81, 1, 859000, 5297, 1015),
(82, 1, 275000, 5298, 1014),
(83, 1, 275000, 5299, 1014),
(86, 1, 72000, 5301, 1028),
(87, 1, 275000, 5302, 1014),
(88, 1, 2507000, 5303, 1004),
(89, 1, 840000, 5304, 1013),
(90, 1, 275000, 5305, 1014),
(91, 1, 275000, 5306, 1014),
(92, 1, 940000, 5307, 1019),
(93, 1, 178000, 5308, 1030),
(94, 1, 840000, 5309, 1013),
(95, 1, 629000, 5310, 1026),
(96, 1, 178000, 5313, 1030),
(97, 1, 178000, 5314, 1030),
(98, 1, 871000, 5315, 1017),
(99, 1, 871000, 5316, 1017),
(100, 1, 871000, 5317, 1017),
(101, 1, 871000, 5318, 1017),
(102, 1, 1422000, 5319, 1031),
(103, 1, 629000, 5320, 1026),
(104, 1, 940000, 5321, 1019),
(105, 1, 840000, 5321, 1013),
(106, 1, 260000, 5322, 1009),
(107, 1, 320000, 5324, 1010),
(117, 1, 940000, 5335, 1019),
(118, 1, 260000, 5335, 1009),
(119, 1, 320000, 5335, 1010),
(120, 3, 960000, 5336, 1010),
(121, 1, 1256000, 5336, 1012),
(122, 3, 2820000, 5336, 1019),
(123, 1, 320000, 5338, 1010),
(124, 3, 2577000, 5338, 1015),
(125, 2, 1880000, 5338, 1019),
(126, 3, 2820000, 5339, 1019),
(127, 1, 871000, 5339, 1020),
(128, 2, 5014000, 5339, 1004),
(129, 1, 320000, 5339, 1010),
(130, 1, 2507000, 5341, 1004),
(131, 1, 871000, 5341, 1020),
(132, 1, 260000, 5341, 1009),
(133, 1, 123123, 5341, 1055),
(134, 1, 123123, 5343, 1055),
(135, 2, 278000, 5344, 1027),
(136, 2, 2844000, 5344, 1031),
(137, 2, 1439800, 5345, 1032),
(138, 1, 629000, 5345, 1026),
(139, 1, 1599000, 5345, 1029),
(140, 1, 513890, 5345, 1023);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(10) UNSIGNED NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `estado`) VALUES
(1, 'Producto en venta'),
(2, 'Producto agotado'),
(3, 'Producto descontinuado'),
(4, 'Proveedor activo'),
(5, 'Proveedor inactivo'),
(6, 'Factura en proceso'),
(7, 'Factura cancelada'),
(8, 'Factura pagada'),
(9, 'Usuario activo'),
(10, 'Usuario desactivado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `subtotal` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `TIPOPAGO_idTipoPago` int(10) UNSIGNED NOT NULL,
  `USUARIO_documento` int(10) UNSIGNED NOT NULL,
  `ESTADO_idEstado` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFactura`, `fecha`, `subtotal`, `total`, `TIPOPAGO_idTipoPago`, `USUARIO_documento`, `ESTADO_idEstado`) VALUES
(2152, '2020-01-23', 2193000, 2609670, 2, 2773619313, 8),
(2355, '2020-04-11', 5290000, 1005100, 2, 2773619313, 8),
(3312, '2020-02-13', 2507000, 2983330, 3, 339218373, 8),
(4213, '2020-04-03', 11476000, 13656440, 4, 427389387, 8),
(4233, '2020-06-26', 3234000, 3848460, 4, 1090856204, 8),
(4412, '2020-09-15', 8607000, 10242330, 2, 1292020212, 8),
(5125, '2020-06-05', 1078000, 1282820, 1, 1014925189, 8),
(5231, '2020-05-29', 1836000, 2184840, 1, 607881456, 8),
(5260, '2021-02-27', 0, 4387000, 3, 1022322055, 8),
(5265, '2021-02-27', 0, 5290000, 3, 2773619313, 8),
(5266, '2021-03-04', 0, 11283246, 2, 4263724624, 8),
(5267, '2021-03-04', 0, 1377000, 3, 4263724624, 8),
(5268, '2021-03-04', 0, 5290000, 2, 4263724624, 8),
(5269, '2021-03-04', 0, 13225000, 3, 4263724624, 8),
(5270, '2021-03-04', 0, 10800000, 1, 1022322061, 8),
(5271, '2021-03-04', 0, 2869000, 3, 1022322061, 8),
(5272, '2021-03-04', 0, 3679000, 4, 1022322061, 8),
(5273, '2021-03-05', 0, 1471000, 3, 1022322055, 8),
(5274, '2021-03-10', 0, 5830000, 2, 1000257626, 8),
(5275, '2021-03-10', 0, 2695000, 1, 1000257626, 8),
(5276, '2021-03-10', 0, 1617000, 3, 1000257626, 8),
(5277, '2021-04-05', 0, 6092000, 4, 1022322061, 8),
(5278, '2021-04-05', 0, 6092000, 4, 1022322061, 8),
(5279, '2021-04-05', 0, 6092000, 4, 1022322061, 8),
(5280, '2021-04-05', 0, 1160000, 4, 1022322061, 8),
(5281, '2021-09-01', 0, 123123, 1, 1022322061, 8),
(5282, '2021-09-01', 0, 123123, 1, 1022322061, 8),
(5283, '2021-09-01', 0, 1600000, 3, 1000456409, 8),
(5284, '2021-09-01', 0, 1422000, 1, 1022322061, 8),
(5285, '2021-09-01', 0, 123123, 2, 1022322061, 8),
(5286, '2021-09-01', 0, 1422000, 3, 1022322061, 8),
(5287, '2021-09-01', 0, 1422000, 4, 1022322061, 8),
(5288, '2021-09-01', 0, 1422000, 3, 1022322061, 8),
(5289, '2021-09-01', 0, 1600000, 3, 1000456409, 8),
(5290, '2021-09-01', 0, 1422000, 3, 1022322061, 8),
(5292, '2021-09-01', 0, 1422000, 3, 1022322061, 8),
(5293, '2021-09-01', 0, 1422000, 3, 1022322061, 8),
(5294, '2021-09-01', 0, 1422000, 3, 1022322061, 8),
(5295, '2021-09-01', 0, 1600000, 2, 1000456409, 8),
(5296, '2021-09-01', 0, 0, 4, 1000257902, 8),
(5297, '2021-09-01', 0, 1179000, 3, 1000456409, 8),
(5298, '2021-09-01', 0, 275000, 4, 1022322061, 8),
(5299, '2021-09-01', 0, 275000, 4, 1022322061, 8),
(5301, '2021-09-01', 0, 72000, 4, 1000456409, 8),
(5302, '2021-09-01', 0, 275000, 4, 1022322061, 8),
(5303, '2021-09-01', 0, 2507000, 4, 1000456409, 8),
(5304, '2021-09-01', 0, 840000, 4, 1000456409, 8),
(5305, '2021-09-01', 0, 275000, 4, 1022322061, 8),
(5306, '2021-09-01', 0, 275000, 4, 1022322061, 8),
(5307, '2021-09-01', 0, 940000, 4, 1022322061, 8),
(5308, '2021-09-01', 0, 178000, 3, 1022322061, 8),
(5309, '2021-09-01', 0, 840000, 3, 1000456409, 8),
(5310, '2021-09-01', 0, 629000, 3, 1022322061, 8),
(5311, '2021-09-01', 0, 178000, 2, 1022322061, 8),
(5312, '2021-09-01', 0, 1256000, 4, 1000456409, 8),
(5313, '2021-09-01', 0, 178000, 1, 1022322061, 8),
(5314, '2021-09-01', 0, 178000, 1, 1022322061, 8),
(5315, '2021-09-01', 0, 871000, 3, 1022322061, 8),
(5316, '2021-09-01', 0, 871000, 3, 1022322061, 8),
(5317, '2021-09-01', 0, 871000, 3, 1022322061, 8),
(5318, '2021-09-01', 0, 871000, 3, 1022322061, 8),
(5319, '2021-09-01', 0, 1422000, 4, 1022322061, 8),
(5320, '2021-09-01', 0, 629000, 1, 1022322061, 8),
(5321, '2021-09-01', 0, 1780000, 4, 1022322061, 8),
(5322, '2021-09-01', 0, 260000, 3, 1000456409, 8),
(5324, '2021-09-01', 0, 320000, 3, 1000456409, 8),
(5326, '2021-09-01', 0, 0, 4, 1022322061, 8),
(5335, '2021-09-01', 0, 1520000, 4, 1022322061, 8),
(5336, '2021-09-01', 0, 5036000, 4, 1000456409, 8),
(5337, '2021-09-01', 0, 0, 4, 1022322061, 8),
(5338, '2021-09-01', 0, 4777000, 4, 1000456409, 8),
(5339, '2021-09-01', 0, 9025000, 4, 1000456409, 8),
(5340, '2021-09-01', 0, 0, 4, 1000456409, 8),
(5341, '2021-09-01', 0, 3761123, 4, 1000456409, 8),
(5343, '2021-09-03', 0, 123123, 1, 1022322061, 8),
(5344, '2021-09-10', 0, 3122000, 4, 1022322061, 8),
(5345, '2021-09-17', 0, 4181690, 4, 2773619313, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idInventario` int(10) UNSIGNED NOT NULL,
  `entradas` int(10) UNSIGNED NOT NULL,
  `Salidas` int(10) UNSIGNED NOT NULL,
  `Saldo` int(10) UNSIGNED NOT NULL,
  `PRODUCTO_idProducto` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`idInventario`, `entradas`, `Salidas`, `Saldo`, `PRODUCTO_idProducto`) VALUES
(1, 20, 0, 20, 1000),
(2, 20, 0, 20, 1001),
(3, 20, 0, 20, 1002),
(4, 20, 0, 20, 1003),
(5, 20, 0, 20, 1004),
(6, 20, 0, 20, 1005),
(7, 20, 0, 20, 1006),
(8, 20, 0, 20, 1007),
(9, 20, 0, 20, 1008),
(10, 20, 0, 20, 1009),
(11, 20, 0, 20, 1010),
(12, 20, 0, 20, 1011),
(13, 20, 0, 20, 1012),
(14, 20, 0, 20, 1013),
(15, 20, 0, 20, 1014),
(16, 20, 0, 20, 1015),
(17, 20, 0, 20, 1016),
(18, 20, 0, 20, 1017),
(19, 20, 0, 20, 1018),
(20, 20, 0, 20, 1019),
(21, 20, 0, 20, 1020),
(22, 20, 0, 20, 1021),
(23, 20, 0, 20, 1022),
(24, 20, 1, 19, 1023),
(25, 20, 0, 20, 1024),
(26, 20, 0, 20, 1025),
(27, 20, 1, 19, 1026),
(28, 20, 2, 18, 1027),
(29, 20, 0, 20, 1028),
(30, 20, 1, 19, 1029),
(31, 20, 0, 20, 1030),
(32, 20, 2, 18, 1031),
(33, 20, 2, 18, 1032),
(34, 20, 0, 20, 1055);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `idMovimiento` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL,
  `TIPOMOVIMIENTO_idTipoMovimiento` int(10) UNSIGNED NOT NULL,
  `PRODUCTO_idProducto` int(10) UNSIGNED NOT NULL,
  `FACTURA_idFactura` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`idMovimiento`, `fecha`, `cantidad`, `TIPOMOVIMIENTO_idTipoMovimiento`, `PRODUCTO_idProducto`, `FACTURA_idFactura`) VALUES
(2, '2020-01-23', 2, 3, 1000, 2152),
(3, '2020-04-11', 3, 3, 1003, 2355),
(4, '2020-02-13', 1, 3, 1004, 3312),
(5, '2020-04-03', 4, 3, 1002, 4213),
(6, '2020-06-26', 4, 3, 1004, 4233),
(7, '2020-09-15', 2, 3, 1002, 4412),
(8, '2020-06-05', 6, 3, 1005, 5125),
(9, '2020-05-29', 3, 3, 1004, 5231),
(22, '2021-02-27', 1, 1, 1000, 5260),
(23, '2021-02-27', 2, 1, 1017, 5260),
(28, '2021-02-27', 2, 1, 1000, 5265),
(29, '2021-03-04', 3, 1, 1001, 5266),
(30, '2021-03-04', 2, 1, 1055, 5266),
(31, '2021-03-04', 3, 1, 1005, 5267),
(32, '2021-03-04', 2, 1, 1000, 5268),
(33, '2021-03-04', 5, 1, 1000, 5269),
(34, '2021-03-04', 3, 1, 1002, 5270),
(35, '2021-03-04', 3, 1, 1003, 5270),
(36, '2021-03-04', 1, 1, 1002, 5271),
(37, '2021-03-04', 1, 1, 1001, 5272),
(38, '2021-03-05', 1, 1, 1016, 5273),
(39, '2021-03-05', 1, 1, 1006, 5273),
(40, '2021-03-05', 2, 1, 1008, 5273),
(42, '2021-03-06', 1, 3, 1000, NULL),
(43, '2021-03-06', 6, 3, 1000, NULL),
(44, '2021-03-06', 2, 3, 1001, NULL),
(45, '2021-03-10', 1, 1, 1002, 5274),
(46, '2021-03-10', 2, 1, 1003, 5274),
(47, '2021-03-10', 1, 1, 1006, 5274),
(48, '2021-03-10', 3, 1, 1010, 5274),
(49, '2021-03-10', 4, 3, 1000, NULL),
(50, '2021-03-10', 5, 1, 1006, 5275),
(51, '2021-03-10', 3, 1, 1006, 5276),
(52, '2021-03-10', 8, 3, 1006, NULL),
(53, '2021-04-05', 2, 1, 1004, 5277),
(54, '2021-04-05', 2, 1, 1006, 5277),
(55, '2021-04-05', 2, 1, 1004, 5278),
(56, '2021-04-05', 2, 1, 1006, 5278),
(57, '2021-04-05', 2, 1, 1004, 5279),
(58, '2021-04-05', 2, 1, 1006, 5279),
(59, '2021-04-05', 2, 1, 1009, 5280),
(60, '2021-04-05', 2, 1, 1010, 5280),
(61, '2021-09-01', 1, 1, 1055, 5282),
(62, '2021-09-01', 1, 1, 1030, 5283),
(63, '2021-09-01', 1, 1, 1031, 5283),
(64, '2021-09-01', 1, 1, 1031, 5284),
(65, '2021-09-01', 1, 1, 1055, 5285),
(66, '2021-09-01', 1, 1, 1031, 5286),
(67, '2021-09-01', 1, 1, 1031, 5287),
(68, '2021-09-01', 1, 1, 1031, 5288),
(69, '2021-09-01', 1, 1, 1030, 5289),
(70, '2021-09-01', 1, 1, 1031, 5289),
(71, '2021-09-01', 1, 1, 1031, 5290),
(72, '2021-09-01', 1, 1, 1031, 5292),
(73, '2021-09-01', 1, 1, 1031, 5293),
(74, '2021-09-01', 1, 1, 1031, 5294),
(75, '2021-09-01', 1, 1, 1030, 5295),
(76, '2021-09-01', 1, 1, 1031, 5295),
(77, '2021-09-01', 1, 1, 1010, 5297),
(78, '2021-09-01', 1, 1, 1015, 5297),
(79, '2021-09-01', 1, 1, 1014, 5298),
(80, '2021-09-01', 1, 1, 1014, 5299),
(81, '2021-09-01', 1, 1, 1028, 5301),
(82, '2021-09-01', 1, 1, 1014, 5302),
(83, '2021-09-01', 1, 1, 1004, 5303),
(84, '2021-09-01', 1, 1, 1013, 5304),
(85, '2021-09-01', 1, 1, 1014, 5305),
(86, '2021-09-01', 1, 1, 1014, 5306),
(87, '2021-09-01', 1, 1, 1019, 5307),
(88, '2021-09-01', 1, 1, 1030, 5308),
(89, '2021-09-01', 1, 1, 1013, 5309),
(90, '2021-09-01', 1, 1, 1026, 5310),
(91, '2021-09-01', 1, 1, 1030, 5313),
(92, '2021-09-01', 1, 1, 1030, 5314),
(93, '2021-09-01', 1, 1, 1017, 5315),
(94, '2021-09-01', 1, 1, 1017, 5316),
(95, '2021-09-01', 1, 1, 1017, 5317),
(96, '2021-09-01', 1, 1, 1017, 5318),
(97, '2021-09-01', 1, 1, 1031, 5319),
(98, '2021-09-01', 1, 1, 1026, 5320),
(99, '2021-09-01', 1, 1, 1019, 5321),
(100, '2021-09-01', 1, 1, 1013, 5321),
(101, '2021-09-01', 1, 1, 1009, 5322),
(102, '2021-09-01', 1, 1, 1010, 5324),
(103, '2021-09-01', 1, 1, 1019, 5335),
(104, '2021-09-01', 1, 1, 1009, 5335),
(105, '2021-09-01', 1, 1, 1010, 5335),
(106, '2021-09-01', 3, 1, 1010, 5336),
(107, '2021-09-01', 1, 1, 1012, 5336),
(108, '2021-09-01', 3, 1, 1019, 5336),
(109, '2021-09-01', 1, 1, 1010, 5338),
(110, '2021-09-01', 3, 1, 1015, 5338),
(111, '2021-09-01', 2, 1, 1019, 5338),
(112, '2021-09-01', 3, 1, 1019, 5339),
(113, '2021-09-01', 1, 1, 1020, 5339),
(114, '2021-09-01', 2, 1, 1004, 5339),
(115, '2021-09-01', 1, 1, 1010, 5339),
(116, '2021-09-01', 1, 1, 1004, 5341),
(117, '2021-09-01', 1, 1, 1020, 5341),
(118, '2021-09-01', 1, 1, 1009, 5341),
(119, '2021-09-01', 1, 1, 1055, 5341),
(120, '2021-09-03', 1, 1, 1055, 5343),
(121, '2021-09-10', 2, 1, 1027, 5344),
(122, '2021-09-10', 2, 1, 1031, 5344),
(123, '2021-09-17', 2, 1, 1032, 5345),
(124, '2021-09-17', 1, 1, 1026, 5345),
(125, '2021-09-17', 1, 1, 1029, 5345),
(126, '2021-09-17', 1, 1, 1023, 5345);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPEDIDO` int(10) UNSIGNED NOT NULL,
  `pedFecha` date NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `USUARIO_documento` int(10) UNSIGNED NOT NULL,
  `PROVEEDOR_idProveedor` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPEDIDO`, `pedFecha`, `total`, `USUARIO_documento`, `PROVEEDOR_idProveedor`) VALUES
(1, '2020-05-15', 43908000, 1090856204, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoorden`
--

CREATE TABLE `pedidoorden` (
  `idPedidoOrden` int(10) UNSIGNED NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL,
  `totalCantidad` int(10) UNSIGNED NOT NULL,
  `PEDIDO_idPEDIDO` int(10) UNSIGNED NOT NULL,
  `PRODUCTO_idProducto` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidoorden`
--

INSERT INTO `pedidoorden` (`idPedidoOrden`, `cantidad`, `totalCantidad`, `PEDIDO_idPEDIDO`, `PRODUCTO_idProducto`) VALUES
(1, 28, 7358000, 1, 1001),
(2, 50, 36550000, 1, 1003);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(10) UNSIGNED NOT NULL,
  `productoNombre` varchar(45) NOT NULL,
  `detalles` varchar(500) NOT NULL,
  `precio` int(10) UNSIGNED NOT NULL,
  `iva` int(10) UNSIGNED NOT NULL,
  `CATEGORIA_idCategoria` int(10) UNSIGNED NOT NULL,
  `PROVEEDOR_idProveedor` int(10) UNSIGNED NOT NULL,
  `ESTADO_idEstado` int(10) UNSIGNED NOT NULL,
  `prodImg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `productoNombre`, `detalles`, `precio`, `iva`, `CATEGORIA_idCategoria`, `PROVEEDOR_idProveedor`, `ESTADO_idEstado`, `prodImg`) VALUES
(1000, 'Lenovo S340-14IIL', 'Pantalla de 14 pulgadas <br>\r\n\r\nModelo Slim  <br>\r\n\r\nWindows 10 Home <br>', 2645000, 19, 1, 9, 1, '../img/productos/9/1000.jpg'),
(1001, 'Portátil ASUS VivoBook X413EA-EB249T', 'Modelo Marca: ASUS <br> Serie: VivoBook Modelo: F515JA <br> Color: Gris <br> Número de parte:   F515JA-Ci38G256WP-01 <br> Tipo: Notebook Procesador  <br> Marca: Intel <br> Línea: Core i3 <br> Modelo: 1005G1 <br> Generación: 10ma Generación <br>  Velocidad: (hasta 3.40 GHz) <br>  Cache: 4 MB Memoria <br> Capacidad: 8GB Tipo: DDR4 Unidad', 3679000, 19, 1, 5, 1, '../img/productos/5/1001.jpg'),
(1002, 'Portátil HP 15-dw1085la', 'Procesador Intel® Core™ i3 de 10.ª generación <br>\r\nWindows 10 Home 64 <br>\r\n4 GB de RAM DDR4-2666 MHz (1 x 4 GB) <br>\r\nPantalla HD (1366 x 768) de 15,6\" (39,6 cm) en diagonal con microbordes, BrightView, 220 nits, 45 % de NTSC <br>', 1599000, 19, 1, 4, 1, '../img/productos/4/1002.jpg'),
(1003, 'Procesador Ryzen 5 3400g', 'Es ideal para jugadores y creadores de contenido que requieran un instrumento de gran ejecución. <br>\r\nMemoria caché de 4 MB, rápida y volátil. <br>\r\nProcesador gráfico Radeon RX Vega 11 Graphics. <br>\r\nSoporta memoria RAM DDR4. <br>\r\nSu potencia es de 65 W. <br>\r\nCuenta con 8 hilos que favorecen la ejecución de múltiples programas a la vez. <br>\r\nIncluye air cooler. air cooler. <br>\r\nProducto en empaque original. <br>\r\nProcesador innovador desarrollado bajo altos estándares de calidad <br>', 1290000, 19, 2, 5, 1, '../img/productos/5/1003.jpg'),
(1004, 'Procesador Amd Ryzen 9 3900xt', '# de núcleos de CPU: 16 <br>\r\n\r\n# de hilos: 32 <br>\r\n\r\nReloj base: 3,4 GH <br>', 2683000, 19, 2, 5, 1, '../img/productos/5/1004.jpg'),
(1005, 'Board Gigabyte B460m Ds3h Ud', 'Marca:	Gigabyte <br> \r\nLínea:	Ultra Durable <br> \r\nModelo:	B460M DS3H V2 <br> \r\nVersión: rev. 1.0 <br> ', 469900, 19, 3, 10, 1, '../img/productos/10/1005.jpg'),
(1006, 'Placa Base Para Juegos Msi Mag B460m Mortar (', 'Marca:	MSI <br>\r\nLínea:	MORTAR <br>\r\nModelo:	B460m mortar <br>', 1038900, 19, 3, 8, 1, '../img/productos/8/1006.jpg'),
(1007, 'Board Asrock B450 Gaming Itx Ac', 'Marca:	ASRock <br>\r\nLínea:	B450 <br>\r\nModelo:	Fatality <br>\r\nPlataforma: AMD <br>\r\nCapacidad máxima soportada de la memoria RAM: 32 GB <br>\r\nChipset: b450 <br>\r\nSocket: AM4 <br>\r\nCon procesador: No <br>\r\nCPU: AMD Ryzen <br>\r\nAplicaciones: Desktop <br>\r\nTipo de memoria RAM: DDR4 <br>\r\nEs gamer: Sí <br>', 565000, 19, 3, 6, 1, '../img/productos/6/1007.jpg'),
(1008, 'Memoria Ram Corsair Vengeance Lpx 8gb (1x8gb)', 'Optimiza el rendimiento de tu máquina con la tecnología DDR4 DRAM. <br>\r\nMemoria con formato UDIMM. <br>\r\nAlcanza una velocidad de 3000 MHz. <br>\r\nApta para Computadoras de escritorio. <br>\r\nLínea Vengeance LPX. <br>\r\nCuenta con una tasa de transferencia de 24000 MB/s. <br>\r\nCompatible con Intel. <br>', 230000, 19, 4, 9, 1, '../img/productos/9/1008.jpg'),
(1009, 'Memoria Ram Adata Xpg Spectrix D60g Ddr4 8gb ', 'Capacidad total: 8 GB <br>\r\n\r\nEs gamer: Sí <br>\r\n\r\nFormato: DIMM <br>\r\n\r\nTecnología: DDR4 <br>\r\n \r\nVelocidad: 3600 MHz <br>\r\n\r\nAplicación: Computadoras de escritorio <br>', 320000, 19, 4, 11, 1, '../img/productos/11/1009.jpg'),
(1010, 'Memoria Ram Adata Xpg Spectrix D80 8gb 3600 M', 'Capacidad total: 8 GB <br>\r\n\r\nVelocidad: 3600 MHz <br>\r\n\r\nAplicación: Computadoras de escritorio <br>\r\n\r\nTecnología: DDR4 <br>', 297000, 19, 4, 6, 1, '../img/productos/6/1010.jpg'),
(1011, 'Tarjeta De Video Asrock Radeon Rx 5500 Xt 8 G', 'Fabricante: AMD <br>\r\n\r\nTipo de memoria gráfica: GDDR6 <br>\r\n\r\nInterfaz con la placa madre: PCI-Express 4.0 <br>\r\n\r\nTamaño de memoria: 8 GB <br>\r\n\r\nContectividad: HDMI,DisplayPort <br>', 3500000, 19, 5, 10, 1, '../img/productos/10/1011.jpg'),
(1012, 'Radeon Rx 5600 Xt Windforce Oc 6g', 'Desarrollado por AMD Radeon ™ RX 5600 XT <br>\r\nIntegrado con 6 GB de interfaz de memoria GDDR6 de 192 bits <br>\r\nSistema de enfriamiento WINDFORCE 2X con ventiladores giratorios alternativos <br>\r\nPlaca trasera de protección <br>\r\nSoporte PCI-Express 4.0 <br>\r\nReloj de núcleo <br>\r\nReloj de refuerzo: hasta 1620 MHz <br>\r\nReloj de juego *: 1460 MHz <br>', 3500000, 19, 5, 8, 1, '../img/productos/8/1012.jpg'),
(1013, 'Evga Geforce Gtx 1660 Xc Gaming 6gb Gddr5', 'Real Boost Clock: 1830 MHz <br>\r\nDetalle de la memoria:6144MB GDDR5 <br>\r\nCompatibilidad con el sistema operativo: Windows 10 de 64 bits, Windows 7 de 64 bits<br>\r\n* El ventilador HDB único ofrece un enfriamiento de mayor rendimiento y un ruido acústico mucho más silencioso<br>\r\n* Diseñado para EVGA Precision x1 <br>', 5368000, 19, 5, 6, 1, '../img/productos/6/1013.jpg'),
(1014, 'Disco Duro Sata Pc Interno 2 Teras Toshiba', 'Marca: Toshiba <br>\r\nCapacidad: 2 Teras <br>\r\nDimensiones: 101.6x26.1x147mm <br>\r\nPeso: 450grm <br> \r\nInterfaz sata de 6 gb/seg <br>\r\nInterfaz: serial ata <br>\r\nInterfaces estándar admitidas: ata-8 serial ata 3.0 <br>\r\nCompatibilidad: Windows xp/vista/7/8 o superior, Mac os 10.6 o superior, Linux kernel 2.4 o superior <br>', 245000, 19, 6, 7, 1, '../img/productos/7/1014.jpg'),
(1015, 'Ssd Gigabyte Nvme 1tb', 'Capacidad: 1 TB<br>\r\n\r\nFactor de forma: M.2 2280<br>\r\n\r\nAplicaciones: portatiles,pcs <br>Tecnología de almacenamiento: SSHD<br>\r\n\r\nInterfaces: NVMe 1.3', 859000, 19, 6, 12, 1, '../img/productos/12/1015.jpg'),
(1016, 'Disco Duro Seagate Barracuda 4tb Hdd', 'Capacidad: 4 TB<br>\r\n\r\nFactor de forma: 3.5 \"<br>\r\n\r\nAplicaciones: PC<br>\r\n\r\nTecnología de almacenamiento: HDD<br>\r\n\r\nInterfaces: SATA II', 502000, 19, 6, 11, 1, '../img/productos/4/1016.jpg'),
(1017, 'Chasis Corsair Carbide Spec Omega', 'Marca	Corsair<br>\r\nLínea	Carbide<br>\r\nModelo	SPEC-OMEGA <br> Incluye fuente de alimentación: No <br>\r\nTipo de estructura: Mid tower<br>\r\nPuertos: USB 2.0,USB 3.0,Audio<br>\r\nBahías: 2.5 in,3.5 in<br>\r\nAltura x Ancho x Largo: 495 mm x 232 mm x 516 mm<br>\r\nEs gamer: No<br>\r\nPlacas madre compatibles: Micro-ATX,Mini-ITX,ATX', 871000, 19, 7, 10, 1, '../img/productos/10/1017.jpg'),
(1018, 'Chasis Thermaltake Core P3 Red', 'Marca	Thermaltake<br>\r\nLínea	Core <br>\r\nModelo	P3<br>\r\nColor	Negro', 2256000, 19, 7, 8, 1, '../img/productos/8/1018.jpg'),
(1019, 'Chasis Thermaltake View 51 Argb', 'LA SERIE: View snow <br>\r\nTIPO DE CASO: Torre media<br>\r\nPANEL LATERAL: 3 x vidrio templado (espesor de 4 mm)<br>\r\nCOLOR: Exterior e interior: blanco', 940000, 19, 7, 6, 1, '../img/productos/6/1019.jpg'),
(1020, 'Monitor Lg 24mp59g-p Full Hd', '    Pantalla led de 24 \" <br>\r\n    Tiene una resolución de 1920px-1080px <br>\r\n    Relación de aspecto de 16:9 <br>\r\n    Panel IPS <br>\r\n    Su brillo es de 250cd/m² <br>\r\n    Tipos de conexión: DisplayPort 1.2, HDMI 1.4, D-Sub, Jack 3.5 mm', 871000, 19, 9, 10, 1, '../img/productos/10/1020.jpg'),
(1021, 'Monitor Gaming Lg 34 34gl750 144hz ', 'Pantalla led de 34 \" <br>\r\nCurvo. <br>\r\nTiene una resolución de 2560px-1080px <br>\r\nRelación de aspecto de 21:9 <br>\r\nPanel IPS <br>\r\nSu brillo es de 300cd/m² <br>\r\nTipos de conexión: 2 HDMI 2.0, DisplayPort 1.4 Jack 3.5 mm.', 2750000, 19, 9, 8, 1, '../img/productos/8/1021.jpg'),
(1022, 'Monitor Samsung 24 Led Hdmi', 'Tamaño de la pantalla: 24 \" <br>\r\n\r\nEs reclinable: Sí <br>\r\n\r\nEs curvo: No <br>\r\n\r\nCon altavoces incorporados: No', 636242, 19, 9, 6, 1, '../img/productos/6/1022.jpg'),
(1023, 'Fuente De Poder Rm850 850w 80plus Gold', 'Series 	RM Series\r\nMarca 	Corsair\r\nPotencia de salida 	850 <br>\r\nFactor de forma 	ATX <br>\r\nPotencia 	850 vatios', 513890, 19, 8, 5, 1, '../img/productos/5/1023.jpg'),
(1024, 'Fuente De Poder Evga Supernova 1300w G2 Gold', 'Marca	Evga <br>\r\nLínea	SuperNOVA <br>\r\nModelo	120-G2-1300-X <br>\r\nPotencia de salida	1300 W', 2344000, 19, 8, 11, 1, '../img/productos/11/1024.jpg'),
(1025, 'Fuente De Poder Thermaltake Smart Bx1 750w 80', 'Marca	Thermaltake Technology<br>\r\nLínea	Smart Series<br>\r\nModelo	PS-SPD-0750NNFABU-1<br>\r\nPotencia de salida	750 W', 422000, 19, 8, 9, 1, '../img/productos/9/1025.jpg'),
(1026, 'Refrigeracion Liquida Xpg Levante 240', 'Dimensión del bloque de agua (H W D): 86 x 72 x 36 mm <br>\r\nMaterial de bloque de agua: Cobre<br>\r\nCPU Socket Support: Intel LGA 1366,115x 2066,2011 AMD AM4<br>\r\nGrasa térmica: Pre-aplicado<br>\r\nDimensión del radiador: 272 x 121 x 27 mm<br>\r\nMaterial del radiador: Aluminio', 629000, 19, 10, 7, 1, '../img/productos/7/1026.jpg'),
(1027, 'Ventilador Thermaltake Pure 12', 'Marca	Thermaltake<br>\r\n\r\nLínea	Pure<br>\r\n\r\nModelo	12 <br> Tipo de cooler: Air cooling<br>\r\nTamaño del ventilador: 120 mm<br>\r\nEs gamer: Sí<br>', 139000, 19, 10, 7, 1, '../img/productos/7/1027.jpg'),
(1028, 'Pasta Termica Corsair Xtm50', 'Brand: Corsair <br>\r\n- Número de modelo del producto: CT--WW <br>\r\n- Peso del producto: 0.353 onzas <br>\r\n- Dimensiones del producto: 5.19 x 4.33 x 5.19 pulgadas <br>\r\n- Dimensiones del artículo Largo x Ancho x Altura: 5.19 x 4.33 x 5.19 pulgadas', 120000, 19, 10, 7, 1, '../img/productos/7/1028.jpg'),
(1029, 'Timon Logitech G923 Xbox One Pc Trueforce', '\r\n    TRUEFORCE <br>\r\n    Tecnología Force Feedback de próxima generación <br>\r\n    PEDAL DEL FRENO PROGRESIVO <br>\r\n    Mejor respuesta, mayor precisión <br>\r\n    Controles Xbox Series X|S, Xbox One, PS5 y PS4 integrados\r\n', 1599000, 19, 11, 7, 1, '../img/productos/7/1029.jpg'),
(1030, 'Combo Mouse G203 Y Pad Mouse G240 Logitech', 'Máximo desempeño para juegos, esto debido a las 1.000 señales por segundo del G203 que representan una rapidez 8 veces superior a la de los mouse estándar. Por eso al moverlo o hacer click, la respuesta en pantalla es casi instantánea.', 194000, 19, 11, 8, 1, '../img/productos/8/1030.jpg'),
(1031, 'Silla Gamer Corsair T2 Road Warrior Morado/Ve', '- Ideal para los apasionados de los video juegos y también es utilizada como silla de oficina. Esta silla está pensada para largas horas de juego o trabajo en, permite varios ángulos de reclinación hasta los 180 grados. <br><br> - Es ergonómica y flexible para proteger tu ergonomía postural. <br>  Cuenta con un cojín lumbar y uno en el cabecero. <br><br> - Es giratoria, puedes graduar la altura de los apoya brazos y de la silla según tus necesidades. ', 728200, 19, 12, 7, 1, '../img/productos/7/1031.jpg'),
(1032, 'Silla Gamer Corsair Silver Edition T12', 'Presenta un asiento ancho, respaldo alto y tonos de color personalizados en dos capas para ofrecerle el estilo, la comodidad y la resistencia que necesita para largas sesiones de juego.', 719900, 19, 12, 7, 1, '../img/productos/7/1032.jpg'),
(1055, 'COMPUTADOR DE MESA PC CLON GAMER 1 RYZEN 5', 'Procesador Amd <br>\r\nFuente Atx Generica <br>\r\nProcesador Ryzen 5 <br>\r\nVelocidad 3.6Ghz <br>\r\nMother Board Standar (Aud/Vid/Red) <br>\r\nMemoria 8 Gb <br>\r\nDisco Duro SSD 240 GB <br>\r\nPantalla 22\" <br>\r\nMarca Acer ', 2307000, 19, 1, 11, 1, '../img/productos/11/Computador negro.jpg');

--
-- Disparadores `producto`
--
DELIMITER $$
CREATE TRIGGER `invetario_trigger` AFTER INSERT ON `producto` FOR EACH ROW BEGIN 
		       INSERT INTO inventario
		       VALUES (0, 0, 0, 0, NEW.idProducto);
		    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(10) UNSIGNED NOT NULL,
  `nEmpresa` varchar(45) NOT NULL,
  `cNombre` varchar(45) NOT NULL,
  `cApellido` varchar(45) NOT NULL,
  `cCelular` varchar(45) NOT NULL,
  `eTelefono` varchar(45) NOT NULL,
  `ESTADO_idEstado` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nEmpresa`, `cNombre`, `cApellido`, `cCelular`, `eTelefono`, `ESTADO_idEstado`) VALUES
(4, 'Collier and Sons', 'Lottie', 'Spours', '714-563-9383', '6627903', 4),
(5, 'Green Inc', 'Clem', 'Seago', '879-862-3942', '1014075', 5),
(6, 'Green Inc', 'Clem', 'Seago', '879-862-3942', '1014075', 5),
(7, 'Collier and Sons2', 'Lottie', 'Spours', '714-563-9383', '6627903', 5),
(8, 'Pfannerstill-Cormier', 'Heather', 'Fryd', '548-448-4654', '3167625', 4),
(9, 'Johnson, Zemlak and Pollich', 'Tally', 'Livett', '208-975-2568', '7001635', 4),
(10, 'Wiegand-Leuschke', 'Ralina', 'Clilverd', '817-456-6029', '4420702', 5),
(11, 'Prohaska, Stokes and Feil', 'Daffi', 'Casoni', '751-109-8884', '2741552', 4),
(12, 'Jacobs Inc', 'Franciskus', 'Haynes', '560-749-7916', '1907914', 4),
(13, 'Nader LLC', 'Henri', 'Cunniff', '719-421-9473', '4074124', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `idTipo` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`idTipo`, `tipo`) VALUES
(1, 'Cédula'),
(2, 'Tarjeta de identidad'),
(3, 'Cédula de extranjería'),
(4, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomovimiento`
--

CREATE TABLE `tipomovimiento` (
  `idTipoMovimiento` int(10) UNSIGNED NOT NULL,
  `tipoMovimiento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipomovimiento`
--

INSERT INTO `tipomovimiento` (`idTipoMovimiento`, `tipoMovimiento`) VALUES
(1, 'Venta'),
(2, 'Devolución'),
(3, 'Entrada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopago`
--

CREATE TABLE `tipopago` (
  `idTipoPago` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipopago`
--

INSERT INTO `tipopago` (`idTipoPago`, `tipo`) VALUES
(1, 'Tarjeta debito'),
(2, 'Tarjeta credito'),
(3, 'Paypal'),
(4, 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `documento` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `fechaNto` date NOT NULL,
  `edad` int(10) UNSIGNED NOT NULL,
  `celular` varchar(15) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `CARGO_idCargo` int(10) UNSIGNED NOT NULL,
  `TIPODOCUMENTO_idTipo` int(10) UNSIGNED NOT NULL,
  `ESTADO_idEstado` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`documento`, `nombres`, `apellidos`, `fechaNto`, `edad`, `celular`, `direccion`, `correo`, `CARGO_idCargo`, `TIPODOCUMENTO_idTipo`, `ESTADO_idEstado`) VALUES
(1632873, 'Juan', 'Palacios', '2021-04-30', 45, '1212388', 'tv 3 bis este nzss', 'yapalacios660@misena.edu.co', 3, 2, 9),
(25251663, 'juan', 'diaz', '2000-12-25', 20, '55252533', 'carrera 4', 'juan@gmail.com', 2, 3, 9),
(227142548, 'Tiena', 'Sprules', '1989-08-27', 13, '674 787 4516', '77 Dakota Junction', 'tsprules4@weebly.com', 3, 3, 10),
(339218373, 'Perrine', 'Ivanshintsev', '1998-12-18', 61, '901 901 3365', '459 Dexter Park', 'pivanshintsev0@ustream.tv', 3, 4, 9),
(427389387, 'Rae', 'Skill', '1998-01-05', 60, '588 348 6757', '0 Ruskin Parkway', 'rskille@admin.ch', 3, 2, 9),
(607881456, 'Libbey', 'Yakobowitch', '1992-03-30', 53, '592 562 9508', '07 Morning Drive', 'lyakobowitchh@weebly.com', 3, 3, 9),
(1000035428, 'Marlon', 'Jaramillo', '2003-06-09', 18, '3212855600', 'Diagonal 43 # 1a 20 este', 'marlonjaramillo23441@gmail.com', 3, 1, 9),
(1000257626, 'Miguel', 'Lopez', '2000-02-10', 20, '5553263627', 'calle 20 ...', 'malopez030@misena.edu.co', 3, 2, 10),
(1000257902, 'jhon ', 'monroy', '2001-06-10', 20, '3143564218', 'cr3aeste', 'rodriguez@gmail.com', 1, 1, 9),
(1000456409, 'Kevin ', 'Cendales', '2002-10-08', 18, '3114609836', 'Calle 45 D # 4- 20 este', 'kacendales@misena.edu.co', 1, 1, 9),
(1014925189, 'Vasili', 'MacAvaddy', '1998-11-11', 43, '748 679 9637', '317 Meadow Valley Parkway', 'vmacavaddy6@comcast.net', 3, 3, 9),
(1022322055, 'Yeren', 'Palacios2', '2021-08-10', 12, '66265526', 'calle 3', 'yeren@gmail.com', 1, 2, 9),
(1022322061, 'Yeren', 'Palacios', '2003-10-24', 17, '55526662', 'calle 1 ...', 'yerenagmt@gmail.com', 3, 2, 10),
(1022322062, 'Yeren', 'Palacios', '2021-08-19', 3122, '66265526', 'calle 3', 'yeren2@gmail.com', 3, 2, 10),
(1022322066, 'prueba1', 'prueba1', '2021-08-11', 3122, '66265526', 'prueba1', 'prueba1@gmail.ocm', 3, 1, 10),
(1022328832, 'Diego', 'Diaz Perez', '1983-02-15', 12, '3006961901', 'tv 3 bis este 48 - 20', 'diego1@gmail.com', 2, 1, 9),
(1090856204, 'Erna', 'Rudolf', '1988-11-28', 10, '799 187 1933', '1 Valley Edge Alley', 'erudolfg@dyndns.org', 3, 4, 9),
(1203287361, 'prueba3', 'prueba3', '2021-08-02', 12, '66265526', 'prueba1', 'prueba3@gmail.com', 3, 1, 9),
(1203287362, 'prueba2', 'prueba2', '2021-08-02', 12, '66265526', 'prueba1', 'prueba2@gmail.com', 3, 1, 9),
(1203287364, '', '', '0000-00-00', 0, '', '', 'prueba4@gmail.com', 3, 1, 9),
(1292020212, 'Morlee', 'Pointing', '1992-10-09', 26, '484 225 4881', '22422 Kipling Trail', 'mpointingf@flavors.me', 3, 3, 9),
(2056910799, 'Sibylle', 'Scrymgeour', '1986-10-21', 12, '498 563 5534', '31 Northland Place', 'sscrymgeour2@fc2.com', 3, 4, 9),
(2195205439, 'Pebrook', 'Gentile', '1995-01-02', 53, '690 560 1577', '4212 Packers Hill', 'pgentile1@exblog.jp', 3, 1, 9),
(2219978176, 'Wyatt', 'Tuting', '2004-08-30', 37, '200 354 3934', '89905 Artisan Place', 'wtutingb@army.mil', 3, 3, 9),
(2773619313, 'Alex', 'Boxhall', '2005-04-15', 56, '457 615 0899', '0136 Pankratz Center', 'aboxhall8@lycos.com', 3, 2, 9),
(2864316033, 'Sholom', 'Welberry', '1990-07-07', 38, '643 189 2686', '2725 Reinke Hill', 'swelberry9@whitehouse.gov', 3, 1, 9),
(2938722122, 'prueba1', 'prueba1', '2021-08-02', 12, '66265526', 'prueba1', 'prueba1@gmail.ocd', 3, 1, 9),
(3019400478, 'Gradeigh', 'Nevin', '1991-08-10', 64, '743 379 9038', '8131 Maple Way', 'gnevinc@jugem.jp', 3, 1, 9),
(3467715564, 'Blane', 'Sandry', '1990-08-20', 16, '616 998 4626', '7 Melody Terrace', 'bsandryi@histats.com', 3, 1, 9),
(3616514451, 'Halimeda', 'Sidsaff', '2002-04-07', 19, '960 472 8070', '5 Thompson Park', 'hsidsaffa@globo.com', 3, 2, 9),
(3653385010, 'Corene', 'Yurmanovev', '1999-06-09', 9, '353 684 0247', '500 Di Loreto Lane', 'cyurmanovev7@geocities.com', 2, 4, 9),
(3671320702, 'Hercule', 'Faunch', '2005-07-09', 48, '304 840 8359', '68326 Duke Trail', 'hfaunchd@miibeian.gov.cn', 3, 3, 9),
(3817832437, 'Bronnie', 'Kiddye', '1988-12-10', 58, '642 923 5724', '4 Beilfuss Alley', 'bkiddye5@usnews.com', 3, 2, 9),
(4263724624, 'Aura', 'Meindl', '1988-11-02', 68, '472 847 2724', '5 Charing Cross Point', 'ameindl3@friendfeed.com', 3, 2, 9),
(4294967295, 'Tuck', 'Sliman', '1999-02-13', 27, '716 224 5314', '2 Saint Paul Court', 'tslimanj@joomla.org', 2, 4, 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `clave`
--
ALTER TABLE `clave`
  ADD PRIMARY KEY (`correo`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`idDetalles`),
  ADD KEY `fk_DETALLES_FACTURA1_idx` (`FACTURA_idFactura`),
  ADD KEY `fk_DETALLES_PRODUCTO1_idx` (`PRODUCTO_idProducto`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `fk_FACTURA_TIPOPAGO1_idx` (`TIPOPAGO_idTipoPago`),
  ADD KEY `fk_FACTURA_USUARIO1_idx` (`USUARIO_documento`),
  ADD KEY `fk_FACTURA_ESTADO1_idx` (`ESTADO_idEstado`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idInventario`),
  ADD KEY `fk_INVENTARIO_PRODUCTO1_idx` (`PRODUCTO_idProducto`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`idMovimiento`),
  ADD KEY `fk_MOVIMIENTO_TIPOMOVIMIENTO1_idx` (`TIPOMOVIMIENTO_idTipoMovimiento`),
  ADD KEY `fk_MOVIMIENTO_PRODUCTO1_idx` (`PRODUCTO_idProducto`),
  ADD KEY `fk_MOVIMIENTO_FACTURA1_idx` (`FACTURA_idFactura`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPEDIDO`),
  ADD KEY `fk_PEDIDO_USUARIO1_idx` (`USUARIO_documento`),
  ADD KEY `fk_PEDIDO_PROVEEDOR1_idx` (`PROVEEDOR_idProveedor`);

--
-- Indices de la tabla `pedidoorden`
--
ALTER TABLE `pedidoorden`
  ADD PRIMARY KEY (`idPedidoOrden`),
  ADD KEY `fk_PEDIDOORDEN_PEDIDO1_idx` (`PEDIDO_idPEDIDO`),
  ADD KEY `fk_PEDIDOORDEN_PRODUCTO1_idx` (`PRODUCTO_idProducto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `fk_PRODUCTO_CATEGORIA1_idx` (`CATEGORIA_idCategoria`),
  ADD KEY `fk_PRODUCTO_PROVEEDOR1_idx` (`PROVEEDOR_idProveedor`),
  ADD KEY `fk_PRODUCTO_ESTADO1_idx` (`ESTADO_idEstado`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`),
  ADD KEY `fk_PROVEEDOR_ESTADO1_idx` (`ESTADO_idEstado`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `tipomovimiento`
--
ALTER TABLE `tipomovimiento`
  ADD PRIMARY KEY (`idTipoMovimiento`);

--
-- Indices de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  ADD PRIMARY KEY (`idTipoPago`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`documento`) USING BTREE,
  ADD KEY `fk_USUARIO_CARGO1_idx` (`CARGO_idCargo`),
  ADD KEY `fk_USUARIO_TIPODOCUMENTO1_idx` (`TIPODOCUMENTO_idTipo`),
  ADD KEY `fk_USUARIO_ESTADO1_idx` (`ESTADO_idEstado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `idDetalles` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idFactura` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5346;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idInventario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `idMovimiento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPEDIDO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedidoorden`
--
ALTER TABLE `pedidoorden`
  MODIFY `idPedidoOrden` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1117;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `idTipo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  MODIFY `idTipoPago` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD CONSTRAINT `fk_DETALLES_FACTURA1` FOREIGN KEY (`FACTURA_idFactura`) REFERENCES `factura` (`idFactura`),
  ADD CONSTRAINT `fk_DETALLES_PRODUCTO1` FOREIGN KEY (`PRODUCTO_idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_FACTURA_ESTADO1` FOREIGN KEY (`ESTADO_idEstado`) REFERENCES `estado` (`idEstado`),
  ADD CONSTRAINT `fk_FACTURA_TIPOPAGO1` FOREIGN KEY (`TIPOPAGO_idTipoPago`) REFERENCES `tipopago` (`idTipoPago`),
  ADD CONSTRAINT `fk_FACTURA_USUARIO1` FOREIGN KEY (`USUARIO_documento`) REFERENCES `usuario` (`documento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`PRODUCTO_idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `fk_MOVIMIENTO_FACTURA1` FOREIGN KEY (`FACTURA_idFactura`) REFERENCES `factura` (`idFactura`),
  ADD CONSTRAINT `fk_MOVIMIENTO_PRODUCTO1` FOREIGN KEY (`PRODUCTO_idProducto`) REFERENCES `producto` (`idProducto`),
  ADD CONSTRAINT `fk_MOVIMIENTO_TIPOMOVIMIENTO1` FOREIGN KEY (`TIPOMOVIMIENTO_idTipoMovimiento`) REFERENCES `tipomovimiento` (`idTipoMovimiento`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_PEDIDO_PROVEEDOR1` FOREIGN KEY (`PROVEEDOR_idProveedor`) REFERENCES `proveedor` (`idProveedor`),
  ADD CONSTRAINT `fk_PEDIDO_USUARIO1` FOREIGN KEY (`USUARIO_documento`) REFERENCES `usuario` (`documento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidoorden`
--
ALTER TABLE `pedidoorden`
  ADD CONSTRAINT `fk_PEDIDOORDEN_PEDIDO1` FOREIGN KEY (`PEDIDO_idPEDIDO`) REFERENCES `pedido` (`idPEDIDO`),
  ADD CONSTRAINT `fk_PEDIDOORDEN_PRODUCTO1` FOREIGN KEY (`PRODUCTO_idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_PRODUCTO_CATEGORIA1` FOREIGN KEY (`CATEGORIA_idCategoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `fk_PRODUCTO_ESTADO1` FOREIGN KEY (`ESTADO_idEstado`) REFERENCES `estado` (`idEstado`),
  ADD CONSTRAINT `fk_PRODUCTO_PROVEEDOR1` FOREIGN KEY (`PROVEEDOR_idProveedor`) REFERENCES `proveedor` (`idProveedor`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_PROVEEDOR_ESTADO1` FOREIGN KEY (`ESTADO_idEstado`) REFERENCES `estado` (`idEstado`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_USUARIO_CARGO1` FOREIGN KEY (`CARGO_idCargo`) REFERENCES `cargo` (`idCargo`),
  ADD CONSTRAINT `fk_USUARIO_ESTADO1` FOREIGN KEY (`ESTADO_idEstado`) REFERENCES `estado` (`idEstado`),
  ADD CONSTRAINT `fk_USUARIO_TIPODOCUMENTO1` FOREIGN KEY (`TIPODOCUMENTO_idTipo`) REFERENCES `tipodocumento` (`idTipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
