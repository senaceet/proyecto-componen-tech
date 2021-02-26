-- -----------------------------------------------------
-- Eliminar base de datos componenTech si existe
-- -----------------------------------------------------
drop database IF EXISTS componenTech ;

-- -----------------------------------------------------
-- Crear base de datos cmponentech
-- -----------------------------------------------------
create database if not exists componenTech default character set utf8 ;
USE componenTech;

-- -----------------------------------------------------
-- Crear tabla CARGO
-- -----------------------------------------------------
create table CARGO (
  idCargo int unsigned not null AUTO_INCREMENT,
  cargo varchar(15) not null,
  primary key (idCargo))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Crear tabla TIPODOCUMENTO
-- -----------------------------------------------------
create table TIPODOCUMENTO (
  idTipo int unsigned not null AUTO_INCREMENT,
  tipo varchar(45) not null,
  primary key (idTipo))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Crear tabla ESTADO
-- -----------------------------------------------------
create table ESTADO (
  idEstado int unsigned not null AUTO_INCREMENT,
  estado varchar(45) not null,
  primary key (idEstado))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Crear tabla USUARIO
-- -----------------------------------------------------
create table USUARIO (
  documento int unsigned not null,
  nombres varchar(45) not null,
  apellidos varchar(45) not null,
  fechaNto date not null,
  edad int unsigned not null,
  celular varchar(15) not null,
  direccion varchar(45) not null,
  correo varchar(45) not null,
  CARGO_idCargo int unsigned not null,
  TIPODOCUMENTO_idTipo int unsigned not null,
  ESTADO_idEstado int unsigned not null,
  primary key (documento, TIPODOCUMENTO_idTipo),
  INDEX fk_USUARIO_CARGO1_idx (CARGO_idCargo ASC),
  INDEX fk_USUARIO_TIPODOCUMENTO1_idx (TIPODOCUMENTO_idTipo ASC),
  INDEX fk_USUARIO_ESTADO1_idx (ESTADO_idEstado ASC),
  constraint fk_USUARIO_CARGO1
    foreign key (CARGO_idCargo)
    references CARGO (idCargo)
    on delete no action
    on update no action,
  constraint fk_USUARIO_TIPODOCUMENTO1
    foreign key (TIPODOCUMENTO_idTipo)
    references TIPODOCUMENTO (idTipo)
    on delete no action
    on update no action,
  constraint fk_USUARIO_ESTADO1
    foreign key (ESTADO_idEstado)
    references ESTADO (idEstado)
    on delete no action
    on update no action)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Crear tabla CATEGORIA
-- -----------------------------------------------------
create table CATEGORIA (
  idCategoria int unsigned not null AUTO_INCREMENT,
  categoria varchar(45) not null,
  primary key (idCategoria))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Crear tabla PROVEEDOR
-- -----------------------------------------------------
create table PROVEEDOR (
  idProveedor int unsigned not null AUTO_INCREMENT,
  nEmpresa varchar(45) not null,
  cNombre varchar(45) not null,
  cApellido varchar(45) not null,
  cCelular varchar(45) not null,
  eTelefono varchar(45) not null,
  ESTADO_idEstado int unsigned not null,
  primary key (idProveedor),
  INDEX fk_PROVEEDOR_ESTADO1_idx (ESTADO_idEstado ASC),
  constraint fk_PROVEEDOR_ESTADO1
    foreign key (ESTADO_idEstado)
    references ESTADO (idEstado)
    on delete no action
    on update no action)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Crear tabla PRODUCTO
