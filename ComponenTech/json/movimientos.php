<?php 
require_once '../modelo/Movimiento.php';
switch ($_GET['action']) {
    case 'get':
        $objMovimiento = new Movimiento();
        $limit = 10; $offset = 0; $estado = 0;
        if(isset($_GET['limit'])) $limit = $_GET['limit'];
        if(isset($_GET['offset'])) $offset = $_GET['offset'];
        
        $data = $objMovimiento->getMovimiento($limit, $offset);

        echo json_encode($data);
        break;
    
    default:
        echo "{}";
        break;
}