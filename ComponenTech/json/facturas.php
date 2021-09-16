<?php 

session_start();
if (!$_SESSION['user']) {
	header('location:../index.php');
}
if ($_SESSION['user']->CARGO_idCargo==3) {
	header('location:../index.php');
}

require_once '../modelo/Factura.php';
switch ($_GET['action']) {
    case 'get':
        $objFactura = new Factura();
        $limit = 10; $offset = 0; $estado = 0;
        if(isset($_GET['limit'])) $limit = $_GET['limit'];
        if(isset($_GET['offset'])) $offset = $_GET['offset'];
        if(isset($_GET['estado'])) $estado = $_GET['estado'];
        
        $data = $objFactura->getFacturas($limit, $offset,$estado);

        echo json_encode($data);
        break;
    
    default:
        echo "{}";
        break;
}