-- -----------------------------------------------------
create table PRODUCTO (
  idProducto int unsigned not null AUTO_INCREMENT,
  productoNombre varchar(45) not null,
  detalles varchar(500) not null,
  precio int unsigned not null,
  iva int unsigned not null,
  CATEGORIA_idCategoria int unsigned not null,
  PROVEEDOR_idProveedor int unsigned not null,
  ESTADO_idEstado int unsigned not null,
  primary key (idProducto),
  INDEX fk_PRODUCTO_CATEGORIA1_idx (CATEGORIA_idCategoria ASC),
  INDEX fk_PRODUCTO_PROVEEDOR1_idx (PROVEEDOR_idProveedor ASC),
  INDEX fk_PRODUCTO_ESTADO1_idx (ESTADO_idEstado ASC),
  constraint fk_PRODUCTO_CATEGORIA1
    foreign key (CATEGORIA_idCategoria)
    references CATEGORIA (idCategoria)
    on delete no action
    on update no action,
  constraint fk_PRODUCTO_PROVEEDOR1
    foreign key (PROVEEDOR_idProveedor)
    references PROVEEDOR (idProveedor)
    on delete no action
    on update no action,
  constraint fk_PRODUCTO_ESTADO1
    foreign key (ESTADO_idEstado)
    references ESTADO (idEstado)
    on delete no action
    on update no action)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Crear tabla TIPOPAGO
-- -----------------------------------------------------
create table TIPOPAGO (
  idTipoPago int unsigned not null AUTO_INCREMENT,
  tipo varchar(20) not null,
  primary key (idTipoPago))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Crear tabla FACTURA
-- -----------------------------------------------------
create table FACTURA (
  idFactura int unsigned not null AUTO_INCREMENT,
  fecha date not null,
  subtotal int unsigned not null,
  total int unsigned not null,
  TIPOPAGO_idTipoPago int unsigned not null,
  USUARIO_documento int unsigned not null,
  ESTADO_idEstado int unsigned not null,
  primary key (idFactura),
  INDEX fk_FACTURA_TIPOPAGO1_idx (TIPOPAGO_idTipoPago ASC),
  INDEX fk_FACTURA_USUARIO1_idx (USUARIO_documento ASC),
  INDEX fk_FACTURA_ESTADO1_idx (ESTADO_idEstado ASC),
  constraint fk_FACTURA_TIPOPAGO1
    foreign key (TIPOPAGO_idTipoPago)
    references TIPOPAGO (idTipoPago)
    on delete no action
    on update no action,
  constraint fk_FACTURA_USUARIO1
    foreign key (USUARIO_documento)
    references USUARIO (documento)
    on delete no action
    on update cascade,
  constraint fk_FACTURA_ESTADO1
    foreign key (ESTADO_idEstado)
    references ESTADO (idEstado)
    on delete no action
    on update no action)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Crear tabla INVENTARIO
-- -----------------------------------------------------
create table INVENTARIO (
  idInventario int unsigned not null,
  entradas int unsigned not null,
  Salidas int unsigned not null,
  Saldo int unsigned not null,
  PRODUCTO_idProducto int unsigned not null,
  primary key (idInventario),
  INDEX fk_INVENTARIO_PRODUCTO1_idx (PRODUCTO_idProducto ASC),
  constraint fk_INVENTARIO_PRODUCTO1
    foreign key (PRODUCTO_idProducto)
    references PRODUCTO (idProducto)
    on delete no action
    on update no action)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Crear tabla TIPOMOVIMIENTO
-- -----------------------------------------------------
create table TIPOMOVIMIENTO (
  idTipoMovimiento int unsigned not null,
  tipoMovimiento varchar(45) not null,
  primary key (idTipoMovimiento))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Crear tabla MOVIMIENTO
