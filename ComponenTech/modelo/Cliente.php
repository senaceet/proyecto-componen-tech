<?php
require_once('Usuario.php');
/**
 * @access public
 * @author Marlon, Yeren, Jhon, Kevin
 */
class Cliente extends Usuario {

	public function getClientes($startpage,$limitpage,$estado){
		$data = new stdClass();
		if($estado == 9|| $estado == 10)
			$sql = "SELECT documento,nombres,apellidos,fechaNto, edad, celular, direccion, correo, estado, idEstado FROM usuario, estado WHERE (CARGO_idCargo=3 and ESTADO_idEStado = $estado) and idEstado = ESTADO_idEstado limit $startpage,$limitpage";
		else
		$sql = "SELECT documento,nombres,apellidos,fechaNto, edad, celular, direccion, correo, estado, idEstado FROM usuario,estado WHERE CARGO_idCargo=3 and idEstado = ESTADO_idEstado  limit $startpage,$limitpage";
		$cn = conectar();
		$res = $cn->query($sql);
		
		if($cn->error){   
			$data->error=true;
			$data->msg=$cn->error;
		} else {
			$data->data=[];
			while ($user = $res->fetch_object()) {
				array_push($data->data,$user);
			}
			$data->count = $this->count($estado);
		}
		$cn->close();

		return $data;
	}

	public function getCliente($id){
		$data = new stdClass();
		$sql = "SELECT documento,nombres,apellidos,fechaNto, edad, celular, direccion, correo, estado, idEstado FROM usuario, estado WHERE (CARGO_idCargo=3 and documento = $id) and idEstado = ESTADO_idEstado ";
		$cn = conectar();
		$res = $cn->query($sql);
		
		if($cn->error){   
			$data->error=true;
			$data->msg=$cn->error;
		} else {
			$data->data = $res->fetch_object();
		}
		$cn->close();

		return $data;
	}

	
	public function count($estado){
		if($estado == 9|| $estado == 10)
			$sql = "SELECT count(*) as c FROM usuario WHERE CARGO_idCargo=3 and ESTADO_idEStado = $estado";
		else
		$sql = "SELECT count(*) as c FROM usuario WHERE CARGO_idCargo=3";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		$res = $res->fetch_array();
		return $res['c'];
	}


	public function getClientesBusqueda($s,$estado){
		if($estado == 9|| $estado == 10)
			$sql = "SELECT * FROM usuario,estado WHERE (documento like '%$s%' or nombres like '%$s%' or apellidos like '%$s%' or fechaNto like '%$s%' or edad like '%$s%' or celular like '%$s%' or direccion like '%$s%' or correo like '%$s%') and (CARGO_idCargo=3 and ESTADO_idEStado = $estado) and idEstado=Estado_idEstado";
		else
			$sql = "SELECT * FROM usuario,estado WHERE (documento like '%$s%' or nombres like '%$s%' or apellidos like '%$s%' or fechaNto like '%$s%' or edad like '%$s%' or celular like '%$s%' or direccion like '%$s%' or correo like '%$s%') and CARGO_idCargo=3 and idEstado=Estado_idEstado";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function getReportexFecha($id,$fecha){
		$res = new stdClass();

		$sql = "SELECT idProducto,productoNombre,cantidad,fecha,precio 
				from producto,detalles,factura,usuario
				where (PRODUCTO_idProducto = idProducto and idFactura = FACTURA_idFactura and documento=USUARIO_documento)
				and USUARIO_documento = '$id' and fecha>='$fecha' ";

		$sqlUsuario = "select * from usuario where documento = '$id'";
		
		
		$cn = conectar();

	
		$usuario = $cn->query($sqlUsuario);
		$usuario = $usuario->fetch_object();

		$resultado = $cn->query($sql);

		$res->data = [];
		$res->user = $usuario;	
      
		while($producto = $resultado->fetch_object()){
			array_push($res->data,$producto);
		}

		$cn->close();

		return $res;

	}

	public function getClientesDesac($startpage,$limitpage){
		$sql = "SELECT * FROM usuario WHERE CARGO_idCargo=3 and ESTADO_idEStado = 10 limit $startpage,$limitpage";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function getClientesDesacCantidad(){
		$sql = "SELECT count(*) as c FROM usuario WHERE CARGO_idCargo=3 and ESTADO_idEStado = 10";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		$res = $res->fetch_array();
		return $res['c'];
	}


	public function getClientesDesacBusqueda($s){
		$sql = "SELECT * FROM usuario WHERE (documento like '%$s%' or nombres like '%$s%' or apellidos like '%$s%' or fechaNto like '%$s%' or edad like '%$s%' or celular like '%$s%' or direccion like '%$s%' or correo like '%$s%') and (CARGO_idCargo=3 and ESTADO_idEStado = 10)";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function getReporteCliente($id){
        $res = new stdClass();

		$sql = "SELECT idProducto,productoNombre,cantidad,fecha,precio 
				from producto,detalles,factura
				where (PRODUCTO_idProducto = idProducto and idFactura = FACTURA_idFactura)
				and USUARIO_documento = '$id' ORDER BY fecha DESC";

		$sqlUsuario = "select * from usuario where documento = '$id'";
		
		
		$cn = conectar();

		$usuario = $cn->query($sqlUsuario);
		$usuario = $usuario->fetch_object();

		$resultado = $cn->query($sql);

		$res->data = [];
		$res->user = $usuario;	

		while($producto = $resultado->fetch_object()){
			array_push($res->data,$producto);
		}

		$cn->close();

		return $res;
		
	}

}
?>