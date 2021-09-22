<?php 

session_start();
if (!$_SESSION['user']) {
	header('location:../index.php');
}
if ($_SESSION['user']->CARGO_idCargo==3) {
	header('location:../index.php');
}

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

    case 'search':
        $objInventario = new Inventario();
        $text = $_GET['text']; $estado = $_GET['estado'];

        $data = $objInventario->getInventarioSearch($text,$estado);
        echo json_encode($data);
        break;

    case 'reporte':
        $objInventario = new Inventario();
        $id = $_GET['id'];
        $data = $objInventario->getReporteInventario($id);

        echo json_encode($data);
        break;

    case 'descargaReporte':
        $inventario = new Inventario();
            
        $data = new stdClass();
    
        if(isset($_GET['id'])){
                $data = $inventario->getReporteInventario($_GET['id']);
        }else {
                $inventario->data=[];
        }
        
        // echo json_encode($data);
        
        require_once '../controlador/pdfinventario.php';
    
        $pdf = new PDF();
    
        $pdf -> AliasNbpages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        // $pdf->Cell(40,20,utf8_decode('¡Hola, Mundo!'));
        $pdf->Head($data->producto->idProducto,$data->producto->productoNombre);
        $head = array(
                 array("texto" => "Nombre", "ancho"=>"47"),
                array("texto" => "Cantidad", "ancho"=>"47"),
                array("texto" => "Fecha", "ancho"=>"47"),
                array("texto" => "Precio", "ancho"=>"47")
        );
        $body = $data->data;
        $pdf->tablaHorizontal($head,$body);
        $pdf->Output("Reporte_".$data->producto->idProducto.".pdf","I");  
        
        break;  
    
    case 'add_entradas':

        $inventario = new Inventario();

        $data = $inventario->agregarEntradas($_POST['id'],$_POST['entradas']);

        echo json_encode($data);

        break;

    default:
        echo "{}";
        break;


        
}