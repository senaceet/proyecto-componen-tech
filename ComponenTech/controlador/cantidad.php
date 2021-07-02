<?php 
	session_start();

	$id = $_POST['id'];
	$cant = $_POST['cant'];

	$_SESSION['carrito'][$id]['cantidad'] = $cant;



 ?>