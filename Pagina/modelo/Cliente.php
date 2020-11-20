<?php
require_once(realpath(dirname(__FILE__)) . '/Factura.php');
require_once('/Usuarios.php');
use Usuarios;

/**
 * @access public
 * @author Marlon, Yeren, Jhon, Kevin
 */
class Cliente extends Usuarios {
	/**
	 * @AttributeType Factura
	 * /**
	 *  * @AssociationType Factura
	 *  * /
	 */
	public $_unnamed_Factura_;

	/**
	 * @access public
	 */
	public function SeleccionarProducto() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function DeseleccionarProducto() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @return boolean
	 * @ReturnType boolean
	 */
	public function Comprar() {
		// Not yet implemented
	}
}
?>