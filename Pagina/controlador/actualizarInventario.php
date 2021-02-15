<?php 
require_once '../modelo/Inventario.php';
$inv = new Inventario();
if($inv->actualizar($_POST['entradas'],$_POST['salidas'],$_POST['prod'])){
	$ruta = 'location:../vista/administracion.php?sec=Inventario&m=1';
} else {
	$ruta = 'location:../vista/administracion.php?sec=Inventario&m=2';
}

if (isset($_POST['c'])) {
	$ruta = $ruta."&c=".$_POST['c'];
}
header($ruta);
 ?>
