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

        $desde = 0;
        $hasta = 0;

        if(isset($_GET['desde'])) $desde = $_GET['desde'];
        if(isset($_GET['hasta'])) $hasta = $_GET['hasta'];

        // echo $desde. " " .$hasta;
        if($desde != '0' || $hasta != '0' ){
            $data = $objMovimiento->getMovimientoDate($desde,$hasta);
        } else {
            $data = $objMovimiento->getMovimiento($limit, $offset);
        }

        echo json_encode($data);
        break;

    case 'search':
        $objMovimiento = new Movimiento();
        $data = $objMovimiento->search($_GET['text']); 
        echo json_encode($data);
        break;
    
    default:
        echo "{}";
        break;
}