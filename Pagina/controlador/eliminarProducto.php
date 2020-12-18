<?php 
	require_once '../modelo/producto.php';
	$producto = new Producto();

	$foto = $producto->getProducto($_POST['prod']);
	$foto = $foto->fetch_array();
	$foto = $foto['prodImg'];

	if ($producto->eliminar($_POST['prod'])) {
		unlink($foto);
		header('location:../vista/administracion.php?sec=productos&m=3');
	} else {
		header('location:../vista/administracion.php?sec=productos&m=4');
	}
 ?>