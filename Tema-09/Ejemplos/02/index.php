<?php

/*
    Ejemplo 9.2: FPDF - Uso de iconv()
*/

/*
    Cargar clase FPDF
*/
require('fpdf/fpdf.php');

/*
    Crear un objeto de la clase FPDF
*/
$pdf = new FPDF();

/*
    Añadir una página en blanco
*/
$pdf->AddPage();

/*
    Establecer la fuente, el estilo (negrita, cursiva...) y su tamaño
*/
$pdf->SetFont('Arial', 'B', 16);

/*
    Añadir una celda de 40x10mm con texto
    Por defecto, hay un margen de 10 mm en todo el documento
    El ejemplo anterior usa mb_convert_encoding
    En este se usa iconv(from_enc, to_enc, texto)
*/
$pdf->Cell(40, 10, iconv('UTF-8','ISO-8859-1', '¡Mi primera página con FPDF!'));

/*
    Imprimir
*/
$pdf->Output();

?>