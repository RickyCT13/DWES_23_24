<?php

require 'fpdf/fpdf.php';
require 'class/pdfClientes.php';

$pdf = new PdfClientes();



$pdf->SetFont('Courier', '', 10);

/*
    Establecemos el título del documento
*/
$pdf->SetTitle('Informe Clientes '. date("d/m/Y"), true);

/*
    Establecer color del fondo de la celda
*/


$pdf->AddPage();

$pdf->titulo();

$pdf->SetLineWidth(1);

$pdf->encabezado();

$pdf->SetLineWidth(0.5);

$pdf->SetFont('Times', '', 10);

$pdf->SetFillColor(230, 230, 230);



for ($i = 1; $i <= 30; $i++) {

    $pdf->Cell(10, 10, iconv('UTF-8', 'ISO-8859-1', $i), 'B', 0, 'R', true);
    $pdf->Cell(35, 10, iconv('UTF-8', 'ISO-8859-1', 'Apellidos' . $i), 'B', 0, 'L', true);
    $pdf->Cell(35, 10, iconv('UTF-8', 'ISO-8859-1', 'Nombre' . $i), 'B', 0, 'L', true);
    $pdf->Cell(25, 10, iconv('UTF-8', 'ISO-8859-1', random_int(1, 99999999)), 'B', 0, 'R', true);
    $pdf->Cell(25, 10, iconv('UTF-8', 'ISO-8859-1', 'Ciudad' . $i), 'B', 0, 'L', true);
    $pdf->Cell(25, 10, iconv('UTF-8', 'ISO-8859-1', 'DNI' . $i), 'B', 0, 'L', true);
    $pdf->Cell(35, 10, iconv('UTF-8', 'ISO-8859-1', 'Correo electrónico' . $i), 'B', 1, 'L', true);
}

$pdf->Output('I','Informe_Clientes_' . date("d/m/Y"), true);
