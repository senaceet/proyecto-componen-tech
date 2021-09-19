<?php 

session_start();
if (!$_SESSION['user']) {
	header('location:../index.php');
}
if ($_SESSION['user']->CARGO_idCargo==3) {
	header('location:../index.php');
}

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
        
    case 'get1':    
        $id = $_GET['id'];

        $objOperador = new Operador();

        $operador = $objOperador->getOperadorId($id);
  
        echo(json_encode($operador ));
        
        break;
        
    case 'add';
        $operador = new Operador();
        $operador->crearUsuario(
            $_POST['numerodocumento'],
            $_POST['nombres'],
            $_POST['apellidos'],
            $_POST['fnacimiento'],
            $_POST['edad'],
            $_POST['celular'],
            $_POST['direccion'],
            $_POST['correo'],
            2,
            $_POST['tipodocumento'],
            10,
            $_POST['pass1'] 
        );
        
        if ($_POST['pass1'] == $_POST['pass2']){
            $res = $operador->insertar();
            echo json_encode($res);
        } else echo '{"status":false,"error":"La constaseña es incorrecta"';

        break;

    case 'delete':
        $cliente = new Cliente();
        if($cliente->desactivar($_POST['id'])){
            echo '{"status":true}';
        } else{
            echo '{"status":false}';
        }
        break;

    case 'restore':
        $cliente = new Cliente();
        if($cliente->activar($_POST['id'])){
            echo '{"status":true}';
        } else{
            echo '{"status":false}';
        }
        break;
        
    
    default:
        # code...
        break;
}