<?php 
require_once '../modelo/Cliente.php';

switch ($_GET['action']) {

    // http://localhost/ctech/json/clientes.php?action=reporte&id=1022322061

    case 'get':    
        $limit = 10; $offset = 0; $estado = 0;

        if(isset($_GET['limit']))
            $limit = $_GET['limit'];

        if(isset($_GET['offset']))
            $offset = $_GET['offset'];
        
        if(isset($_GET['estado']))
            $estado = $_GET['estado'];

        $objCliente = new Cliente();

        $clientes = $objCliente->getClientes($offset,$limit,$estado);
  
        echo(json_encode($clientes));
        
        break;
    
    case 'add':
        $cliente = new Cliente();
        $cliente->crearUsuario(
            $_POST['numerodocumento'],
            $_POST['nombres'],
            $_POST['apellidos'],
            $_POST['fnacimiento'],
            $_POST['edad'],
            $_POST['celular'],
            $_POST['direccion'],
            $_POST['correo'],
            3,
            $_POST['tipodocumento'],
            10,
            $_POST['pass1'] 
        );
        
        if ($_POST['pass1'] == $_POST['pass2']){
            $res = $cliente->insertar();
            echo json_encode($res);
        } else echo '{"status":false,"error":"La constaseña es incorrecta"';

        
        break;
    
    case 'delete':
        $cliente = new Cliente();
        if($cliente->eliminar($_POST['id'])){
            echo '{"status":true}';
        } else{
            echo '{"status":false}';
        }
        break;

    case 'search':
        $cliente = new Cliente();
        $data = new stdClass();
        $data->clientes = [];
        $clientes = $cliente->getClientesBusqueda($_GET['text'],$_GET['estado']);
        while ($a = $clientes->fetch_object()) {
            array_push($data->clientes,$a);
        }
        $data->status = true;
        echo json_encode($data);
        break;

    case 'edit':
        
        break;

    case 'reporte':

        $cliente = new Cliente();
        
        $data = new stdClass();

        if(isset($_GET['id'])){
            $data = $cliente->getReporteCliente($_GET['id']);
        }else {
            $cliente->data=[];
        }

        

        echo json_encode($data);

        break;
        
           

    case 'descargaReporte':
        $cliente = new Cliente();
        
        $data = new stdClass();

        if(isset($_GET['id'])){
            $data = $cliente->getReporteCliente($_GET['id']);
            if(isset($_GET['fecha'])){
                $data = $cliente->getReporteClienteFecha($_GET['id'],$_GET['fecha']);
            }
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
       

        // echo json_encode($data);

        break;
        
    default:
        echo "{}";
        break;

}
?>

