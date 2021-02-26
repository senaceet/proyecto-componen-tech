<?php
require_once(realpath(dirname(__FILE__)) . '/Detalles.php');
require_once(realpath(dirname(__FILE__)) . '/Cliente.php');
require_once(realpath(dirname(__FILE__)) . '/Pedidos.php');
require_once(realpath(dirname(__FILE__)) . '/Movimiento.php');
require_once(realpath(dirname(__FILE__)) . '/Orden.php');

use Detalles;
use Cliente;
use Pedidos;
use Movimiento;
use Orden;

/**
 * @access public
 * @author Marlon, Yeren, Jhon, Kevin
 */
class Factura {
	/**
	 * @AttributeType int
	 */
	private $_idFactura;
	/**
	 * @AttributeType string
	 */
	private $_fecha;
	/**
	 * @AttributeType float
	 */
	private $_subTotal;
	/**
	 * @AttributeType float
	 */
	private $_total;
	/**
	 * @AttributeType int
	 */
	private $_tipoPago;
	/**
	 * @AttributeType string
	 */
	private $_iddocumento;
	/**
	 * @AttributeType int
	 */
	private $_estado;
	/**
	 * @AttributeType Detalles
	 * /**
	 *  * @AssociationType Detalles
	 *  * /
	 */
	public $_unnamed_Detalles_;
	/**
	 * @AttributeType Cliente
	 * /**
	 *  * @AssociationType Cliente
	 *  * /
	 */
	public $_unnamed_Cliente_;
	/**
	 * @AttributeType Pedidos
	 * /**
	 *  * @AssociationType Pedidos
	 *  * /
	 */
	public $_unnamed_Pedidos_;
	/**
	 * @AttributeType Movimiento
	 * /**
	 *  * @AssociationType Movimiento
	 *  * /
	 */
	public $_unnamed_Movimiento_;
	/**
	 * @AttributeType Orden
	 * /**
	 *  * @AssociationType Orden
	 *  * /
	 */
	public $_unnamed_Orden_;

	/**
	 * @access public
	 * @return boolean
	 * @ReturnType boolean
	 */
	public function EntregarFactura() {
		// Not yet implemented
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
	 *  * @param string aFecha
	 *  * @ParamType aFecha string
	 *  * /
	 * @access public
	 * @param string aFecha
	 * @ParamType aFecha string
	 */
	public function setFecha($aFecha) {
		$this->_fecha = $aFecha;
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
	public function getFecha() {
		return $this->_fecha;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param float aSubTotal
	 *  * @ParamType aSubTotal float
	 *  * /
	 * @access public
	 * @param float aSubTotal
	 * @ParamType aSubTotal float
	 */
	public function setSubTotal($aSubTotal) {
		$this->_subTotal = $aSubTotal;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @return float
	 *  * @ReturnType float
	 *  * /
	 * @access public
	 * @return float
	 * @ReturnType float
	 */
	public function getSubTotal() {
		return $this->_subTotal;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param float aTotal
	 *  * @ParamType aTotal float
	 *  * /
	 * @access public
	 * @param float aTotal
	 * @ParamType aTotal float
	 */
	public function setTotal($aTotal) {
		$this->_total = $aTotal;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @return float
	 *  * @ReturnType float
	 *  * /
	 * @access public
	 * @return float
	 * @ReturnType float
	 */
	public function getTotal() {
		return $this->_total;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aTipoPago
	 *  * @ParamType aTipoPago int
	 *  * /
	 * @access public
	 * @param int aTipoPago
	 * @ParamType aTipoPago int
	 */
	public function setTipoPago($aTipoPago) {
		$this->_tipoPago = $aTipoPago;
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
	public function getTipoPago() {
		return $this->_tipoPago;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param string aIddocumento
	 *  * @ParamType aIddocumento string
	 *  * /
	 * @access public
	 * @param string aIddocumento
	 * @ParamType aIddocumento string
	 */
	public function setIddocumento($aIddocumento) {
		$this->_iddocumento = $aIddocumento;
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
	public function getIddocumento() {
		return $this->_iddocumento;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aEstado
	 *  * @ParamType aEstado int
	 *  * /
	 * @access public
	 * @param int aEstado
	 * @ParamType aEstado int
	 */
	public function setEstado($aEstado) {
		$this->_estado = $aEstado;
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
	public function getEstado() {
		return $this->_estado;
	}
}
?>