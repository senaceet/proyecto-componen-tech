<?php 
require_once '../modelo/Inventario.php';
require_once '../modelo/Movimiento.php';
$inv = new Inventario();

$ruta = 'location:../vista/administracion.php?sec=inventario';
if ($_POST['entradas']>$_POST['salidas']) {

	if($inv->actualizar($_POST['entradas'],$_POST['salidas'],$_POST['prod'])){
		$objMov = new Movimiento();
		$cant = $_POST['entradas'] - $_POST['entradasAnterior'];

		$objMov->crearMovimiento(0,date('Y-m-d'), $cant, 3, $_POST['prod'],'null');

		if ($objMov->insertar()) {
			$ruta = 'location:../vista/administracion.php?sec=inventario&m=1';
		} else {
			$ruta = 'location:../vista/administracion.php?sec=inventario&m=2';
		}


		
	} else {
		$ruta = 'location:../vista/administracion.php?sec=inventario&m=2';
	}

	if (isset($_POST['c'])) {
		$ruta = $ruta."&c=".$_POST['c'];
	}
} else {
	$ruta = $ruta."&m=3";
}
header($ruta);
 ?>
