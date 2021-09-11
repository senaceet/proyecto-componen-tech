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

    case 'search':
        $objInventario = new Inventario();
        $text = $_GET['text']; $estado = $_GET['estado'];

        $data = $objInventario->getInventarioSearch($text,$estado);
        echo json_encode($data);
        break;

    case 'reporte':
        $objInventario = new Inventario();
        $id = $_GET['id'];
        $data = $objInventario->getReporteIventario($id);

        echo json_encode($data);
        break;

    case 'descargaReporte':
        $cliente = new Cliente();
            
        $data = new stdClass();
    
        if(isset($_GET['id'])){
                $data = $cliente->getReporteCliente($_GET['id']);
        }else {
                $cliente->data=[];
        }
    
           
        require_once '../controlador/reportepdf.php';
    
        $pdf = new PDF();
    
        $pdf -> AliasNbpages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        // $pdf->Cell(40,20,utf8_decode('¡Hola, Mundo!'));
        $pdf->Head($data->user->nombres." ".$data->user->apellidos,"N° ".$data->user->documento);
        $head = array(
                array("texto" => "Precio", "ancho"=>"96"),
                array("texto" => "Cantidad", "ancho"=>"21"),
                array("texto" => "Fecha", "ancho"=>"30"),
                array("texto" => "Precio", "ancho"=>"43")
        );
        $body = $data->data;
        $pdf->tablaHorizontal($head,$body);
        $pdf->Output("Reporte_".$data->user->documento.".pdf","I");  
        
        break;  


    default:
        echo "{}";
        break;


        
}