-- -----------------------------------------------------
-- 1. Insertar en cargo
-- -----------------------------------------------------

INSERT INTO cargo (idCargo, cargo) VALUES
(1, 'Admin'),
(2, 'Operario'),
(3, 'Cliente');

-- -----------------------------------------------------
-- 2. Insertar en tipodocumento
-- -----------------------------------------------------

INSERT INTO tipodocumento (idTipo, tipo) VALUES
(1, 'Cédula'),
(2, 'Tarjeta de identidad'),
(3, 'Cédula de extranjería'),
(4, 'Pasaporte');


-- -----------------------------------------------------
-- 3. Insertar en estado
-- -----------------------------------------------------

INSERT INTO estado (idEstado, estado) VALUES
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

-- -----------------------------------------------------
-- 4. Insertar en usuario
-- -----------------------------------------------------

INSERT INTO usuario (documento, nombres, apellidos, fechaNto, edad, celular, direccion, correo, CARGO_idCargo, TIPODOCUMENTO_idTipo, ESTADO_idEstado) VALUES
(194117223, 'Tiena', 'Sprules', '1989-08-27', 13, '674 787 4516', '77 Dakota Junction', 'tsprules4@weebly.com', 3, 3, 9),
(227142548, 'Alex', 'Boxhall', '2005-04-15', 56, '457 615 0898', '0136 Pankratz Center', 'aboxhall8@lycos.com', 3, 2, 9),
(339218373, 'Perrine', 'Ivanshintsev', '1998-12-18', 61, '901 901 3365', '459 Dexter Park', 'pivanshintsev0@ustream.tv', 3, 4, 9),
(427389387, 'Rae', 'Skill', '1998-01-05', 60, '588 348 6757', '0 Ruskin Parkway', 'rskille@admin.ch', 3, 2, 9),
(607881456, 'Libbey', 'Yakobowitch', '1992-03-30', 53, '592 562 9508', '07 Morning Drive', 'lyakobowitchh@weebly.com', 3, 3, 9),
(1014925189, 'Vasili', 'MacAvaddy', '1998-11-11', 43, '748 679 9637', '317 Meadow Valley Parkway', 'vmacavaddy6@comcast.net', 3, 3, 9),
(1090856204, 'Erna', 'Rudolf', '1988-11-28', 10, '799 187 1933', '1 Valley Edge Alley', 'erudolfg@dyndns.org', 3, 4, 9),
(1292020212, 'Morlee', 'Pointing', '1992-10-09', 26, '484 225 4881', '22422 Kipling Trail', 'mpointingf@flavors.me', 3, 3, 9),
(2056910799, 'Sibylle', 'Scrymgeour', '1986-10-21', 12, '498 563 5534', '31 Northland Place', 'sscrymgeour2@fc2.com', 3, 4, 9),
(2195205439, 'Pebrook', 'Gentile', '1995-01-02', 53, '690 560 1577', '4212 Packers Hill', 'pgentile1@exblog.jp', 3, 1, 9),
(2219978176, 'Wyatt', 'Tuting', '2004-08-30', 37, '200 354 3934', '89905 Artisan Place', 'wtutingb@army.mil', 3, 3, 9),
(2864316033, 'Sholom', 'Welberry', '1990-07-07', 38, '643 189 2686', '2725 Reinke Hill', 'swelberry9@whitehouse.gov', 3, 1, 9),
(3019400478, 'Gradeigh', 'Nevin', '1991-08-10', 64, '743 379 9038', '8131 Maple Way', 'gnevinc@jugem.jp', 3, 1, 9),
(3467715564, 'Blane', 'Sandry', '1990-08-20', 16, '616 998 4626', '7 Melody Terrace', 'bsandryi@histats.com', 3, 1, 9),
(3616514451, 'Halimeda', 'Sidsaff', '2002-04-07', 19, '960 472 8070', '5 Thompson Park', 'hsidsaffa@globo.com', 3, 2, 9),
(3653385010, 'Corene', 'Yurmanovev', '1999-06-09', 9, '353 684 0247', '500 Di Loreto Lane', 'cyurmanovev7@geocities.com', 2, 4, 9),
(3671320702, 'Hercule', 'Faunch', '2005-07-09', 48, '304 840 8359', '68326 Duke Trail', 'hfaunchd@miibeian.gov.cn', 3, 3, 9),
(3817832437, 'Bronnie', 'Kiddye', '1988-12-10', 58, '642 923 5724', '4 Beilfuss Alley', 'bkiddye5@usnews.com', 3, 2, 9),
(4263724624, 'Aura', 'Meindl', '1988-11-02', 68, '472 847 2724', '5 Charing Cross Point', 'ameindl3@friendfeed.com', 3, 2, 9),
(4294967295, 'Tuck', 'Sliman', '1999-02-13', 27, '716 224 5314', '2 Saint Paul Court', 'tslimanj@joomla.org', 2, 4, 9);

-- -----------------------------------------------------
-- 5. Insertar en categoria
-- -----------------------------------------------------

INSERT INTO categoria (idCategoria, categoria) VALUES
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

