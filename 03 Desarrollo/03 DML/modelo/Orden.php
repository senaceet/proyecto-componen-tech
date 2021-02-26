<?php
require_once(realpath(dirname(__FILE__)) . '/Factura.php');

use Factura;

/**
 * @access public
 * @author Marlon, Yeren, Jhon, Kevin
 */
class Orden {
	/**
	 * @AttributeType int
	 */
	private $_idPedidoOrden;
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
	private $_pedidoIdPedido;
	/**
	 * @AttributeType int
	 */
	private $_productoIdProducto;
	/**
	 * @AttributeType Factura
	 * /**
	 *  * @AssociationType Factura
	 *  * /
	 */
	public $_unnamed_Factura_;

	/**
	 * /**
	 *  * @access public
	 *  * @param int aIdPedidoOrden
	 *  * @ParamType aIdPedidoOrden int
	 *  * /
	 * @access public
	 * @param int aIdPedidoOrden
	 * @ParamType aIdPedidoOrden int
	 */
	public function setIdPedidoOrden($aIdPedidoOrden) {
		$this->_idPedidoOrden = $aIdPedidoOrden;
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
	public function getIdPedidoOrden() {
		return $this->_idPedidoOrden;
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
	 *  * @param int aPedidoIdPedido
	 *  * @ParamType aPedidoIdPedido int
	 *  * /
	 * @access public
	 * @param int aPedidoIdPedido
	 * @ParamType aPedidoIdPedido int
	 */
	public function setPedidoIdPedido($aPedidoIdPedido) {
		$this->_pedidoIdPedido = $aPedidoIdPedido;
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
	public function getPedidoIdPedido() {
		return $this->_pedidoIdPedido;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aProductoIdProducto
	 *  * @ParamType aProductoIdProducto int
	 *  * /
	 * @access public
	 * @param int aProductoIdProducto
	 * @ParamType aProductoIdProducto int
	 */
	public function setProductoIdProducto($aProductoIdProducto) {
		$this->_productoIdProducto = $aProductoIdProducto;
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
	public function getProductoIdProducto() {
		return $this->_productoIdProducto;
	}
}
?>