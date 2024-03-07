<?php

class ClassPdfClientes extends FPDF {
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
        $this->MultiCell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Listado de clientes' . "\n" . 'Informe: ' . date("d/m/Y")), 'B', 'C', false);
        //$this->Cell(50, 10, iconv('UTF-8','ISO-8859-1', 'Informe: ' . date("d/m/Y")), 0, 2, 'C');
    }

    function encabezado() {
        $this->Ln(10);
        $this->SetFont('Times', 'B', 10);
        $this->SetFillColor(200, 200, 200);

        $this->Cell(10, 10, iconv('UTF-8', 'ISO-8859-1', 'ID'), 'B', 0, 'R', true);
        $this->Cell(35, 10, iconv('UTF-8', 'ISO-8859-1', 'Apellidos'), 'B', 0, 'L', true);
        $this->Cell(35, 10, iconv('UTF-8', 'ISO-8859-1', 'Nombre'), 'B', 0, 'L', true);
        $this->Cell(25, 10, iconv('UTF-8', 'ISO-8859-1', 'Teléfono'), 'B', 0, 'R', true);
        $this->Cell(25, 10, iconv('UTF-8', 'ISO-8859-1', 'Ciudad'), 'B', 0, 'L', true);
        $this->Cell(20, 10, iconv('UTF-8', 'ISO-8859-1', 'DNI'), 'B', 0, 'L', true);
        $this->Cell(40, 10, iconv('UTF-8', 'ISO-8859-1', 'Correo electrónico'), 'B', 1, 'L', true);
    }

    function contenido($clientes) {
        /*
            Estilado de las filas
        */
        $this->SetFont('Times', '', 10);

        $this->SetFillColor(230, 230, 230);


        foreach ($clientes as $cliente) {
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
                Crear celdas con cada atributo del cliente
            */
            $this->Cell(10, 10, iconv('UTF-8', 'ISO-8859-1', $cliente->id), 'B', 0, 'R', true);
            $this->Cell(35, 10, iconv('UTF-8', 'ISO-8859-1', $cliente->apellidos), 'B', 0, 'L', true);
            $this->Cell(35, 10, iconv('UTF-8', 'ISO-8859-1', $cliente->nombre), 'B', 0, 'L', true);
            $this->Cell(25, 10, iconv('UTF-8', 'ISO-8859-1', $cliente->telefono), 'B', 0, 'R', true);
            $this->Cell(25, 10, iconv('UTF-8', 'ISO-8859-1', $cliente->ciudad), 'B', 0, 'L', true);
            $this->Cell(20, 10, iconv('UTF-8', 'ISO-8859-1', $cliente->dni), 'B', 0, 'L', true);
            $this->Cell(40, 10, iconv('UTF-8', 'ISO-8859-1', $cliente->email), 'B', 1, 'L', true);
        }
    }
}
