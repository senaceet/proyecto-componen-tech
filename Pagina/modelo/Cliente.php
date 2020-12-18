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

	public function getClientes($startpage,$limitpage){
		$sql = "SELECT * FROM usuario WHERE CARGO_idCargo=3 limit $startpage,$limitpage";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function getClientesCantidad(){
		$sql = "SELECT count(*) as c FROM usuario WHERE CARGO_idCargo=3";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		$res = $res->fetch_array();
		return $res['c'];
	}


	public function getClientesBusqueda($s){
		$sql = "SELECT * FROM usuario WHERE (documento like '%$s%' or nombres like '%$s%' or apellidos like '%$s%' or fechaNto like '%$s%' or edad like '%$s%' or celular like '%$s%' or direccion like '%$s%' or correo like '%$s%') and CARGO_idCargo=3";
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