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
    public function Header() {
        $this->Image('images/logo.jpg', 10, 8, 33);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(30, 10, iconv('UTF-8','ISO-8859-1', 'Título'), 'B', 1, 'R');
        $this->Ln(5);
    }
    public function Footer() {
        $this->SetY(-10);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 10, iconv('UTF-8','ISO-8859-1', 'Página  ' . $this->PageNo() . '/{nb}'), 'T', 0, 'C');
    }

    public function titulo() {
        
    }
}
