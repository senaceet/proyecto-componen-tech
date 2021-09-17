<?php
require('Fpdf/fpdf.php');

class PDF extends FPDF{
// Cabecera de página
    function Head($nombres,$celular,$direccion){
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
        $this->Cell( 2,20,'Nombre: '.$nombres,0,0,'R');
        // Salto de línea
        $this->Ln();
        $this->Cell( 54,-10,utf8_decode('Teléfono: '.$celular),0,0,'C');
        $this->Ln();
        $this->Cell( 56,20, utf8_decode('Dirección: '.$direccion),0,0,'C');
    }
    function Tabla(){
     $cabecera=[
         ["texto"=>"Nombre del producto","ancho"=>"97"],
         ["texto"=>"Cantidad","ancho"=>"30"],
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
    
    function Contendio($datos){
        $this->SetXY(10,77);
        $this->SetFont('Arial','',10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        foreach($datos as $fila)
        {
            //El parámetro badera dentro de Cell: true o false
            //true: Llena  la celda con el fondo elegido
            //false: No rellena la celda

            $precio = "$".number_format($fila['precio'],0,".",".");
            $this->Cell(97,7, utf8_decode($fila['productoNombre']),1, 0 , 'L', $bandera );
            $this->Cell(30,7, utf8_decode($fila['cantidad']),1, 0 , 'R', $bandera );
            $this->Cell(63,7, utf8_decode($precio),1, 0 , 'L', $bandera );
            $this->Ln();//Salto de línea para generar otra fila
            $bandera = !$bandera;//Alterna el valor de la bandera
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
       function Factura_conte($idFac,$fecha){
        $cabecera=[
            ["texto"=>$idFac,"ancho"=>"40"],
            ["texto"=>$fecha,"ancho"=>"40"]
        ];
           $this->SetXY(120, 53);
           $this->SetFont('Arial','B',10);
           $this->SetFillColor(255, 255, 255);//Fondo verde de celda
           $this->SetTextColor(0,0,0); //Letra color blanco
           foreach($cabecera as $fila)
           {
               //Atención!! el parámetro true rellena la celda con el color elegido
               $this->Cell($fila["ancho"],7, utf8_decode($fila["texto"]),1, 0 , 'L', true);
           }
       
   }

   function usuario(){
    $cabecera=[
        ["texto"=>"Id Usuario","ancho"=>"40"],
        ["texto"=>"Tipo de pago","ancho"=>"40"]
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
   function usuario_conte($id, $tipoPago){
        $cabecera=[
            ["texto"=>$id,"ancho"=>"40"],
            ["texto"=>$tipoPago,"ancho"=>"40"]
        ];
       $this->SetXY(-200, 53);
       $this->SetFont('Arial','B',10);
       $this->SetFillColor(255, 255, 255);//Fondo verde de celda
       $this->SetTextColor(0,0,0); //Letra color blanco
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


?>