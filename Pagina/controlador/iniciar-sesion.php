<?php 
	session_start();
	require_once '../modelo/usuario.php';
	$usuario = new Usuario();
	$inicio = $usuario->iniciarSesion($_POST['correo'],$_POST['clave']);
	
	$con_usuario = $usuario->getUsuario($_POST['correo'],2);
	if ($con_usuario->num_rows == 1) {
		$con_usuario = $con_usuario->fetch_array();

		if ($inicio->num_rows===1) {
			$_SESSION['user'] = $con_usuario;
			header('location:../vista/principal.php');
		} else{
			header('location:../index.php?m=7&r=1');
		}
	} else {
		header('location:../index.php?m=8&r=1');
	}

	
 ?> 