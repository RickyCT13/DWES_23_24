<?php

/*
    Ejemplo 9.1: FPDF - Creación de un documento PDF
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
    Para el texto, se tiene que cambiar la codificación. De lo contrario,
    los caracteres como la tilde no se mostrarán correctamente
*/
$pdf->Cell(40, 10, mb_convert_encoding('¡Mi primera página con FPDF!','ISO-8859-1', 'UTF-8'));

/*
    Imprimir
*/
$pdf->Output();

?>