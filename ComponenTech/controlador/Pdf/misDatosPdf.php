<?php ob_start();
header("Pragma: public");
header("Expires: 0");
$filename = "nombreArchivoQueDescarga.pdf";
header("Content-type: application/pdf");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

?>

<table>
    <thead>
        <tr>
            <td>HOLA</td>
        </tr>
        <tr>
            <td>HOLAaaa</td>
        </tr>
    </thead>
</table>


<!-- <style>
 .TituloCompra{
     text-align:center;
     color:green;
     text-align:center; 
     padding-top:7px;
     color:black;
 }
</style>
    
 <h3 align="center" style="font-size:26px;color:#000">¡Hola! MARLIN </h3> 
 <h2 class="TituloCompra"> Tú Reporte de Compras <span style="color:crimson;">Componentech</span></h4>
 <hr style=" width:1000px; padding-left:50px; padding-right:50px;  font-weight:bolder; height:5px; background-color:black;" >

    <table border="2" style="width:100%; border-style: solid; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; padding-left:20px; padding-right:20px;">
            <thead>
               <tr>
                  <th style="padding: 10px;
                  color: black;
                  background-color: #a40808;
                  color: white;
                  font-weight: 1000;
                  " colspan="4">Facturación</th>
                
                  
              <tr>
              <th style="padding:10px; color:black;">Producto</th>
                  <th style="padding:10px; color:black;">Cantidad</th>
                   <th style="padding:10px; color:black;">Fecha</th>
                   <th style="padding:10px; color:black;">Precio</th>
               </tr>

               <tr>
                  
                  <th style=" ">03-09-2021</th>
               </tr>

               <tr>
                
                  <th style=" color:black;">'</th>
               </tr>
               
               </thead>
         </table>
  
 <br>   -->


 
 
    
<?php

//require 'dompdf/autoload.inc.php';
// use Dompdf\Dompdf;
// $dompdf = new DOMPDF();
// $dompdf->load_html(ob_get_clean());
// $dompdf->render();
// $pdf = $dompdf->output();
// $filename = "Reporte.pdf";
// file_put_contents($filename, $pdf);
// $dompdf->stream($filename);
