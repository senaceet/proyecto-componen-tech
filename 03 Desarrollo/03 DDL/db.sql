-- MySQL Script generated by MySQL Workbench
-- Thu Oct 29 19:50:05 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema componenTech
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `componenTech` ;

-- -----------------------------------------------------
-- Schema componenTech
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `componenTech` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema componenttest1
-- -----------------------------------------------------
USE `componenTech` ;

-- -----------------------------------------------------
-- Table `componenTech`.`CARGO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `componenTech`.`CARGO` (
  `idcargo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cargo` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`idcargo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `componenTech`.`TIPODOCUMENTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `componenTech`.`TIPODOCUMENTO` (
  `idtipo` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `componenTech`.`USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `componenTech`.`USUARIO` (
  `documento` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `fechaNto` DATE NOT NULL,
  `edad` INT UNSIGNED NOT NULL,
  `celular` VARCHAR(15) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `CARGO_idcargo` INT UNSIGNED NOT NULL,
  `TIPODOCUMENTO_idtipo` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`documento`),
  CONSTRAINT `fk_USUARIO_CARGO1`
    FOREIGN KEY (`CARGO_idcargo`)
    REFERENCES `componenTech`.`CARGO` (`idcargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USUARIO_TIPODOCUMENTO1`
    FOREIGN KEY (`TIPODOCUMENTO_idtipo`)
    REFERENCES `componenTech`.`TIPODOCUMENTO` (`idtipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_USUARIO_CARGO1_idx` ON `componenTech`.`USUARIO` (`CARGO_idcargo` ASC);

CREATE INDEX `fk_USUARIO_TIPODOCUMENTO1_idx` ON `componenTech`.`USUARIO` (`TIPODOCUMENTO_idtipo` ASC);


-- -----------------------------------------------------
-- Table `componenTech`.`PROVEEDOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `componenTech`.`PROVEEDOR` (
  `idproveedores` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nEmpresa` VARCHAR(45) NOT NULL,
  `cNombre` VARCHAR(45) NOT NULL,
  `cApellido` VARCHAR(45) NOT NULL,
  `cCelular` VARCHAR(45) NOT NULL,
  `eTelefono` VARCHAR(45) NOT NULL,
  `prEstado` VARCHAR(45) NOT NULL,
  `USUARIO_documento` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idproveedores`),
  CONSTRAINT `fk_PROVEEDOR_USUARIO1`
    FOREIGN KEY (`USUARIO_documento`)
    REFERENCES `componenTech`.`USUARIO` (`documento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_PROVEEDOR_USUARIO1_idx` ON `componenTech`.`PROVEEDOR` (`USUARIO_documento` ASC);


-- -----------------------------------------------------
-- Table `componenTech`.`CATEGORIA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `componenTech`.`CATEGORIA` (
  `idcategorias` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcategorias`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `componenTech`.`PRODUCTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `componenTech`.`PRODUCTO` (
  `idproductos` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `producto_nombre` VARCHAR(45) NOT NULL,
  `detalles` VARCHAR(500) NOT NULL,
  `precio` INT UNSIGNED NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `iva` INT UNSIGNED NOT NULL,
  `PROVEEDOR_idproveedores` INT UNSIGNED NOT NULL,
  `CATEGORIA_idcategorias` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idproductos`),
  CONSTRAINT `fk_PRODUCTO_PROVEEDOR1`
    FOREIGN KEY (`PROVEEDOR_idproveedores`)
    REFERENCES `componenTech`.`PROVEEDOR` (`idproveedores`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PRODUCTO_CATEGORIA1`
    FOREIGN KEY (`CATEGORIA_idcategorias`)
    REFERENCES `componenTech`.`CATEGORIA` (`idcategorias`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_PRODUCTO_PROVEEDOR1_idx` ON `componenTech`.`PRODUCTO` (`PROVEEDOR_idproveedores` ASC);

CREATE INDEX `fk_PRODUCTO_CATEGORIA1_idx` ON `componenTech`.`PRODUCTO` (`CATEGORIA_idcategorias` ASC);


-- -----------------------------------------------------
-- Table `componenTech`.`DETALLES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `componenTech`.`DETALLES` (
  `idDetalles` INT UNSIGNED NOT NULL,
  `USUARIO_documento` INT UNSIGNED NOT NULL,
  `PRODUCTO_idproductos` INT UNSIGNED NOT NULL,
  `cantidad` INT UNSIGNED NOT NULL,
  `totalCantidad` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idDetalles`, `USUARIO_documento`),
  CONSTRAINT `fk_DETALLES_PRODUCTO1`
    FOREIGN KEY (`PRODUCTO_idproductos`)
    REFERENCES `componenTech`.`PRODUCTO` (`idproductos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DETALLES_USUARIO1`
    FOREIGN KEY (`USUARIO_documento`)
    REFERENCES `componenTech`.`USUARIO` (`documento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_DETALLES_PRODUCTO1_idx` ON `componenTech`.`DETALLES` (`PRODUCTO_idproductos` ASC);

CREATE INDEX `fk_DETALLES_USUARIO1_idx` ON `componenTech`.`DETALLES` (`USUARIO_documento` ASC);


-- -----------------------------------------------------
-- Table `componenTech`.`ESTADO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `componenTech`.`ESTADO` (
  `idestados` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idestados`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `componenTech`.`TIPOPAGO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `componenTech`.`TIPOPAGO` (
  `idtipodepago` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idtipodepago`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `componenTech`.`PAGO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `componenTech`.`PAGO` (
  `idpago` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `TIPOPAGO_idtipodepago` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idpago`),
  CONSTRAINT `fk_PAGO_TIPOPAGO1`
    FOREIGN KEY (`TIPOPAGO_idtipodepago`)
    REFERENCES `componenTech`.`TIPOPAGO` (`idtipodepago`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_PAGO_TIPOPAGO1_idx` ON `componenTech`.`PAGO` (`TIPOPAGO_idtipodepago` ASC);


-- -----------------------------------------------------
-- Table `componenTech`.`FACTURA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `componenTech`.`FACTURA` (
  `idfactura` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
  `usuarios_idusuarios` INT UNSIGNED NOT NULL,
  `DETALLES_idDetalles` INT UNSIGNED NOT NULL,
  `iva` INT UNSIGNED NOT NULL,
  `subtotal` INT UNSIGNED NOT NULL,
  `total` INT UNSIGNED NOT NULL,
  `ESTADO_idestados` INT UNSIGNED NOT NULL,
  `PAGO_idpago` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idfactura`),
  CONSTRAINT `fk_factura_usuarios1`
    FOREIGN KEY (`usuarios_idusuarios`)
    REFERENCES `componenTech`.`USUARIO` (`documento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FACTURA_DETALLES1`
    FOREIGN KEY (`DETALLES_idDetalles`)
    REFERENCES `componenTech`.`DETALLES` (`idDetalles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FACTURA_ESTADO1`
    FOREIGN KEY (`ESTADO_idestados`)
    REFERENCES `componenTech`.`ESTADO` (`idestados`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FACTURA_PAGO1`
    FOREIGN KEY (`PAGO_idpago`)
    REFERENCES `componenTech`.`PAGO` (`idpago`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_factura_usuarios1_idx` ON `componenTech`.`FACTURA` (`usuarios_idusuarios` ASC);

CREATE INDEX `fk_FACTURA_DETALLES1_idx` ON `componenTech`.`FACTURA` (`DETALLES_idDetalles` ASC);

CREATE INDEX `fk_FACTURA_ESTADO1_idx` ON `componenTech`.`FACTURA` (`ESTADO_idestados` ASC);

CREATE INDEX `fk_FACTURA_PAGO1_idx` ON `componenTech`.`FACTURA` (`PAGO_idpago` ASC);


-- -----------------------------------------------------
-- Table `componenTech`.`INVENTARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `componenTech`.`INVENTARIO` (
  `idInventario` INT UNSIGNED NOT NULL,
  `PRODUCTO_idproductos` INT UNSIGNED NOT NULL,
  `entradas` INT UNSIGNED NOT NULL,
  `Salidas` INT UNSIGNED NOT NULL,
  `Saldo` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idInventario`),
  CONSTRAINT `fk_INVENTARIO_PRODUCTO1`
    FOREIGN KEY (`PRODUCTO_idproductos`)
    REFERENCES `componenTech`.`PRODUCTO` (`idproductos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `componenTech`.`TIPOMOVIMIENTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `componenTech`.`TIPOMOVIMIENTO` (
  `idTipoMovimiento` INT UNSIGNED NOT NULL,
  `tipoMovimiento` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoMovimiento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `componenTech`.`MOVIMIENTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `componenTech`.`MOVIMIENTO` (
  `idMovimiento` INT UNSIGNED NOT NULL,
  `PRODUCTO_idproductos` INT UNSIGNED NOT NULL,
  `fecha` DATE NOT NULL,
  `TIPOMOVIMIENTO_idTipoMovimiento` INT UNSIGNED NOT NULL,
  `cantidad` INT UNSIGNED NOT NULL,
  `USUARIO_documento` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idMovimiento`),
  CONSTRAINT `fk_MOVIMIENTO_USUARIO1`
    FOREIGN KEY (`USUARIO_documento`)
    REFERENCES `componenTech`.`USUARIO` (`documento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_MOVIMIENTO_PRODUCTO1`
    FOREIGN KEY (`PRODUCTO_idproductos`)
    REFERENCES `componenTech`.`PRODUCTO` (`idproductos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_MOVIMIENTO_TIPOMOVIMIENTO1`
    FOREIGN KEY (`TIPOMOVIMIENTO_idTipoMovimiento`)
    REFERENCES `componenTech`.`TIPOMOVIMIENTO` (`idTipoMovimiento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_MOVIMIENTO_USUARIO1_idx` ON `componenTech`.`MOVIMIENTO` (`USUARIO_documento` ASC);

CREATE INDEX `fk_MOVIMIENTO_PRODUCTO1_idx` ON `componenTech`.`MOVIMIENTO` (`PRODUCTO_idproductos` ASC);

CREATE INDEX `fk_MOVIMIENTO_TIPOMOVIMIENTO1_idx` ON `componenTech`.`MOVIMIENTO` (`TIPOMOVIMIENTO_idTipoMovimiento` ASC);


-- -----------------------------------------------------
-- Table `componenTech`.`CLAVE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `componenTech`.`CLAVE` (
  `USUARIO_documento` INT UNSIGNED NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `clave` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`USUARIO_documento`),
  CONSTRAINT `fk_CLAVE_USUARIO1`
    FOREIGN KEY (`USUARIO_documento`)
    REFERENCES `componenTech`.`USUARIO` (`documento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_CLAVE_USUARIO1_idx` ON `componenTech`.`CLAVE` (`USUARIO_documento` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
