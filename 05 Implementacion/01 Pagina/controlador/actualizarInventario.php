<?php 
require_once '../modelo/Inventario.php';
$inv = new Inventario();

$ruta = 'location:../vista/administracion.php?sec=Inventario';
if ($_POST['entradas']>$_POST['salidas']) {

	if($inv->actualizar($_POST['entradas'],$_POST['salidas'],$_POST['prod'])){
		$ruta = 'location:../vista/administracion.php?sec=Inventario&m=1';
	} else {
		$ruta = 'location:../vista/administracion.php?sec=Inventario&m=2';
	}

	if (isset($_POST['c'])) {
		$ruta = $ruta."&c=".$_POST['c'];
	}
} else {
	$ruta = $ruta."&m=3";
}
header($ruta);
 ?>
