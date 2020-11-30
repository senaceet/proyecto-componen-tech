<?php
require_once('Usuario.php');

/**
 * @access public
 * @author Marlon, Yeren, Jhon, Kevin
 */
class Operador extends Usuario {
	/**
	 * @AttributeType Producto
	 * /**
	 *  * @AssociationType Producto
	 *  * /
	 */
	public function getOperadores(){
		$sql = "SELECT * FROM usuario WHERE CARGO_idCargo=2 AND ESTADO_idEstado = 9";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

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