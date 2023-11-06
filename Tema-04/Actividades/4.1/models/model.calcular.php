<?php

$calculadora = new Calculadora();

$calculadora->setValor1($_POST['valor1']);
$calculadora->setValor2($_POST['valor2']);
$operacion = $_POST['operacion'];

switch ($operacion) {
    case 1:
        $calculadora->suma();
        break;
    case 2:
        $calculadora->resta();
        break;
    case 3:
        $calculadora->producto();
        break;
    case 4:
        $calculadora->division();
        break;
    case 5:
        $calculadora->potencia();
        break;
    default:
        echo 'Error: Operación no admitida.';
}

?>