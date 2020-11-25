<?php 
	require_once '../modelo/usuario.php';

	$objUsuario = new Usuario();

	$objUsuario->crearUsuario($_POST['documento'],$_POST['nombres'],$_POST['apellidos'],$_POST['fechaNto'],$_POST['edad'],$_POST['celular'],$_POST['direccion'],$_POST['correo'],$_POST['idCargo'],$_POST['idTipo'],$_POST['idEstado']);
	if($_POST['formulario']=='operador'){
		if ($objUsuario->actualizarDatos($_POST['actDoc'])) {
			header('location:../vista/administracion.php?sec=usuarios&m=3');
		} else {
			header('location:../vista/administracion.php?sec=usuarios&m=4');
		}
	} else {
		if ($objUsuario->actualizarDatos($_POST['actDoc'])) {
			header('location:../vista/administracion.php?sec=Operadores&m=3');
		} else {
			header('location:../vista/administracion.php?sec=Operaores&m=4');
		}
	} 
	
 ?> 