<?php

/*
    Ejemplo 9.5: FPDF - 
*/

/*
    Cargar clase FPDF
*/
require('fpdf/fpdf.php');
require('class/pdfArticulos.php');

/*
    Crear objeto
*/

$pdf = new PdfArticulos();

$pdf->AddPage();

$pdf->SetFont('Times', '', 12);

$pdf->Output();

?>