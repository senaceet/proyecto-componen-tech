<?php 
require_once '../modelo/Inventario.php';
switch ($_GET['action']) {

    case 'get':
        $objInventario = new Inventario();
        $limit = 10; $offset = 0; $estado = 0;
        if(isset($_GET['limit'])) $limit = $_GET['limit'];
        if(isset($_GET['offset'])) $offset = $_GET['offset'];
        if(isset($_GET['estado'])) $estado = $_GET['estado'];
        
        $data = $objInventario->getInventario($limit, $offset, $estado);

        echo json_encode($data);
        break;

    case 'reporte':
        $objInventario = new Inventario();
        $id = $_GET['id'];
        $data = $objInventario->getReporteIventario($id);

        echo json_encode($data);
        break;


    default:
        echo "{}";
        break;


        
}