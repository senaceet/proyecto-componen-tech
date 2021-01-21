<?php 
	require_once '../modelo/proveedor.php';

	$prov = new Proveedor();
	$prov->crearProveedor(0,$_POST['nEmpresa'],$_POST['cNombre'],$_POST['cApellido'],$_POST['cCelular'],$_POST['eTelefono'],$_POST['idEstado']);
	
	var_export($prov);
	$ins = $prov->insertar();
	
	if($ins){
		header('location: ../vista/administracion.php?sec=proveedores&m=1');
	} else {
		echo $ins->error;
	}


 ?>