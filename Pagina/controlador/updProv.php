<?php 
require_once '../modelo/proveedor.php';
$objProv = new Proveedor();


$objProv->crearProveedor($_POST['idProv'],$_POST['nEmpresa'],$_POST['cNombre'],$_POST['cApellido'],$_POST['cCelular'],$_POST['eTelefono'],$_POST['estado']);

if($objProv->actualizar()){
	header('location: ../vista/administracion.php?sec=proveedores&m=3');
}else{
	header('location: ../vista/administracion.php?sec=proveedores&m=4');
}


?>