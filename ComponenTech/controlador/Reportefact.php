<?php
require('Fpdf/fpdf.php');

class PDF extends FPDF{
// Cabecera de página
    function Head( ){
        // Logo
        $this->Image('../img/logo.png',170,5,33);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(50);
        // Título
        $this->Cell(-3,2,'ComponenTech ',0,0,'R');
        $this->SetTextColor(150,150,150);

        $this->SetFont('Arial','B',10);
        $this->Cell( 2,20,'Nombre: Juan Rodriguez ',0,0,'R');
        // Salto de línea
        $this->Ln();
        $this->Cell( 54,-10,utf8_decode('Teléfono: 3202020047 '),0,0,'C');
        $this->Ln();
        $this->Cell( 56,20, utf8_decode('Dirección: cr 3 #45-11 '),0,0,'C');
    }
    function Tabla(){
     $cabecera=[
         ["texto"=>"Nombre del producto","ancho"=>"80"],
         ["texto"=>"Cantidad","ancho"=>"47"],
         ["texto"=>"Precio","ancho"=>"63"]
     ];
        $this->SetXY(10, 70);
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(170, 0, 0);//Fondo verde de celda
        $this->SetTextColor(240, 255, 240); //Letra color blanco
        foreach($cabecera as $fila)
        {
            //Atención!! el parámetro true rellena la celda con el color elegido
            $this->Cell($fila["ancho"],7, utf8_decode($fila["texto"]),1, 0 , 'L', true);
        }
    }
    function Contendio(){
        $cabecera=[
            ["texto"=>"","ancho"=>"80"],
            ["texto"=>"","ancho"=>"47"],
            ["texto"=>"","ancho"=>"63"]
        ];
           $this->SetXY(10, 77);
           $this->SetFont('Arial','B',10);
           $this->SetFillColor(255, 255, 255);//Fondo verde de celda
           $this->SetTextColor(240, 255, 240); //Letra color blanco
           foreach($cabecera as $fila)
           {
               //Atención!! el parámetro true rellena la celda con el color elegido
               $this->Cell($fila["ancho"],7, utf8_decode($fila["texto"]),1, 0 , 'L', true);
           }
       }

       function Factura(){
            $cabecera=[
                ["texto"=>"N°Factura","ancho"=>"40"],
                ["texto"=>"Fecha","ancho"=>"40"]
            ];
               $this->SetXY(120, 46);
               $this->SetFont('Arial','B',10);
               $this->SetFillColor(170, 0, 0);//Fondo verde de celda
               $this->SetTextColor(240, 255, 240); //Letra color blanco
               foreach($cabecera as $fila)
               {
                   //Atención!! el parámetro true rellena la celda con el color elegido
                   $this->Cell($fila["ancho"],7, utf8_decode($fila["texto"]),1, 0 , 'L', true);
               }
           
       }
       function Factura_conte(){
        $cabecera=[
            ["texto"=>"","ancho"=>"40"],
            ["texto"=>"","ancho"=>"40"]
        ];
           $this->SetXY(120, 53);
           $this->SetFont('Arial','B',10);
           $this->SetFillColor(255, 255, 255);//Fondo verde de celda
           $this->SetTextColor(240, 255, 240); //Letra color blanco
           foreach($cabecera as $fila)
           {
               //Atención!! el parámetro true rellena la celda con el color elegido
               $this->Cell($fila["ancho"],7, utf8_decode($fila["texto"]),1, 0 , 'L', true);
           }
       
   }

   function usuario(){
    $cabecera=[
        ["texto"=>"Id Usuario","ancho"=>"40"],
        ["texto"=>"Terminos","ancho"=>"40"]
    ];
       $this->SetXY(-200, 46);
       $this->SetFont('Arial','B',10);
       $this->SetFillColor(170, 0, 0);//Fondo verde de celda
       $this->SetTextColor(240, 255, 240); //Letra color blanco
       foreach($cabecera as $fila)
       {
           //Atención!! el parámetro true rellena la celda con el color elegido
           $this->Cell($fila["ancho"],7, utf8_decode($fila["texto"]),1, 0 , 'L', true);
       }
   }
   function usuario_conte(){
    $cabecera=[
        ["texto"=>"","ancho"=>"40"],
        ["texto"=>"","ancho"=>"40"]
    ];
       $this->SetXY(-200, 53);
       $this->SetFont('Arial','B',10);
       $this->SetFillColor(255, 255, 255);//Fondo verde de celda
       $this->SetTextColor(240, 255, 240); //Letra color blanco
       foreach($cabecera as $fila)
       {
           //Atención!! el parámetro true rellena la celda con el color elegido
           $this->Cell($fila["ancho"],7, utf8_decode($fila["texto"]),1, 0 , 'L', true);
       }
   }
  //

    
 
    
 
    





// Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
    
        // Número de página
        $this->Cell(0,10, utf8_decode('Páginas ').$this->PageNo().'/{nb}',0,0,'C');
    }

}


// Creación del objeto de la clase heredada

$pdf = new PDF();

        $pdf -> AliasNbpages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        // $pdf->Cell(40,20,utf8_decode('¡Hola, Mundo!'));
        $pdf->Head("holas","sdsdasd");
        $pdf->Tabla();
        $pdf->Contendio();
        $pdf->Factura();
        $pdf->Factura_conte();
        $pdf->usuario();
        $pdf->usuario_conte();
        $head = array(
            array("texto" => "Precio", "ancho"=>"96"),
            array("texto" => "Cantidad", "ancho"=>"21"),
            array("texto" => "Fecha", "ancho"=>"30"),
            array("texto" => "Precio", "ancho"=>"43")
        );
      //  $body = $data->data;
        //$pdf->tablaHorizontal($head,$body);
        $pdf->Output("Reporte_holasasa.pdf","I");
       

?>