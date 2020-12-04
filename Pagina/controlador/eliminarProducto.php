<?php 
	require_once '../modelo/producto.php';
	$producto = new Producto();

	$foto = $producto->getProducto($_GET['prod']);
	$foto = $foto->fetch_array();
	$foto = $foto['prodImg'];

	if ($producto->eliminar($_GET['prod'])) {
		unlink($foto);
		header('location:../vista/administracion.php?sec=productos&m=1');
	} else {
		header('location:../vista/administracion.php?sec=productos&m=2');
	}
 ?>