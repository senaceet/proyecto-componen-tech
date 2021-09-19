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
    
    case 'detalles':
        $id = $_GET['id'];
        
        $objFactura = new Factura();
        $data = $objFactura->getDetalles($id);
        echo json_encode($data);
        break;

    case 'descargaReporte':
        $id = $_GET['id'];
        
        $objFactura = new Factura();
        $data = $objFactura->getDetalles($id);

        require_once '../controlador/Reportefact.php';

        $pdf = new PDF();

        $pdf -> AliasNbpages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        // $pdf->Cell(40,20,utf8_decode('¡Hola, Mundo!'));
        $pdf->Head(
            $data->user->nombres." ".$data->user->apellidos,
            $data->user->celular,
            $data->user->direccion
        );
        $pdf->Tabla();
        $pdf->Contendio($data->detalles);
        $pdf->Factura();

        $pdf->Factura_conte($data->factura->idFactura,$data->factura->fecha);
        $pdf->usuario();
        $pdf->usuario_conte($data->user->documento,$data->factura->TIPOPAGO_idTipoPago);

        $head = array(
            array("texto" => "Precio", "ancho"=>"96"),
            array("texto" => "Cantidad", "ancho"=>"21"),
            array("texto" => "Fecha", "ancho"=>"30"),
            array("texto" => "Precio", "ancho"=>"43")
        );
      //  $body = $data->data;
        //$pdf->tablaHorizontal($head,$body);
        $pdf->Output("Reporte_holasasa.pdf","I");
       

        break;
    case 'search':
        $objFactura = new Factura();

    

        $data = $objFactura->getFacturasBusqueda($_GET['text'],$_GET['estado']);

        echo json_encode($data);

        break;
}