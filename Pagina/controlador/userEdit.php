<?php 
	require_once '../modelo/usuario.php';

	$objUsuario = new Usuario();

	$objUsuario->crearUsuario($_POST['documento'],$_POST['nombres'],$_POST['apellidos'],$_POST['fechaNto'],$_POST['edad'],$_POST['celular'],$_POST['direccion'],$_POST['correo'],$_POST['idCargo'],$_POST['idTipo'],$_POST['idEstado']);
	var_export($objUsuario);
	echo $objUsuario->actualizarDatos($_POST['actDoc']);
 ?>