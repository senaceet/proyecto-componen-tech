
<?php 

require_once '../modelo/Detalles.php';
require_once '../modelo/Factura.php';
require_once '../modelo/Movimiento.php';
require_once '../modelo/Inventario.php';

$ruta = 'http://componentech.epizy.com/';



require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


	
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
	if (!isset($_SESSION['user'])) {
      header('location: ../vista/principal.php');
	} elseif (!isset($_SESSION['carrito'])) {
      header('location: ../vista/principal.php');
   }






// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
	);

    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'componentech9@gmail.com';                     // SMTP username
    $mail->Password   = 'componen12345';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('componentech9@gmail.com', 'ComponenTech');
   
    $mail->addAddress($_SESSION['user']['correo']);
      
    $mail->addAddress('kacendales@misena.edu.co'); 
    $mail->addAddress('jmonroy20@misena.edu.co');         // COPIA DE LA FACTURA
    
   
    //$mail->addAttachment('../icons/logo.png');    // Optional name


   //HTML
    $mail->isHTML(true);   
    $prods = '';
    $total = 0;
    $totalProds = 0;


   foreach ($_SESSION['carrito'] as $key => $value) {
      
      $totalCant = $value['cantidad'] * $value['precio'];
      $total += $totalCant;
      $totalProds += $value['cantidad'];
      $prods = $prods."<tr>
                  <td>".$value['nombre']."</td>
                  <td>".$value['cantidad']."</td>
                  <td>$". number_format($totalCant,0,",",".")  ."</td>
               </td>";
   }


   // creación de factura

   $objFactura = new Factura();


   $objFactura->crearFactura(0,date('Y-m-d'),0,$total,$_POST['MetodoP'],$_SESSION['user']['documento'],8);

   $res = $objFactura->insertar();
   if ($res) {
      $objFactura->getLastFactura($_SESSION['user']['documento']);
   }
   

   // insertar detalles, actualizar movimientos e inventario

   $objDetalles = new Detalles();

   foreach ($_SESSION['carrito'] as $key => $value) {
     
      $inTotalCant = $value['cantidad'] * $value['precio'];
      $objDetalles->crearDetalle(0,$value['cantidad'],$inTotalCant,$objFactura->getIdFactura(),$key);
      $res = $objDetalles->insertar();
      if ($res) {
         $objMov = new Movimiento();
         $objMov->crearMovimiento(0,$objFactura->getFecha(),$objDetalles->getCantidad(),1,$key,$objFactura->getIdFactura());
         $res = $objMov->insertar();
         if ($res) {
            $objInv = new Inventario();
            $objInv->vender($key,$objDetalles->getCantidad());
         }
      }
   }





   // CORREO HTML
    $mail->Subject = 'Factura de compra';
    $mail->Body    =  ' 
    <style>
     *{
        font-family: sans-serif;
     }
     .titulocorreo{
         color: red;
         font-size:20px;
     }
     .facturaBody{
        background-color: #fff;
     }
     .facturaBody h3{
        text-align: center;
     }
  </style>
    <div style="background-color:#D8D8D8; width:100%;"  >  
      <div style="aling-items:center; text-align:center; padding:10px ">
         <img src="'.$ruta.'img/logo.png" width="100" >

         <h2 style="text-align:center;  font-weight:700; color:black; ">¡Gracias Por la compra!</h2>
      </div>

                           
                               
      <div class="facturaBody">
         <h3 >¡Hola! '.$_SESSION['user']['nombres'] .' </h3>

         <h4 style="text-align:center; padding-top:7px; color:black;"> Gracias por comprar con <span style="color:crimson;">Componentech</span></h4>
                              
         <h2 style="text-align:center;  font-weight:700; color:black; ">ID FACTURA: '.$objFactura->getIdFactura().' </h2>
         
                            
         <hr style=" width:190px; padding-left:50px; padding-right:50px;  font-weight:bolder; height:5px; background-color:black;" >
                           
                            
         <table border="1"  style="width:100%; border-style: solid; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; padding-left:20px; padding-right:20px;">
            <thead>
               <tr>
                  <th style="padding:10px; color:black;" colspan="2">Facturación</th>
               </tr>
               <tr >
                  <th style="padding:10px; color:black;">Nombres</th>
                  <th style=" color:black;">'.$_SESSION['user']['nombres'] .'</th>
               </tr>
               <tr>
                  <th style="padding:10px; color:black;">Apellidos</th>
                  <th style=" color:black;">'.$_SESSION['user']['apellidos'] .'</th>
               </tr>
               <tr>
                  <th style="padding:10px; color:black;">Correo de facturación</th>
                  <th style=" ">'.$_SESSION['user']['correo'] .'</th>
               </tr>

               <tr>
                  <th style="padding:10px; color:black;">Telefono de contacto</th>
                  <th style=" color:black;">'.$_SESSION['user']['celular'] .'</th>
               </tr>
               <tr>
                  <th style="padding:10px; color:black;">Dirección</th>
                  <th style=" color:black;">'.$_SESSION['user']['direccion'] .'</th>
               </tr>
               </thead>
         </table>
         <h2 style="text-align:center;  font-weight:700; color:black; ">TÚ PEDIDO </h2>

         <table  border="1"  style="width:100%; border-style: solid; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; padding-left:20px; padding-right:20px;">
            <thead>
                  <th>Descripción</th>
                  <th>Cantidad</th>
                  <th>Precio</th>
               </th>
            </thead>
            <tbody>
               '.$prods.'
               <tr>
                  <td><b>Total</b></td>
                  <td>'.$totalProds.'</td>
                  <td>$'.number_format($total,0,",",".").'</td>
               </tr>
            </tbody>
         </table>
                                
   </div>';


// echo $mail->Body;

  $mail->send();

   unset($_SESSION['carrito']);

   header('location:../vista/principal.php');



} catch (Exception $e) {
    echo "3312 tenemos un 3313: {$mail->ErrorInfo}";
}
