<?php
require_once(realpath(dirname(__FILE__)) . '/Factura.php');

use Factura;

/**
 * @access public
 * @author Marlon, Yeren, Jhon, Kevin
 */
class Pedidos {
	/**
	 * @AttributeType int
	 */
	private $_idPedido;
	/**
	 * @AttributeType string
	 */
	private $_pedidoFecha;
	/**
	 * @AttributeType int
	 */
	private $_total;
	/**
	 * @AttributeType int
	 */
	private $_usuarioDocumento;
	/**
	 * @AttributeType int
	 */
	private $_idProveedor;
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
	 *  * @param int aIdPedido
	 *  * @ParamType aIdPedido int
	 *  * /
	 * @access public
	 * @param int aIdPedido
	 * @ParamType aIdPedido int
	 */
	public function setIdPedido($aIdPedido) {
		$this->_idPedido = $aIdPedido;
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
	public function getIdPedido() {
		return $this->_idPedido;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param string aPedidoFecha
	 *  * @ParamType aPedidoFecha string
	 *  * /
	 * @access public
	 * @param string aPedidoFecha
	 * @ParamType aPedidoFecha string
	 */
	public function setPedidoFecha($aPedidoFecha) {
		$this->_pedidoFecha = $aPedidoFecha;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @return string
	 *  * @ReturnType string
	 *  * /
	 * @access public
	 * @return string
	 * @ReturnType string
	 */
	public function getPedidoFecha() {
		return $this->_pedidoFecha;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aTotal
	 *  * @ParamType aTotal int
	 *  * /
	 * @access public
	 * @param int aTotal
	 * @ParamType aTotal int
	 */
	public function setTotal($aTotal) {
		$this->_total = $aTotal;
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
	public function getTotal() {
		return $this->_total;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aUsuarioDocumento
	 *  * @ParamType aUsuarioDocumento int
	 *  * /
	 * @access public
	 * @param int aUsuarioDocumento
	 * @ParamType aUsuarioDocumento int
	 */
	public function setUsuarioDocumento($aUsuarioDocumento) {
		$this->_usuarioDocumento = $aUsuarioDocumento;
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
	public function getUsuarioDocumento() {
		return $this->_usuarioDocumento;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aIdProveedor
	 *  * @ParamType aIdProveedor int
	 *  * /
	 * @access public
	 * @param int aIdProveedor
	 * @ParamType aIdProveedor int
	 */
	public function setIdProveedor($aIdProveedor) {
		$this->_idProveedor = $aIdProveedor;
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
	public function getIdProveedor() {
		return $this->_idProveedor;
	}
}
?>