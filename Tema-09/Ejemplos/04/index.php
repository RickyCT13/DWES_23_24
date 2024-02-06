<?php

/*
    Ejemplo 9.4: FPDF - 
*/

/*
    Cargar clase FPDF
*/
require('fpdf/fpdf.php');

/*
    Declarar variables
*/
$id = 1;
$nombre = 'John';
$apellidos = 'PHP';

/*
    Crear un objeto de la clase FPDF
    Parámetros:
        - Orientación: Normal (P) por defecto o apaisada (L)
        - Unidad de medida: mm por defecto
        - Formato: A4 por defecto
    En este ejemplo establacemos la orientación apaisada, puntos como ud.
    de medida y el formato para documentos legales
*/
$pdf = new FPDF();

/*
    Establecer la fuente, el estilo (negrita, cursiva...) y su tamaño
    Arial
*/

$pdf->SetFont('Courier', '', 10);

/*
    Establecemos el título del documento
*/
$pdf->SetTitle('informe', true);

/*
    Establecer color del fondo de la celda
*/
$pdf->SetFillColor(150, 95, 150);

/*
    Añadir una página en blanco
    Cada página puede tener su propia orientación y formato
*/
$pdf->AddPage();

/*
    Añadir una celda de 40x10mm con texto
    Por defecto, hay un margen de 10 mm en todo el documento
    El ejemplo anterior usa mb_convert_encoding
    En este se usa iconv(from_enc, to_enc, texto)
*/
$pdf->Cell(60, 10, iconv('UTF-8','ISO-8859-1', 'id: '), 1, 0, 'R', true);
$pdf->Cell(0, 10, iconv('UTF-8','ISO-8859-1', $id), 1, 1);
$pdf->Cell(60, 10, iconv('UTF-8','ISO-8859-1', 'nombre: '), 1, 0, 'R', true);
$pdf->Cell(0, 10, iconv('UTF-8','ISO-8859-1', $nombre), 1, 1);
$pdf->Cell(60, 10, iconv('UTF-8','ISO-8859-1', 'apellidos: '), 1, 0, 'R', true);
$pdf->Cell(0, 10, iconv('UTF-8','ISO-8859-1', $apellidos), 1, 1);

/*
    Imprimir
    Se puede especificar el nombre y el método
*/
$pdf->Output('I', 'informe.pdf', true);

?>