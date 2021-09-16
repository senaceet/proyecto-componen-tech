<?php 


session_start();
if (!$_SESSION['user']) {
	header('location:../index.php');
}
if ($_SESSION['user']->CARGO_idCargo==3) {
	header('location:../index.php');
}

require_once '../modelo/Movimiento.php';
switch ($_GET['action']) {
    case 'get':
        $objMovimiento = new Movimiento();
        $limit = 10; $offset = 0; $estado = 0;   $desde=0;$hasta=0;
        if(isset($_GET['limit'])) $limit = $_GET['limit'];
        if(isset($_GET['offset'])) $offset = $_GET['offset'];
        
        $data = $objMovimiento->getMovimiento($limit, $offset, $desde,$hasta);

        echo json_encode($data);
        break;
    
    default:
        echo "{}";
        break;
}