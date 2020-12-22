<?php
require_once('Usuario.php');

/**
 * @access public
 * @author Marlon, Yeren, Jhon, Kevin
 */
class Operador extends Usuario {
	
	public function getOperadores($startpage,$limitpage){
		$sql = "SELECT * FROM usuario WHERE CARGO_idCargo=2 ESTADO_idEStado = 9 limit $startpage,$limitpage";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function getOperadoresCantidad(){
		$sql = "SELECT count(*) as c FROM usuario WHERE CARGO_idCargo=2";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		$res = $res->fetch_array();
		return $res['c'];
	}

	public function getOperadoresBusqueda($s){
		$sql = "SELECT * FROM usuario WHERE (documento like '%$s%' or nombres like '%$s%' or apellidos like '%$s%' or fechaNto like '%$s%' or edad like '%$s%' or celular like '%$s%' or direccion like '%$s%' or correo like '%$s%') and (CARGO_idCargo=2 and ESTADO_idEStado = 9)";
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