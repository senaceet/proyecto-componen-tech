<?php
require_once('Usuario.php');
/**
 * @access public
 * @author Marlon, Yeren, Jhon, Kevin
 */
class Cliente extends Usuario {
	/**
	 * @access public
	 */

	public function getClientes(){
		$sql = "SELECT * FROM usuario WHERE CARGO_idCargo=3 AND ESTADO_idEstado = 9";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}
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