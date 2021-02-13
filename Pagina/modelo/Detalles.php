<?php
require_once(realpath(dirname(__FILE__)) . '/Producto.php');
require_once(realpath(dirname(__FILE__)) . '/Factura.php');

use Producto;
use Factura;

/**
 * @access public
 * @author Marlon, Yeren, Jhon, Kevin
 */
class Detalles {
	/**
	 * @AttributeType int
	 */
	private $_idDetalles;
	/**
	 * @AttributeType int
	 */
	private $_cantidad;
	/**
	 * @AttributeType int
	 */
	private $_totalCantidad;
	/**
	 * @AttributeType int
	 */
	private $_idFactura;
	/**
	 * @AttributeType int
	 */
	private $_idProducto;
	/**
	 * @AttributeType Producto
	 * /**
	 *  * @AssociationType Producto
	 *  * /
	 */
	public $_unnamed_Producto_;
	/**
	 * @AttributeType Factura
	 * /**
	 *  * @AssociationType Factura
	 *  * /
	 */
	public $_unnamed_Factura_;

	/**
	 * @access public
	 * @return boolean
	 * @ReturnType boolean
	 */
	public function almacenarProductos() {
		// Not yet implemented
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aIdDetalles
	 *  * @ParamType aIdDetalles int
	 *  * /
	 * @access public
	 * @param int aIdDetalles
	 * @ParamType aIdDetalles int
	 */
	public function setIdDetalles($aIdDetalles) {
		$this->_idDetalles = $aIdDetalles;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @return int
	 *  * @ReturnType int
	 *  * /
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function getIdDetalles() {
		return $this->_idDetalles;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aCantidad
	 *  * @ParamType aCantidad int
	 *  * /
	 * @access public
	 * @param int aCantidad
	 * @ParamType aCantidad int
	 */
	public function setCantidad($aCantidad) {
		$this->_cantidad = $aCantidad;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @return int
	 *  * @ReturnType int
	 *  * /
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function getCantidad() {
		return $this->_cantidad;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aTotalCantidad
	 *  * @ParamType aTotalCantidad int
	 *  * /
	 * @access public
	 * @param int aTotalCantidad
	 * @ParamType aTotalCantidad int
	 */
	public function setTotalCantidad($aTotalCantidad) {
		$this->_totalCantidad = $aTotalCantidad;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @return int
	 *  * @ReturnType int
	 *  * /
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function getTotalCantidad() {
		return $this->_totalCantidad;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aIdFactura
	 *  * @ParamType aIdFactura int
	 *  * /
	 * @access public
	 * @param int aIdFactura
	 * @ParamType aIdFactura int
	 */
	public function setIdFactura($aIdFactura) {
		$this->_idFactura = $aIdFactura;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @return int
	 *  * @ReturnType int
	 *  * /
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function getIdFactura() {
		return $this->_idFactura;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aIdProducto
	 *  * @ParamType aIdProducto int
	 *  * /
	 * @access public
	 * @param int aIdProducto
	 * @ParamType aIdProducto int
	 */
	public function setIdProducto($aIdProducto) {
		$this->_idProducto = $aIdProducto;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @return int
	 *  * @ReturnType int
	 *  * /
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function getIdProducto() {
		return $this->_idProducto;
	}
}
?>