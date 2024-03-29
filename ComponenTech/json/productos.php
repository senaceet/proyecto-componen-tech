<?php


session_start();
if (!$_SESSION['user']) {
	header('location:../index.php');
}
if ($_SESSION['user']->CARGO_idCargo==3) {
	header('location:../index.php');
}


require_once '../modelo/Producto.php';
if(isset($_GET['action']))
switch ($_GET['action']) {
    case 'get':
        $objProducto = new Producto();
        $limit = 10; $offset = 0; $estado = 0; $categoria = 0;
        if(isset($_GET['limit']))
            $limit = $_GET['limit'];

        if(isset($_GET['offset']))
            $offset = $_GET['offset'];
        
        if(isset($_GET['estado']))
            $estado = $_GET['estado'];
        
        if(isset($_GET['categoria']))
            $categoria = $_GET['categoria'];

        $data = new stdClass();
        $data->productos=[];
        $data->categorias=[];
        $data->count=$objProducto->getCount($estado,$categoria);

        $productos = $objProducto->getProductos($limit,$offset,$estado,$categoria);
        while ($a = $productos->fetch_object()) {
            array_push($data->productos,$a);
        }

        
        echo json_encode($data);
        
        break;

     case 'get1':
        $objProducto = new Producto();

        $data = $objProducto->getProducto($_GET['id']);
        
        echo json_encode($data);
        
        break;

    case 'categorias':
        $objProducto = new Producto();
        $categorias = $objProducto->getCategorias();
        echo json_encode($categorias);
        break;  

    case 'search':
        $objProducto = new Producto();
        $data = $objProducto->search($_GET['text'],$_GET['estado'],$_GET['categoria']);
        echo json_encode($data);
        break;

    case 'edit':
        $producto = new Producto();
 
        $foto = 0;
        if(!$_FILES['foto']['error']){
            $foto = $_FILES['foto'];
        }

        $creado = $producto->crearProducto(
            $_POST['producto'],
            $_POST['detalles'],
            $_POST['precio'],
            $_POST['categoria'],
            $_POST['proveedor'],
            2,
            $foto
        );
        if($creado !== true){
            echo '{"error":"'.$creado->error.'"}';
        } else {
            $res =  $producto->actualizar($_POST['idProducto']);
            echo json_encode($res);
        }
        break;

    case 'add':
        $producto = new Producto();
        $creado = $producto->crearProducto(
            $_POST['producto'],
            $_POST['detalles'],
            $_POST['precio'],
            $_POST['categoria'],
            $_POST['proveedor'],
            2,
            $_FILES['foto']
        );

        if($creado !== true){
            echo '{"error":"'.$creado->error.'"}';
        } else {
            echo $producto->insertar();
        }

        
        // var_dump($producto);
        break;

    default:
        echo "{}";
        break;
}
else echo '{"status:false","error":"No se detectó ninguna acción"}';