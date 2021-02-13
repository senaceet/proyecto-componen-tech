<?php
require_once(realpath(dirname(__FILE__)) . '/Movimiento.php');
require_once(realpath(dirname(__FILE__)) . '/Producto.php');

use Movimiento;
use Producto;

/**
 * @access public
 * @author Marlon, Yeren, Jhon, Kevin
 */
class Inventario {
	/**
	 * @AttributeType int
	 */
	private $_idInventario;
	/**
	 * @AttributeType int
	 */
	private $_entradas;
	/**
	 * @AttributeType int
	 */
	private $_salidas;
	/**
	 * @AttributeType int
	 */
	private $_saldo;
	/**
	 * @AttributeType int
	 */
	private $_idProducto;
	/**
	 * @AttributeType Movimiento
	 * /**
	 *  * @AssociationType Movimiento
	 *  * /
	 */
	public $_unnamed_Movimiento_;
	/**
	 * @AttributeType Producto
	 * /**
	 *  * @AssociationType Producto
	 *  * /
	 */
	public $_unnamed_Producto_;

	/**
	 * /**
	 *  * @access public
	 *  * @param int aIdInventario
	 *  * @ParamType aIdInventario int
	 *  * /
	 * @access public
	 * @param int aIdInventario
	 * @ParamType aIdInventario int
	 */
	public function setIdInventario($aIdInventario) {
		$this->_idInventario = $aIdInventario;
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
	public function getIdInventario() {
		return $this->_idInventario;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aEntradas
	 *  * @ParamType aEntradas int
	 *  * /
	 * @access public
	 * @param int aEntradas
	 * @ParamType aEntradas int
	 */
	public function setEntradas($aEntradas) {
		$this->_entradas = $aEntradas;
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
	public function getEntradas() {
		return $this->_entradas;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aSalidas
	 *  * @ParamType aSalidas int
	 *  * /
	 * @access public
	 * @param int aSalidas
	 * @ParamType aSalidas int
	 */
	public function setSalidas($aSalidas) {
		$this->_salidas = $aSalidas;
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
	public function getSalidas() {
		return $this->_salidas;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aSaldo
	 *  * @ParamType aSaldo int
	 *  * /
	 * @access public
	 * @param int aSaldo
	 * @ParamType aSaldo int
	 */
	public function setSaldo($aSaldo) {
		$this->_saldo = $aSaldo;
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
	public function getSaldo() {
		return $this->_saldo;
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