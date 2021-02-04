<?php 
	require_once '../modelo/Usuario.php';

	$objUsuario = new Usuario();

	if (empty($_POST['documento'])) {
		header('location:../vista/administracion.php');
	}

	$objUsuario->crearUsuario($_POST['documento'],$_POST['nombres'],$_POST['apellidos'],$_POST['fechaNto'],$_POST['edad'],$_POST['celular'],$_POST['direccion'],$_POST['correo'],$_POST['idCargo'],$_POST['idTipo'],$_POST['idEstado']);
	if($_POST['idCargo']==3){
		
		if ($objUsuario->actualizarDatos($_POST['actDoc'])) {
			header('location:../vista/administracion.php?sec=clientes&m=3');
		} else {
			header('location:../vista/administracion.php?sec=clientes&m=4');
		}
	} else {
		if ($objUsuario->actualizarDatos($_POST['actDoc'])) {
			header('location:../vista/administracion.php?sec=Operadores&m=3');
		} else {
			header('location:../vista/administracion.php?sec=Operadores&m=4');
		}
	} 
	
 ?> 