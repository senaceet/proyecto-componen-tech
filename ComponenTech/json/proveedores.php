<?php 


session_start();
if (!$_SESSION['user']) {
	header('location:../index.php');
}
if ($_SESSION['user']->CARGO_idCargo==3) {
	header('location:../index.php');
}


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
    case 'get1':
        $objProveedor = new Proveedor();
        
        $data = $objProveedor->getProveedor($_GET['id']);

        echo json_encode($data);
        
        break;

    case 'add':
        $proveedor = new Proveedor();

        $data = new stdClass();

        $proveedor->crearProveedor(0,$_POST['nEmpresa'],$_POST['cNombre'],$_POST['cApellido'],$_POST['cCelular'],$_POST['eTelefono'],5);
        $res = $proveedor->insertar();

        if($res){
            $data->status = true;
            $data->message = "Provedor insertado correctamente";
        }else {
            $data->status = false;
            $data->message = "Error al insertar proveedor";
        }

        echo json_encode($data);
        break;

    case 'search':
        $objProveedor = new Proveedor();
   
        $data = $objProveedor->getProveedoresSearch($_GET['text'],$_GET['estado']);
        
        echo json_encode($data);
        break;

    case 'delete':
        $objProveedor = new Proveedor();
   
        $data = $objProveedor->desactivar($_POST['id']);
        
        echo json_encode($data);
        break;

    case 'restore':
        $objProveedor = new Proveedor();
   
        $data = $objProveedor->activar($_POST['id']);
        
        echo json_encode($data);
        break;

    case 'edit':
        $proveedor = new Proveedor();
   
        $proveedor->crearProveedor($_POST['idProveedor'],$_POST['nEmpresa'],$_POST['cNombre'],$_POST['cApellido'],$_POST['cCelular'],$_POST['eTelefono'],0);
        $data = $proveedor->actualizar();

    
        echo json_encode($data);
        break;

    default:
        echo "{}";
        break;
}