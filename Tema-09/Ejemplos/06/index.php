<?php

/*
    Ejemplo 9.6: FPDF - 
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
$pdf->AliasNbPages();
$pdf->SetFont('Times', '', 10);
$pdf->AddPage();
$pdf->Cell(0, 10, iconv('UTF-8','ISO-8859-1', 'Artículos de prueba'), 0, 0, 'R');





$pdf->Output();

?>