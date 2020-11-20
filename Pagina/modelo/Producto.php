<?php
/**
 * @access public
 * @author Marlon, Yeren, Jhon, Kevin
 */
require_once ('../controlador/cn.php');

class Producto {
	
	private $_id_Producto;
	private $_nombreProducto;
	private $_detalles;
	private $_precio;
	private $_iVA;
	private $_estado;

	public function getId_Producto() {
		return $this->_id_Producto;
	}

	public function setNombreProducto($aNombreProducto) {
		$this->_nombreProducto = $aNombreProducto;
	}

	public function getNombreProducto() {
		return $this->_nombreProducto;
	}

	public function setDetalles($aDetalles) {
		$this->_detalles = $aDetalles;
	}

	public function getDetalles() {
		return $this->_detalles;
	}

	public function setPrecio($aPrecio) {
		$this->_precio = $aPrecio;
	}

	public function getPrecio() {
		return $this->_precio;
	}

	public function setIVA($aIVA) {
		$this->_iVA = $aIVA;
	}

	public function getIVA() {
		return $this->_iVA;
	}


	public function setEstado($aEstado) {
		$this->_estado = $aEstado;
	}

	public function getEstado() {
		return $this->_estado;
	}

	public function getProductos(){
		$sql = "select * from producto where ESTADO_idEstado = 1";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}
	public function getProductosCat($cat){
		$sql = "select * from producto where ESTADO_idEstado = 1 and CATEGORIA_idCategoria = $cat";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}
}
?>