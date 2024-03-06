<?php

require 'libs/fpdf.php';

class ClassPdfClientes extends FPDF {
    function Header() {
        /*
            celda gesbank, alineada a la izqda
            celda nombre, alineado centro
            celda 2daw2324, alineado dcha
            borde inferior
        */
        $this->Cell(0, 10, iconv('UTF-8','ISO-8859-1', 'GESBANK 1.0'), 'B', 0, 'L');
        $this->Cell(0, 10, iconv('UTF-8','ISO-8859-1', 'Ricardo Moreno Cantea'), 'B', 0, 'C');
        $this->Cell(0, 10, iconv('UTF-8','ISO-8859-1', '2ºDAW 23/24'), 'B', 0, 'R');
    }
    function Footer() {

    }

    function titulo() {

    }
    
    function encabezado() {

    }
}

?>