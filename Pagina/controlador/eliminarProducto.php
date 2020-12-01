<?php 
	require_once '../modelo/producto.php';
	$producto = new Producto();

	if ($producto->eliminar($_GET['prod'])) {
		header('location:../vista/administracion.php?sec=productos&m=1');
	} else {
		header('location:../vista/administracion.php?sec=productos&m=2');
	}
 ?>