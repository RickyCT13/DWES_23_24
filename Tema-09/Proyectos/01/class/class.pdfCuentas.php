<?php

class ClassPdfCuentas extends FPDF {
    function Header() {
        /*
            Cabecera del documento PDF
        */
        $this->SetFont('Helvetica', '', 12);
        $this->Cell(63, 10, iconv('UTF-8', 'ISO-8859-1', 'GESBANK 1.0'), 'B', 0, 'L');
        $this->Cell(63, 10, iconv('UTF-8', 'ISO-8859-1', 'Ricardo Moreno Cantea'), 'B', 0, 'C');
        $this->Cell(63, 10, iconv('UTF-8', 'ISO-8859-1', '2ºDAW 23/24'), 'B', 1, 'R');
    }

    function Footer() {
        $this->SetY(-10);
        $this->AliasNbPages();
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', $this->PageNo()), 'T', 0, 'C');
    }

    function titulo() {
        $this->SetFont('Helvetica', 'B', 12);
        $this->MultiCell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Listado de cuentas' . "\n" . 'Informe: ' . date("d/m/Y")), 'B', 'C', false);
        //$this->Cell(50, 10, iconv('UTF-8','ISO-8859-1', 'Informe: ' . date("d/m/Y")), 0, 2, 'C');
    }

    function encabezado() {
        $this->Ln(10);
        $this->SetFont('Times', 'B', 10);
        $this->SetFillColor(200, 200, 200);

        $this->Cell(10, 10, iconv('UTF-8', 'ISO-8859-1', 'ID'), 'B', 0, 'R', true);
        $this->Cell(45, 10, iconv('UTF-8', 'ISO-8859-1', 'Num. cuenta'), 'B', 0, 'R', true);
        $this->Cell(20, 10, iconv('UTF-8', 'ISO-8859-1', 'Id cliente'), 'B', 0, 'R', true);
        $this->Cell(40, 10, iconv('UTF-8', 'ISO-8859-1', 'Fecha de alta'), 'B', 0, 'L', true);
        $this->Cell(40, 10, iconv('UTF-8', 'ISO-8859-1', 'Fecha ul. movto.'), 'B', 0, 'L', true);
        $this->Cell(10, 10, iconv('UTF-8', 'ISO-8859-1', 'Num. movtos.'), 'B', 0, 'R', true);
        $this->Cell(25, 10, iconv('UTF-8', 'ISO-8859-1', 'Saldo (euros)'), 'B', 1, 'R', true);
    }

    function contenido($cuentas) {
        /*
            Estilado de las filas
        */
        $this->SetFont('Times', '', 10);

        $this->SetFillColor(230, 230, 230);


        foreach ($cuentas as $cuenta) {
            /*
                Comprobamos si el siguiente registro está cerca del fin
                de página. Si es así, volverá a dibujar el encabezado.
            */
            if ($this->GetY() + 9 > $this->PageBreakTrigger) {
                $this->AddPage();
                $this->encabezado();

                $this->SetFont('Times', '', 10);

                $this->SetFillColor(230, 230, 230);
            }

            /*
                Crear celdas con cada atributo de la cuenta
            */
            $this->Cell(10, 10, iconv('UTF-8', 'ISO-8859-1', $cuenta->id), 'B', 0, 'R', true);
            $this->Cell(45, 10, iconv('UTF-8', 'ISO-8859-1', $cuenta->num_cuenta), 'B', 0, 'R', true);
            $this->Cell(20, 10, iconv('UTF-8', 'ISO-8859-1', $cuenta->id_cliente), 'B', 0, 'R', true);
            $this->Cell(40, 10, iconv('UTF-8', 'ISO-8859-1', $cuenta->fecha_alta), 'B', 0, 'L', true);
            $this->Cell(40, 10, iconv('UTF-8', 'ISO-8859-1', $cuenta->fecha_ul_mov), 'B', 0, 'L', true);
            $this->Cell(10, 10, iconv('UTF-8', 'ISO-8859-1', $cuenta->num_movtos), 'B', 0, 'R', true);
            $this->Cell(25, 10, iconv('UTF-8', 'ISO-8859-1', $cuenta->saldo), 'B', 1, 'R', true);
        }
    }
}
