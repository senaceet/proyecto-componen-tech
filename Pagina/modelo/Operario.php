<?php
require_once(realpath(dirname(__FILE__)) . '/Producto.php');
require_once(realpath(dirname(__FILE__)) . '/Usuarios.php');

use Producto;
use Usuarios;

/**
 * @access public
 * @author Marlon, Yeren, Jhon, Kevin
 */
class Operario extends Usuarios {
	/**
	 * @AttributeType Producto
	 * /**
	 *  * @AssociationType Producto
	 *  * /
	 */
	public $_unnamed_Producto_;

	/**
	 * @access public
	 * @return boolean
	 * @ReturnType boolean
	 */
	public function InsertarProducto() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @return boolean
	 * @ReturnType boolean
	 */
	public function ModificarProducto() {
		// Not yet implemented
	}
}
?>