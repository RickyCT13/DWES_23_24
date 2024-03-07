<?php

class PdfClientes extends FPDF {
    function Header() {
        /*
            celda gesbank, alineada a la izqda
            celda nombre, alineado centro
            celda 2daw2324, alineado dcha
            borde inferior
        */
        $this->SetFont('Helvetica', '', 12);
        $this->Cell(63.3, 10, iconv('UTF-8','ISO-8859-1', 'GESBANK 1.0'), 'B', 0, 'L');
        $this->Cell(63.3, 10, iconv('UTF-8','ISO-8859-1', 'Ricardo Moreno Cantea'), 'B', 0, 'C');
        $this->Cell(63.3, 10, iconv('UTF-8','ISO-8859-1', '2ºDAW 23/24'), 'B', 1, 'R');
    }

    function Footer() {
        $this->SetY(-10);
        $this->SetLineWidth(0.2);
        $this->AliasNbPages();
        $this->Cell(0, 10, iconv('UTF-8','ISO-8859-1', '{nb}'), 'T', 0, 'C');
    }

    function titulo() {
        $this->SetFont('Helvetica', 'B', 12);
        $this->MultiCell(0, 10, iconv('UTF-8','ISO-8859-1', 'Listado de clientes' . "\n" . 'Informe: ' . date("d/m/Y")), 'B', 'C', false);
        //$this->Cell(50, 10, iconv('UTF-8','ISO-8859-1', 'Informe: ' . date("d/m/Y")), 0, 2, 'C');
    }

    
    function encabezado() {
        
        $this->Ln(10);
        $this->SetFont('Times', 'B', 10);
        $this->SetFillColor(200, 200, 200);
        /*
            25, 25, 25, 25, 25, 25, 25
            10, 30, 30, 25, 25, 25, 30
        */
        $this->Cell(10, 10, iconv('UTF-8','ISO-8859-1', 'ID'), 'B', 0, 'R', true);
        $this->Cell(35, 10, iconv('UTF-8','ISO-8859-1', 'Apellidos'), 'B', 0, 'L', true);
        $this->Cell(35, 10, iconv('UTF-8','ISO-8859-1', 'Nombre'), 'B', 0, 'L', true);
        $this->Cell(25, 10, iconv('UTF-8','ISO-8859-1', 'Teléfono'), 'B', 0, 'R', true);
        $this->Cell(25, 10, iconv('UTF-8','ISO-8859-1', 'Ciudad'), 'B', 0, 'L', true);
        $this->Cell(25, 10, iconv('UTF-8','ISO-8859-1', 'DNI'), 'B', 0, 'L', true);
        $this->Cell(35, 10, iconv('UTF-8','ISO-8859-1', 'Correo electrónico'), 'B', 1, 'L', true);
    }
}

?>