-- -----------------------------------------------------
create table MOVIMIENTO (
  idMovimiento int unsigned not null,
  fecha date not null,
  cantidad int unsigned not null,
  TIPOMOVIMIENTO_idTipoMovimiento int unsigned not null,
  PRODUCTO_idProducto int unsigned not null,
  FACTURA_idFactura int unsigned not null,
  primary key (idMovimiento),
  INDEX fk_MOVIMIENTO_TIPOMOVIMIENTO1_idx (TIPOMOVIMIENTO_idTipoMovimiento ASC),
  INDEX fk_MOVIMIENTO_PRODUCTO1_idx (PRODUCTO_idProducto ASC),
  INDEX fk_MOVIMIENTO_FACTURA1_idx (FACTURA_idFactura ASC),
  constraint fk_MOVIMIENTO_TIPOMOVIMIENTO1
    foreign key (TIPOMOVIMIENTO_idTipoMovimiento)
    references TIPOMOVIMIENTO (idTipoMovimiento)
    on delete no action
    on update no action,
  constraint fk_MOVIMIENTO_PRODUCTO1
    foreign key (PRODUCTO_idProducto)
    references PRODUCTO (idProducto)
    on delete no action
    on update no action,
  constraint fk_MOVIMIENTO_FACTURA1
    foreign key (FACTURA_idFactura)
    references FACTURA (idFactura)
    on delete no action
    on update no action)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Crear tabla DETALLES
-- -----------------------------------------------------
create table DETALLES (
  idDetalles int unsigned not null AUTO_INCREMENT,
  cantidad int unsigned not null,
  totalCantidad int unsigned not null,
  FACTURA_idFactura int unsigned not null,
  PRODUCTO_idProducto int unsigned not null,
  primary key (idDetalles),
  INDEX fk_DETALLES_FACTURA1_idx (FACTURA_idFactura ASC),
  INDEX fk_DETALLES_PRODUCTO1_idx (PRODUCTO_idProducto ASC),
  constraint fk_DETALLES_FACTURA1
    foreign key (FACTURA_idFactura)
    references FACTURA (idFactura)
    on delete no action
    on update no action,
  constraint fk_DETALLES_PRODUCTO1
    foreign key (PRODUCTO_idProducto)
    references PRODUCTO (idProducto)
    on delete no action
    on update no action)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Crear tabla CLAVE
-- -----------------------------------------------------
create table CLAVE (
  correo varchar(45) not null,
  clave varchar(45) not null,
  primary key (correo))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Crear tabla PEDIDO
-- -----------------------------------------------------
create table PEDIDO (
  idPEDIDO int unsigned not null AUTO_INCREMENT,
  pedFecha date not null,
  total int unsigned not null,
  USUARIO_documento int unsigned not null,
  PROVEEDOR_idProveedor int unsigned not null,
  primary key (idPEDIDO),
  INDEX fk_PEDIDO_USUARIO1_idx (USUARIO_documento ASC),
  INDEX fk_PEDIDO_PROVEEDOR1_idx (PROVEEDOR_idProveedor ASC),
  constraint fk_PEDIDO_USUARIO1
    foreign key (USUARIO_documento)
    references USUARIO (documento)
    on delete no action
    on update cascade,
  constraint fk_PEDIDO_PROVEEDOR1
    foreign key (PROVEEDOR_idProveedor)
    references PROVEEDOR (idProveedor)
    on delete no action
    on update no action)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Crear tabla PEDIDOORDEN
-- -----------------------------------------------------
create table PEDIDOORDEN (
  idPedidoOrden int unsigned not null AUTO_INCREMENT,
  cantidad int unsigned not null,
  totalCantidad int unsigned not null,
  PEDIDO_idPEDIDO int unsigned not null,
  PRODUCTO_idProducto int unsigned not null,
  primary key (idPedidoOrden),
  INDEX fk_PEDIDOORDEN_PEDIDO1_idx (PEDIDO_idPEDIDO ASC),
  INDEX fk_PEDIDOORDEN_PRODUCTO1_idx (PRODUCTO_idProducto ASC),
  constraint fk_PEDIDOORDEN_PEDIDO1
    foreign key (PEDIDO_idPEDIDO)
    references PEDIDO (idPEDIDO)
    on delete no action
    on update no action,
  constraint fk_PEDIDOORDEN_PRODUCTO1
    foreign key (PRODUCTO_idProducto)
    references PRODUCTO (idProducto)
    on delete no action
    on update no action)
ENGINE = InnoDB;
