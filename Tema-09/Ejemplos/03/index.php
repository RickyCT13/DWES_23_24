<?php

/*
    Ejemplo 9.3: FPDF - Parámetros del constructor
*/

/*
    Cargar clase FPDF
*/
require('fpdf/fpdf.php');

/*
    Crear un objeto de la clase FPDF
    Parámetros:
        - Orientación: Normal (P) por defecto o apaisada (L)
        - Unidad de medida: mm por defecto
        - Formato: A4 por defecto
    En este ejemplo establacemos la orientación apaisada, puntos como ud.
    de medida y el formato para documentos legales
*/
$pdf = new FPDF('L', 'pt', 'Legal');

/*
    Añadir una página en blanco
    Cada página puede tener su propia orientación y formato
*/
$pdf->AddPage();

/*
    Establecer la fuente, el estilo (negrita, cursiva...) y su tamaño
    Arial
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
    Añadir una página con formato A4 y orientación vertical
*/
$pdf->AddPage('P', 'A4');

/*
    Establecer la fuente de la segunda página: Courier
*/
$pdf->SetFont('Courier', '', 16);

/*
    Añadir una celda con texto
    Si el ancho es 0, se extiende hasta el margen derecho
    El alto por defecto es 10
    El borde se mostrará si el valor es 1
    Ln:
        - 0: Empieza a escribir a la derecha de la ultima celda
        - 1: Empieza a escribir al comienzo de la nueva línea
        - 2: Empieza a escribir justo debajo de la celda
*/
$pdf->Cell(0, 10, iconv('UTF-8','ISO-8859-1', 'Esta página está en un A4 en vertical'), 1);

/*
    Imprimir
*/
$pdf->Output();

?>