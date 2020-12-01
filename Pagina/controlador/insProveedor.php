<?php 
	require_once '../modelo/proveedor.php';

	$prov = new Proveedor();
	$prov->crearProveedor('',$_POST['nEmpresa'],$_POST['cNombre'],$_POST['cApellido'],$_POST['cCelular'],$_POST['eTelefono'],$_POST['USUARIO_documento'],$_POST['ESTADO_idEstado']);
	var_export($prov);


 ?>