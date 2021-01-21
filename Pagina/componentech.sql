-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2021 a las 01:44:04
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

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
(1, 'Admin'),
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
('aboxhall8@lycos.com', 'Alex21'),
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
('lyakobowitchh@weebly.com', 'Libbey9'),
('mpointingf@flavors.me', 'Morlee87'),
('pgentile1@exblog.jp', 'Pebrookx22'),
('pivanshintsev0@ustream.tv', 'Perrine1'),
('rskille@admin.ch', 'Rae32'),
('sscrymgeour2@fc2.com', 'Sibylle55'),
('swelberry9@whitehouse.gov', 'Sholom34'),
('tslimanj@joomla.org', 'Tuck22'),
('tsprules4@weebly.com', 'Tiena32'),
('vmacavaddy6@comcast.net', 'Vasili2'),
('wtutingb@army.mil', 'Wyatt12'),
('yeren@gmail.com', '1234'),
('yerendsda@gmail.com', '123');

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
(8, 3, 8607000, 5231, 1004);

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
(5231, '2020-05-29', 1836000, 2184840, 1, 607881456, 8);

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
(1, 40, 10, 30, 1000),
(2, 20, 5, 15, 1001),
(3, 10, 5, 5, 1002),
(4, 15, 10, 5, 1003),
(5, 30, 15, 15, 1004),
(6, 60, 20, 40, 1005),
(7, 20, 10, 10, 1006),
(8, 50, 20, 30, 1007),
(9, 40, 20, 20, 1008),
(10, 14, 4, 10, 1008),
(11, 10, 5, 5, 1009),
(12, 5, 3, 2, 1010),
(13, 70, 40, 30, 1011),
(14, 85, 10, 75, 1012),
(15, 45, 5, 40, 1013),
(16, 25, 15, 10, 1014),
(17, 6, 2, 4, 1015),
(18, 95, 20, 75, 1016),
(19, 12, 6, 6, 1017),
(20, 18, 8, 10, 1018),
(21, 60, 30, 30, 1019),
(22, 15, 15, 0, 1020),
(23, 4, 1, 3, 1021),
(24, 50, 12, 38, 1021),
(25, 44, 4, 40, 1022),
(26, 16, 12, 4, 1023),
(27, 10, 8, 2, 1024);

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
  `FACTURA_idFactura` int(10) UNSIGNED NOT NULL
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
(9, '2020-05-29', 3, 3, 1004, 5231);

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
(1000, 'Lenovo S340-14IIL', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 2645000, 19, 1, 9, 1, '../img/productos/9/1000.jpg'),
(1001, 'Portátil ASUS VivoBook X413EA-EB249T', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 3679000, 19, 1, 5, 1, '../img/productos/5/1001.jpg'),
(1002, 'Portátil HP 15-dw1067la', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 2869000, 19, 1, 4, 1, '../img/productos/4/1002.jpg'),
(1003, 'Procesador Ryzen 5 3400g', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 731000, 19, 2, 5, 1, '../img/productos/5/1003.jpg'),
(1004, 'Procesador Amd Ryzen 9 3900xt', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 2507000, 19, 2, 5, 1, '../img/productos/5/1004.jpg'),
(1005, 'Board Gigabyte B460m Ds3h Ud', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 459000, 19, 3, 10, 1, '../img/productos/10/1005.jpg'),
(1006, 'Board Msi Mag B460m Mortar', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.<br>dajkshdjksfnacsjfkmcmnaskdmklasd<br>daksjfnckdsjnfmñrelkfmdsdkmfñas', 539000, 19, 3, 8, 1, '../img/productos/8/1006.jpg'),
(1007, 'Board Asrock B450 Gaming Itx Ac', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 625000, 19, 3, 6, 1, '../img/productos/6/1007.jpg'),
(1008, 'Memoria Ram Corsair Vengeance Lpx 8gb (1x8gb)', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 215000, 19, 4, 9, 1, '../img/productos/9/1008.jpg'),
(1009, 'Memoria Ram Adata Xpg Spectrix D60g Ddr4 8gb ', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 260000, 19, 4, 11, 1, '../img/productos/11/1009.jpg'),
(1010, 'Memoria Ram Adata Xpg Spectrix D80 8gb 3600 M', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 320000, 19, 4, 6, 1, '../img/productos/6/1010.jpg'),
(1011, 'Tarjeta De Video Msi Radeon Rx 5500 Xt Mech O', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 971000, 19, 5, 10, 1, '../img/productos/10/1011.jpg'),
(1012, 'Tarjeta De Video Asrock Radeon RTX 5600 XT Ch', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 1256000, 19, 5, 8, 1, '../img/productos/8/1012.jpg'),
(1013, 'Tarjeta De Video Evga Gtx 1650 Super Xc Gamin', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 840000, 19, 5, 6, 1, '../img/productos/6/1013.jpg'),
(1014, 'Disco Duro Toshiba P300 2 Tb', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 275000, 19, 6, 7, 1, '../img/productos/7/1014.jpg'),
(1015, 'Ssd Gigabyte Nvme 1tb', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 859000, 19, 6, 12, 1, '../img/productos/12/1015.jpg'),
(1016, 'Disco Duro Seagate Barracuda 4tb Hdd', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 502000, 19, 6, 4, 1, '../img/productos/4/1016.jpg'),
(1017, 'Chasis Corsair Carbide Spec Omega', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 871000, 19, 7, 10, 1, '../img/productos/10/1017.jpg'),
(1018, 'Chasis Thermaltake Core P3 Red', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 2256000, 19, 7, 8, 1, '../img/productos/8/1018.jpg'),
(1019, 'Chasis Thermaltake View 51 Argb', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 940000, 19, 7, 6, 1, '../img/productos/6/1019.jpg'),
(1020, 'Monitor Lg 24mp59g-p Full Hd', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 871000, 19, 9, 10, 1, '../img/productos/10/1020.jpg'),
(1021, 'Monitor Gaming Lg 34 34gl750 144hz ', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 1256000, 19, 9, 8, 1, '../img/productos/8/1021.jpg'),
(1022, 'Monitor Samsung 24 Led Hdmi', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 1256000, 19, 9, 6, 1, '../img/productos/6/1022.jpg'),
(1023, 'Fuente De Poder Rm850 850w 80plus Gold', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 639000, 19, 8, 5, 1, '../img/productos/5/1023.jpg'),
(1024, 'Fuente De Poder Evga Supernova 1300w G2 Gold', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 1559000, 19, 8, 11, 1, '../img/productos/11/1024.jpg'),
(1025, 'Fuente De Poder Thermaltake Smart Bx1 750w 80', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 422000, 19, 8, 9, 1, '../img/productos/9/1025.jpg'),
(1026, 'Refrigeracion Liquida Xpg Levante 240', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 629000, 19, 10, 7, 1, '../img/productos/7/1026.jpg'),
(1027, 'Ventilador Thermaltake Pure 12', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 139000, 19, 10, 7, 1, '../img/productos/7/1027.jpg'),
(1028, 'Pasta Termica Corsair Xtm50', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 72000, 19, 10, 7, 1, '../img/productos/7/1028.jpg'),
(1029, 'Timon Logitech G923 Xbox One Pc Trueforce', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 1499000, 19, 11, 7, 1, '../img/productos/7/1029.jpg'),
(1030, 'Combo Mouse G203 Y Pad Mouse G240 Logitech', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 178000, 19, 11, 8, 1, '../img/productos/8/1030.jpg'),
(1031, 'Silla Gamer Corsair T2 Road Warrior Morado/Ve', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 1422000, 19, 12, 7, 1, '../img/productos/7/1031.jpg'),
(1032, 'Silla Gamer Corsair Silver Edition T12', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 1622000, 19, 12, 7, 2, '../img/productos/7/1032.jpg');

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
(227142548, 'Tiena', 'Sprules', '1989-08-27', 13, '674 787 4516', '77 Dakota Junction', 'tsprules4@weebly.com', 3, 3, 9),
(339218373, 'Perrine', 'Ivanshintsev', '1998-12-18', 61, '901 901 3365', '459 Dexter Park', 'pivanshintsev0@ustream.tv', 3, 4, 9),
(427389387, 'Rae', 'Skill', '1998-01-05', 60, '588 348 6757', '0 Ruskin Parkway', 'rskille@admin.ch', 3, 2, 10),
(607881456, 'Libbey', 'Yakobowitch', '1992-03-30', 53, '592 562 9508', '07 Morning Drive', 'lyakobowitchh@weebly.com', 3, 3, 9),
(1014925189, 'Vasili', 'MacAvaddy', '1998-11-11', 43, '748 679 9637', '317 Meadow Valley Parkway', 'vmacavaddy6@comcast.net', 3, 3, 9),
(1022322055, 'Yeren', 'Palacios', '2003-10-24', 15, '3006961901', 'tv 3 bis este 48 - 20', 'yeren@gmail.com', 1, 2, 9),
(1022322066, 'Yeren', 'Palacios', '2020-11-10', 17, '3006961901', 'bogotá', 'akldasdas@aslfkasd.casd', 3, 1, 9),
(1022328832, 'Diego', 'Diaz', '1983-02-15', 12, '3006961901', 'tv 3 bis este 48 - 20', 'diego1@gmail.com', 2, 1, 9),
(1090856204, 'Erna', 'Rudolf', '1988-11-28', 10, '799 187 1933', '1 Valley Edge Alley', 'erudolfg@dyndns.org', 3, 4, 9),
(1292020212, 'Morlee', 'Pointing', '1992-10-09', 26, '484 225 4881', '22422 Kipling Trail', 'mpointingf@flavors.me', 3, 3, 9),
(2056910799, 'Sibylle', 'Scrymgeour', '1986-10-21', 12, '498 563 5534', '31 Northland Place', 'sscrymgeour2@fc2.com', 3, 4, 9),
(2195205439, 'Pebrook', 'Gentile', '1995-01-02', 53, '690 560 1577', '4212 Packers Hill', 'pgentile1@exblog.jp', 3, 1, 9),
(2219978176, 'Wyatt', 'Tuting', '2004-08-30', 37, '200 354 3934', '89905 Artisan Place', 'wtutingb@army.mil', 3, 3, 9),
(2773619313, 'Alex', 'Boxhall', '2005-04-15', 56, '457 615 0898', '0136 Pankratz Center', 'aboxhall8@lycos.com', 3, 2, 9),
(2864316033, 'Sholom', 'Welberry', '1990-07-07', 38, '643 189 2686', '2725 Reinke Hill', 'swelberry9@whitehouse.gov', 3, 1, 9),
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
  MODIFY `idDetalles` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idFactura` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5232;

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
  MODIFY `idProducto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1050;

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
  ADD CONSTRAINT `fk_DETALLES_FACTURA1` FOREIGN KEY (`FACTURA_idFactura`) REFERENCES `factura` (`idFactura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DETALLES_PRODUCTO1` FOREIGN KEY (`PRODUCTO_idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_FACTURA_ESTADO1` FOREIGN KEY (`ESTADO_idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FACTURA_TIPOPAGO1` FOREIGN KEY (`TIPOPAGO_idTipoPago`) REFERENCES `tipopago` (`idTipoPago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FACTURA_USUARIO1` FOREIGN KEY (`USUARIO_documento`) REFERENCES `usuario` (`documento`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_INVENTARIO_PRODUCTO1` FOREIGN KEY (`PRODUCTO_idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `fk_MOVIMIENTO_FACTURA1` FOREIGN KEY (`FACTURA_idFactura`) REFERENCES `factura` (`idFactura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_MOVIMIENTO_PRODUCTO1` FOREIGN KEY (`PRODUCTO_idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_MOVIMIENTO_TIPOMOVIMIENTO1` FOREIGN KEY (`TIPOMOVIMIENTO_idTipoMovimiento`) REFERENCES `tipomovimiento` (`idTipoMovimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_PEDIDO_PROVEEDOR1` FOREIGN KEY (`PROVEEDOR_idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PEDIDO_USUARIO1` FOREIGN KEY (`USUARIO_documento`) REFERENCES `usuario` (`documento`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidoorden`
--
ALTER TABLE `pedidoorden`
  ADD CONSTRAINT `fk_PEDIDOORDEN_PEDIDO1` FOREIGN KEY (`PEDIDO_idPEDIDO`) REFERENCES `pedido` (`idPEDIDO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PEDIDOORDEN_PRODUCTO1` FOREIGN KEY (`PRODUCTO_idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_PRODUCTO_CATEGORIA1` FOREIGN KEY (`CATEGORIA_idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PRODUCTO_ESTADO1` FOREIGN KEY (`ESTADO_idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PRODUCTO_PROVEEDOR1` FOREIGN KEY (`PROVEEDOR_idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `fk_PROVEEDOR_ESTADO1` FOREIGN KEY (`ESTADO_idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_USUARIO_CARGO1` FOREIGN KEY (`CARGO_idCargo`) REFERENCES `cargo` (`idCargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USUARIO_ESTADO1` FOREIGN KEY (`ESTADO_idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USUARIO_TIPODOCUMENTO1` FOREIGN KEY (`TIPODOCUMENTO_idTipo`) REFERENCES `tipodocumento` (`idTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
