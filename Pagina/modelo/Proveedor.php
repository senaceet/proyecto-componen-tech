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


    public function crearProveedor($idProveedor,$nEmpresa,$cNombre,$cApellido,$cCelular,$eTelefono,$USUARIO_documento,$ESTADO_idEstado){
        $this->idProveedor = $idProveedor;
		$this->nEmpresa = $nEmpresa;
		$this->cNombre = $cNombre;
		$this->cApellido = $cApellido;
		$this->cCelular = $cCelular;
		$this->eTelefono = $eTelefono;
		$this->USUARIO_documento = $USUARIO_documento;
		$this->Estado_idEstado = $Estado_idEstado;
    }

    public function actualizarDatos($id) {
		$sql = "UPDATE proveedor SET idProveedor='$this->$idProveedor', nEmpresa='$this->$nEmpresa', 
        cNombre='$this->$cNombre', cApellido='$this->$cApellido', cCelular='$this->$cCelular', eTelefono='$this->$eTelefono', 
        ESTADO_idEstado='$this->$ESTADO_idEstado' WHERE idProveedor = '$id'";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
    }

    public function insertar(){
    	$sql = "INSERT INTO proveedor values ('$this->$idProveedor','$this->$nEmpresa', '$this->$cNombre', '$this->$cApellido', '$this->$cCelular', '$this->$eTelefono', '$this->$ESTADO_idEstado')";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
    }
    
    public function getProveedores(){
		$sql = "SELECT idProveedor, nEmpresa, cNombre, cApellido, cCelular, eTelefono, estado FROM proveedor,estado where proveedor.ESTADO_idEstado=estado.idEstado";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function getProveedoresActivos(){
		$sql = "SELECT * FROM proveedor where ESTADO_idEstado = 4";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}
	public function getProveedoresSearch($s){
		$sql = "SELECT idProveedor, nEmpresa, cNombre, cApellido, cCelular, eTelefono, estado FROM proveedor,estado where (proveedor.ESTADO_idEstado=estado.idEstado) and (idProveedor like '%$s%' or nEmpresa like '%$s%' or cNombre like '%$s%' or cApellido like '%$s%' or cCelular like '%$s%' or eTelefono like '%$s%' or estado like '%$s%')";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

}


?>
