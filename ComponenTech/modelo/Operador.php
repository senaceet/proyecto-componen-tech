<?php
require_once('Usuario.php');

/**
 * @access public
 * @author Marlon, Yeren, Jhon, Kevin
 */ 
class Operador extends Usuario {
	
	public function getOperadores($startpage,$limitpage){
		$sql = "SELECT * FROM usuario WHERE CARGO_idCargo=2 and ESTADO_idEStado = 9 limit $startpage,$limitpage";
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

	public function getOperadoresBusqueda($text,$estado){
		if($estado == 10 || $estado == 9)
			$sql =" SELECT documento, nombres, apellidos, fechaNto, edad, celular, direccion, correo, estado, cargo FROM usuario, cargo, estado where (CARGO_idCargo!=3 AND ESTADO_idEstado = idEstado AND CARGO_idCargo = idCargo) and 
			(
				documento like '%$text%' or nombres like '%$text%' or apellidos like '%$text%' or edad like '%$text%' or celular like '%$text%' or direccion like '%$text%' or correo like '%$text%'
			)and ESTADO_idEstado = $estado";
		else{
			$sql =" SELECT documento, nombres, apellidos, fechaNto, edad, celular, direccion, correo, estado, cargo FROM usuario, cargo, estado where (CARGO_idCargo!=3 AND ESTADO_idEstado = idEstado AND CARGO_idCargo = idCargo) and 
			(
				documento like '%$text%' or nombres like '%$text%' or apellidos like '%$text%' or edad like '%$text%' or celular like '%$text%' or direccion like '%$text%' or correo like '%$text%'
			) ";
		}
		
		$cn = conectar();
		$res = $cn->query($sql);

		$data = new stdClass();
		$data->data=[];

		$data->count=$this->getCount($estado);

		while($value = $res->fetch_object()) {
			array_push($data->data,$value);
		}
		
		$cn->close();
		return $data;
		
	}
	

	public function getCount($estado){
		if($estado == 0){
			$sql = "SELECT count(*) as c FROM usuario WHERE CARGO_idCargo!=3";
		} else {
			$sql = "SELECT count(*) as c FROM usuario where ESTADO_idEstado=$estado AND CARGO_idCargo!=3 ";
		}
		
		$cn = conectar();
		$res = $cn->query($sql);
	    

		$cn->close();
		$res = $res->fetch_array();
		return $res['c'];
	}

	public function getOperador($limit,$offset,$estado){
		if($estado == 10 || $estado == 9)
			if($limit == 0)
				$sql =" SELECT documento, nombres, apellidos, fechaNto, edad, celular, direccion, correo, estado, cargo FROM usuario, cargo, estado where (CARGO_idCargo!=3 AND ESTADO_idEstado = idEstado AND ESTADO_idEstado = $estado AND CARGO_idCargo = idCargo)";
			else
				$sql =" SELECT documento, nombres, apellidos, fechaNto, edad, celular, direccion, correo, estado, cargo FROM usuario, cargo, estado where (CARGO_idCargo!=3 AND ESTADO_idEstado = idEstado AND ESTADO_idEstado = $estado AND CARGO_idCargo = idCargo)limit $offset, $limit";
			
		else{
			if ($limit == 0)
				$sql =" SELECT documento, nombres, apellidos, fechaNto, edad, celular, direccion, correo, estado, cargo FROM usuario, cargo, estado where (CARGO_idCargo!=3 AND ESTADO_idEstado = idEstado AND CARGO_idCargo = idCargo)";
			else
				$sql =" SELECT documento, nombres, apellidos, fechaNto, edad, celular, direccion, correo, estado, cargo FROM usuario, cargo, estado where (CARGO_idCargo!=3 AND ESTADO_idEstado = idEstado AND CARGO_idCargo = idCargo)limit $offset, $limit";
			}
		$cn = conectar();
		$res = $cn->query($sql);

		$data = new stdClass();
		$data->data=[];

		$data->count=$this->getCount($estado);

		while($value = $res->fetch_object()) {
			array_push($data->data,$value);
		}
		
		$cn->close();
		return $data;
	}
	

	public function ModificarProducto() {
		// Not yet implemented
	}
}
?>