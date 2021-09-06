<?php 
require_once '../modelo/Operador.php';
switch ($_GET['action']) {
    case 'get':
        $objOperador = new Operador();
        $limit = 0; $offset = 0; $estado = 0;
        if(isset($_GET['limit'])) $limit = $_GET['limit'];
        if(isset($_GET['offset'])) $offset = $_GET['offset'];
        if(isset($_GET['estado'])) $estado = $_GET['estado'];
        
        $data = $objOperador->getOperador($limit, $offset, $estado);

        echo json_encode($data);
        break;

    case 'search':
        $objOperador = new Operador();
        $data = $objOperador->getOperadoresBusqueda($_GET['text'],$_GET['estado']);

        echo json_encode($data);
        break;

    
    default:
        # code...
        break;
}