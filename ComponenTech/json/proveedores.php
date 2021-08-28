<?php
require_once '../modelo/Proveedor.php';
switch ($_GET['action']) {
    case 'get':
        $objProveedor = new Proveedor();
        $limit = 0; $offset = 0; $estado = 0;
        if(isset($_GET['limit'])) $limit = $_GET['limit'];
        if(isset($_GET['offset'])) $offset = $_GET['offset'];
        if(isset($_GET['estado'])) $estado = $_GET['estado'];
        
        $data = $objProveedor->getProveedores($limit, $offset, $estado);

        echo json_encode($data);
        break;
    
    default:
        # code...
        break;
}