-- -----------------------------------------------------
-- 6. Insertar en proveedor
-- -----------------------------------------------------

INSERT INTO proveedor (idProveedor, nEmpresa, cNombre, cApellido, cCelular, eTelefono, ESTADO_idEstado) VALUES
(4, 'Collier and Sons', 'Lottie', 'Spours', '714-563-9383', '6627903', 4),
(5, 'Green Inc', 'Clem', 'Seago', '879-862-3942', '1014075', 5),
(6, 'Green Inc', 'Clem', 'Seago', '879-862-3942', '1014075', 5),
(7, 'Collier and Sons', 'Lottie', 'Spours', '714-563-9383', '6627903', 4),
(8, 'Pfannerstill-Cormier', 'Heather', 'Fryd', '548-448-4654', '3167625', 4),
(9, 'Johnson, Zemlak and Pollich', 'Tally', 'Livett', '208-975-2568', '7001635', 5),
(10, 'Wiegand-Leuschke', 'Ralina', 'Clilverd', '817-456-6029', '4420702', 5),
(11, 'Prohaska, Stokes and Feil', 'Daffi', 'Casoni', '751-109-8884', '2741552', 4),
(12, 'Jacobs Inc', 'Franciskus', 'Haynes', '560-749-7916', '1907914', 5),
(13, 'Nader LLC', 'Henri', 'Cunniff', '719-421-9473', '4074124', 4);

-- -----------------------------------------------------
-- 7. Insertar en producto
-- -----------------------------------------------------

INSERT INTO producto (idProducto, productoNombre, detalles, precio, iva, CATEGORIA_idCategoria, PROVEEDOR_idProveedor, ESTADO_idEstado) VALUES
(1000, 'Lenovo S340-14IIL', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 2645000, 19, 1, 9, 1),
(1001, 'Portátil ASUS VivoBook X413EA-EB249T', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 3679000, 19, 1, 5, 1),
(1002, 'Portátil HP 15-dw1067la', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 2869000, 19, 1, 4, 1),
(1003, 'Procesador Ryzen 5 3400g', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 731000, 19, 2, 5, 1),
(1004, 'Procesador Amd Ryzen 9 3900xt', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 2507000, 19, 2, 5, 2),
(1005, 'Board Gigabyte B460m Ds3h Ud', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 459000, 19, 3, 10, 2),
(1006, 'Board Msi Mag B460m Mortar', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 539000, 19, 3, 8, 1),
(1007, 'Board Asrock B450 Gaming Itx Ac', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 625000, 19, 3, 6, 2),
(1008, 'Memoria Ram Corsair Vengeance Lpx 8gb (1x8gb)', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 215000, 19, 4, 9, 2),
(1009, 'Memoria Ram Adata Xpg Spectrix D60g Ddr4 8gb ', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 260000, 19, 4, 11, 1),
(1010, 'Memoria Ram Adata Xpg Spectrix D80 8gb 3600 M', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 320000, 19, 4, 6, 2),
(1011, 'Tarjeta De Video Msi Radeon Rx 5500 Xt Mech O', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 971000, 19, 5, 10, 2),
(1012, 'Tarjeta De Video Asrock Radeon RTX 5600 XT Ch', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 1256000, 19, 5, 8, 1),
(1013, 'Tarjeta De Video Evga Gtx 1650 Super Xc Gamin', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 840000, 19, 5, 6, 2),
(1014, 'Disco Duro Toshiba P300 2 Tb', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 275000, 19, 6, 7, 2),
(1015, 'Ssd Gigabyte Nvme 1tb', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 859000, 19, 6, 12, 1),
(1016, 'Disco Duro Seagate Barracuda 4tb Hdd', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 502000, 19, 6, 4, 1),
(1017, 'Chasis Corsair Carbide Spec Omega', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 871000, 19, 7, 10, 2),
(1018, 'Chasis Thermaltake Core P3 Red', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 2256000, 19, 7, 8, 1),
(1019, 'Chasis Thermaltake View 51 Argb', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 940000, 19, 7, 6, 2),
(1020, 'Monitor Lg 24mp59g-p Full Hd', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 871000, 19, 9, 10, 1),
(1021, 'Monitor Gaming Lg 34 34gl750 144hz ', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 1256000, 19, 9, 8, 1),
(1022, 'Monitor Samsung 24 Led Hdmi', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 1256000, 19, 9, 6, 2),
(1023, 'Fuente De Poder Rm850 850w 80plus Gold', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 639000, 19, 8, 5, 1),
(1024, 'Fuente De Poder Evga Supernova 1300w G2 Gold', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 1559000, 19, 8, 11, 1),
(1025, 'Fuente De Poder Thermaltake Smart Bx1 750w 80', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 422000, 19, 8, 9, 2),
(1026, 'Refrigeracion Liquida Xpg Levante 240', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 629000, 19, 10, 7, 1),
(1027, 'Ventilador Thermaltake Pure 12', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 139000, 19, 10, 7, 1),
(1028, 'Pasta Termica Corsair Xtm50', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 72000, 19, 10, 7, 1),
(1029, 'Timon Logitech G923 Xbox One Pc Trueforce', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 1499000, 19, 11, 7, 1),
(1030, 'Combo Mouse G203 Y Pad Mouse G240 Logitech', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 178000, 19, 11, 8, 1),
(1031, 'Silla Gamer Corsair T2 Road Warrior Morado/Ve', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 1422000, 19, 12, 7, 1),
(1032, 'Silla Gamer Corsair Silver Edition T12', 'Es simplemente el texto de relleno de las imprentas y archivos de texto.', 1622000, 19, 12, 7, 1);

