<?php 
	require_once '../modelo/usuario.php';

	$usuario = new Usuario();
	$r=$usuario->desactivar($_POST['documento']);

	if ($r==1) {
		$m=8;
	}else{
		$m=9;
	}
	header('location:../vista/administracion.php?sec='.$_POST['tabla'].'&m='.$m);

 ?>