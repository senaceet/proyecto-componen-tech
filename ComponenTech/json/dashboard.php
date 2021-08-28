<?php 
switch ($_GET['lista']) {
    case 'clientes':
        require_once '../modelo/Cliente.php';
        $objCliente = new Cliente();
        $clientes = $objCliente->getClientes(0,6,0);

        echo(json_encode($clientes));
        break;

    case 'productos':
        require_once '../modelo/Producto.php';
        $objProducto = new Producto();
        $productos = $objProducto->getProductos(5,0,0,0);

        $data = [];
        while ($a = $productos->fetch_object()) {
            array_push($data, $a);
        }
        echo(json_encode($data));
        break;

    case 'resumen':
        require_once '../modelo/Producto.php';
        require_once '../modelo/Cliente.php';
        require_once '../modelo/Movimiento.php';
        require_once '../modelo/Proveedor.php';
        $objProducto = new Producto();
        $productos = $objProducto->getCount(0,0);

        $objMovimiento = new Movimiento();
        $ventas = $objMovimiento->getCountVentas();

        $objCliente = new Cliente();
        $clientes = $objCliente->count(0);

        $objProveedor = new Proveedor();
        $proveedores = $objProveedor->getCount();

        $data = new stdClass();
        
       $data->productos = $productos;
       $data->ventas = $ventas;
       $data->clientes = $clientes; 
       $data->proveedores = $proveedores;
        echo(json_encode($data));
        break;
    
    default:
        echo '{}';
        break;
}




?>