-- -----------------------------------------------------
-- 8. Insertar en tipopago
-- -----------------------------------------------------

INSERT INTO tipopago (idTipoPago, tipo) VALUES
(1, 'Tarjeta debito'),
(2, 'Tarjeta credito'),
(3, 'Paypal'),
(4, 'Efectivo');

-- -----------------------------------------------------
-- 9. Insertar en factura
-- -----------------------------------------------------

INSERT INTO factura (idFactura, fecha, USUARIO_documento, subtotal, total, ESTADO_idEstado, TIPOPAGO_idTipoPago) VALUES
(2152, '2020-01-23', 227142548, 2193000, 2609670, 8, 2),
(2355, '2020-04-11', 194117223, 5290000, 1005100, 8, 2),
(3312, '2020-02-13', 339218373, 2507000, 2983330, 8, 3),
(4213, '2020-04-03', 427389387, 11476000, 13656440, 8, 4),
(4233, '2020-06-26', 1090856204, 3234000, 3848460, 8, 4),
(4412, '2020-09-15', 1292020212, 8607000, 10242330, 8, 2),
(5125, '2020-06-05', 1014925189, 1078000, 1282820, 8, 1),
(5231, '2020-05-29', 607881456, 1836000, 2184840, 8, 1);

-- -----------------------------------------------------
-- 10. Insertar en cargo
-- -----------------------------------------------------

INSERT INTO inventario (idInventario, entradas, Salidas, Saldo, PRODUCTO_idProducto) VALUES
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

-- -----------------------------------------------------
-- 11. Insertar en cargo
-- -----------------------------------------------------

INSERT INTO tipomovimiento (idTipoMovimiento, tipoMovimiento) VALUES
(1, 'Venta'),
(2, 'Devolución'),
(3, 'Entrada');

-- -----------------------------------------------------
-- 12. Insertar en cargo
-- -----------------------------------------------------

INSERT INTO movimiento (idMovimiento, fecha, cantidad, TIPOMOVIMIENTO_idTipoMovimiento, PRODUCTO_idProducto, FACTURA_idFactura) VALUES
(2, '2020-01-23', 2, 3, 1000, 2152),
(3, '2020-04-11', 3, 3, 1003, 2355),
(4, '2020-02-13', 1, 3, 1004, 3312),
(5, '2020-04-03', 4, 3, 1002, 4213),
(6, '2020-06-26', 4, 3, 1004, 4233),
(7, '2020-09-15', 2, 3, 1002, 4412),
(8, '2020-06-05', 6, 3, 1005, 5125),
(9, '2020-05-29', 3, 3, 1004, 5231);

-- -----------------------------------------------------
-- 13. Insertar en cargo
-- -----------------------------------------------------

INSERT INTO detalles (idDetalles, cantidad, totalCantidad, FACTURA_idFactura, PRODUCTO_idProducto) VALUES
(1, 2, 5290000, 2152, 1000),
(2, 3, 2193000, 2355, 1003),
(3, 1, 2507000, 3312, 1004),
(4, 4, 11476000, 4213, 1002),
(5, 4, 1836000, 4233, 1005),
(6, 2, 1078000, 4412, 1006),
(7, 6, 3234000, 5125, 1006),
(8, 3, 8607000, 5231, 1004);

-- -----------------------------------------------------
-- 14. Insertar en cargo
-- -----------------------------------------------------

INSERT INTO clave (correo, clave) VALUES
('aboxhall8@lycos.com', 'Alex21'),
('ameindl3@friendfeed.com', 'Aura92'),
('bkiddye5@usnews.com', 'Bronnie81'),
('bsandryi@histats.com', 'Blane52'),
('cyurmanovev7@geocities.com', 'Corene233'),
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
('wtutingb@army.mil', 'Wyatt12');

-- -----------------------------------------------------
-- 15. Insertar en cargo
-- -----------------------------------------------------

INSERT INTO pedido (idPEDIDO, pedFecha, total, USUARIO_documento, PROVEEDOR_idProveedor) VALUES
(1, '2020-05-15', 43908000, 4294967295, 5);

-- -----------------------------------------------------
-- 16. Insertar en cargo
-- -----------------------------------------------------

INSERT INTO pedidoorden (idPedidoOrden, cantidad, totalCantidad, PEDIDO_idPEDIDO, PRODUCTO_idProducto) VALUES
(1, 28, 7358000, 1, 1001),
(2, 50, 36550000, 1, 1003);


