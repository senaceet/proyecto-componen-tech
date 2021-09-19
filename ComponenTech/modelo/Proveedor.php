<?php 
require_once '../controlador/cn.php';
class Proveedor{

    private $idProveedor;
    private $nEmpresa;
    private $cNombre;
    private $cApellido;
    private $cCelular;
    private $eTelefono;
    private $USUARIO_documento;
    private $ESTADO_idEstado;


    public function crearProveedor($idProveedor,$nEmpresa,$cNombre,$cApellido,$cCelular,$eTelefono,$ESTADO_idEstado){
        $this->idProveedor = $idProveedor;
		$this->nEmpresa = $nEmpresa;
		$this->cNombre = $cNombre;
		$this->cApellido = $cApellido;
		$this->cCelular = $cCelular;
		$this->eTelefono = $eTelefono;
		$this->ESTADO_idEstado = $ESTADO_idEstado;
    }

    public function actualizar() {
		$data = new stdClass();

		$sql = "UPDATE proveedor SET idProveedor='$this->idProveedor', nEmpresa='$this->nEmpresa', 
        cNombre='$this->cNombre', cApellido='$this->cApellido', cCelular='$this->cCelular', eTelefono='$this->eTelefono' 
		WHERE idProveedor = '$this->idProveedor'";
		$cn = conectar();
		$res = $cn->query($sql);

		if($res){
			$data->status = true;
			$data->message = "proveedor actualizado";
		}else{
			$data->status = false;
			$data->message = $cn->error;
		}

		$cn->close();
		return $data;
    }

    public function insertar(){
    	$sql = "INSERT INTO proveedor values ('$this->idProveedor','$this->nEmpresa', '$this->cNombre', '$this->cApellido', '$this->cCelular', '$this->eTelefono', '$this->ESTADO_idEstado')";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function desactivar($p){
		$data = new stdClass();
    	$sql = "UPDATE proveedor set ESTADO_idEstado = 5 where idProveedor=$p";
		$cn = conectar();
		echo $cn->error;
		$res = $cn->query($sql);
		if($res){
			$data->status = true;
			$data->message = "Proveedor desactivado";
		} else {
			$data->status = false;
			$data->message = $cn->error;
		}
		$cn->close();
		return $data;
	}
	
	public function activar($p){
		$data = new stdClass();
    	$sql = "UPDATE proveedor set ESTADO_idEstado = 4 where idProveedor=$p";
		$cn = conectar();
		echo $cn->error;
		$res = $cn->query($sql);
		if($res){
			$data->status = true;
			$data->message = "Proveedor activado";
		} else {
			$data->status = false;
			$data->message = $cn->error;
		}
		$cn->close();
		return $data;
	}

	public function getProveedor($p){
		$data = new stdClass();
		$sql = "SELECT * FROM proveedor where idproveedor = $p";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		if($res){
			$data->status = true;
			$data->data = $res->fetch_object();
		} else {
			$data->status = false;
			$data->data = "No existe el usuario";
		}
		$res = $res->fetch_array();
		return $data;
	}

	public function getCount($estado){
		if($estado == 0){
			$sql = "SELECT count(*) as c FROM proveedor";
		} else {
			$sql = "SELECT count(*) as c FROM proveedor where ESTADO_idEstado=$estado";
		}
		
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		$res = $res->fetch_array();
		return $res['c'];
	}
    
    public function getProveedores($limit,$offset,$estado){
		if($estado == 4 || $estado == 5)
			if($limit == 0)
				$sql = "SELECT idProveedor, nEmpresa, cNombre, cApellido, cCelular, eTelefono, estado, idEstado FROM proveedor,estado 
				where proveedor.ESTADO_idEstado=estado.idEstado and ESTADO_idEstado = $estado ";
			else
				$sql = "SELECT idProveedor, nEmpresa, cNombre, cApellido, cCelular, eTelefono, estado, idEstado FROM proveedor,estado 
				where proveedor.ESTADO_idEstado=estado.idEstado and ESTADO_idEstado = $estado limit $offset,$limit";
			
		else{
			if($limit == 0)
				$sql = "SELECT idProveedor, nEmpresa, cNombre, cApellido, cCelular, eTelefono, estado, idEstado FROM proveedor,estado 
				where proveedor.ESTADO_idEstado=estado.idEstado ";
			else
				$sql = "SELECT idProveedor, nEmpresa, cNombre, cApellido, cCelular, eTelefono, estado, idEstado FROM proveedor,estado 
				where proveedor.ESTADO_idEstado=estado.idEstado limit $offset,$limit";
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

	// public function getProveedoresActivos($text,$estado){
	// 	$sql = "SELECT * FROM proveedor where ESTADO_idEstado = 4";
	// 	$cn = conectar();
	// 	$res = $cn->query($sql);
	// 	$cn->close();
	// 	return $res;
	// }
	public function getProveedoresSearch($text,$estado){
		if($estado == 4 || $estado == 5)
			$sql = "SELECT idProveedor, nEmpresa, cNombre, cApellido, cCelular, eTelefono, estado FROM proveedor,estado 
				where proveedor.ESTADO_idEstado=estado.idEstado and ESTADO_idEstado = $estado and (nEmpresa like '%$text%' or cNombre like '%$text%' or cApellido like '%$text%' or cCelular like '%$text%' or eTelefono like '%$text%')";
			
		else{
			$sql = "SELECT idProveedor, nEmpresa, cNombre, cApellido, cCelular, eTelefono, estado FROM proveedor,estado 
				where proveedor.ESTADO_idEstado=estado.idEstado and (nEmpresa like '%$text%' or cNombre like '%$text%' or cApellido like '%$text%' or cCelular like '%$text%' or eTelefono like '%$text%')";
			
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

}


?>
