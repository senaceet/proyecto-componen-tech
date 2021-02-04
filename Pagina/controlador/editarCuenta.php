<?php 

session_start();
if (!$_SESSION['user']) {
	header('location:principal.php');
}
require_once '../modelo/Usuario.php';
$Usuario = new Usuario();


if (isset($_POST['uptDatos'])) {


	$datos['nombres'] = $_POST['nombres'];
	$datos['apellidos'] = $_POST['apellidos'];
	$datos['fechaNto']  = $_POST['fechaNto'];
	$datos['edad'] = $_POST['edad'];
	$datos['celular'] = $_POST['celular'];
	$datos['direccion']  = $_POST['direccion'];

	if($Usuario->modificar($_SESSION['user']['documento'],$datos)){
		$u = $Usuario->getUsuario($_SESSION['user']['documento'],1);
		$u = $u->fetch_array();
		$_SESSION['user'] = $u;
		header('location:../vista/cuenta.php?m=1');
	} else {
		//header('location:../vista/cuenta.php?m=2');
	}
}
if(isset($_POST['uptClave'])){
	if ($_POST['clave']===$_POST['clave2']) {
		if ($Usuario->cambiarClave($_SESSION['user']['correo'],$_POST['clave'])) {
			header('location:../vista/cuenta.php?m=3');
		}else{
			header('location:../vista/cuenta.php?m=4');
		}
	} else {
		header('location:../vista/cuenta.php?m=5');
	}
}

 ?>