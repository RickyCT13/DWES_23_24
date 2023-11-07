<?php

$calculadora = new Calculadora();

if (array_key_exists('borrar', $_POST)) {

    $calculadora->setValor1(0);
    $calculadora->setValor2(0);
    $calculadora->setResultado(0);

}

else {

    $calculadora->setValor1($_POST['valor1']);
    $calculadora->setValor2($_POST['valor2']);
    $operacion = $_POST['operacion'];

    switch ($operacion) {
        case "suma":
            $calculadora->suma();
            break;
        case "resta":
            $calculadora->resta();
            break;
        case "producto":
            $calculadora->producto();
            break;
        case "division":
            $calculadora->division();
            break;
        case "potencia":
            $calculadora->potencia();
            break;
        default:
            echo 'Error: Operación no admitida.';
    }
    
}
