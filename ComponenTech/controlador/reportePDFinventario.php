<?php
require('Fpdf/fpdf.php');

class PDF extends FPDF{
// Cabecera de página
    function Head($nombre, $documento){
        // Logo
        $this->Image('../img/logo.png',90,5,33);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30,70,'Reporte de Compras de '.$nombre,0,0,'C');
        $this->SetTextColor(150,150,150);

        $this->SetFont('Arial','B',10);
        $this->Cell(-30,84,'Documento '.utf8_decode($documento),0,0,'C');
        // Salto de línea
        
    }


    function cabeceraHorizontal($cabecera)
    {
        $this->SetXY(10, 57);
        $this->SetFont('Arial','B',10);
        $this->SetFillColor(170, 0, 0);//Fondo verde de celda
        $this->SetTextColor(240, 255, 240); //Letra color blanco
        foreach($cabecera as $fila)
        {
            //Atención!! el parámetro true rellena la celda con el color elegido
            $this->Cell($fila["ancho"],7, utf8_decode($fila["texto"]),1, 0 , 'L', true);
        }
    }
 
    function datosHorizontal($datos)
    {
        $this->SetXY(10,64);
        $this->SetFont('Arial','',10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        foreach($datos as $fila)
        {
            //El parámetro badera dentro de Cell: true o false
            //true: Llena  la celda con el fondo elegido
            //false: No rellena la celda

            $precio = "$".number_format($fila->precio,0,".",".");
            $this->Cell(96,7, utf8_decode($fila->productoNombre),1, 0 , 'L', $bandera );
            $this->Cell(21,7, utf8_decode($fila->cantidad),1, 0 , 'R', $bandera );
            $this->Cell(30,7, utf8_decode($fila->fecha),1, 0 , 'L', $bandera );
            $this->Cell(43,7, utf8_decode($precio),1, 0 , 'L', $bandera );
            $this->Ln();//Salto de línea para generar otra fila
            $bandera = !$bandera;//Alterna el valor de la bandera
        }
    }
 
    function tablaHorizontal($cabeceraHorizontal, $datosHorizontal)
    {
        $this->cabeceraHorizontal($cabeceraHorizontal);
        $this->datosHorizontal($datosHorizontal);
    }





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