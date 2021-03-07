<?php 
	require_once '../modelo/Usuario.php';

	$usuario = new Usuario();
	$r=$usuario->activar($_POST['documento']);

	if ($r==1) {
		$m=8;
	}else{
		$m=9;
	}
	header('location:../vista/administracion.php?sec='.$_POST['tabla'].'&m='.$m);

 ?>