<?php

$numeros = [];
$contador = 1;
$i = 1;

while ($i <= 10) {
    $columnas = [];
    $j = 1;

    while ($j <= 10) {
        $columnas[] = $contador;
        $contador++;
        $j++;
    }
    $numeros[] = $columnas;
    $i++;
}

?>