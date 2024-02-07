<?php

/*
    Utilizamos la herencia para crear nuestras clases
    PDF personalizadas, heredando todas las propiedades
    y métodos de FPDF
*/
class PdfArticulos extends FPDF {
    /*
        Sobreescribimos (override) el método Header()
    */
    function Header() {
        $this->Image('images/logo.jpg', 10, 8, 33);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(30, 10, iconv('UTF-8','ISO-8859-1', 'Título'), 1, 0, 'C');
    }
}
