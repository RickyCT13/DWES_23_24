<?php

$numeroMes = date('m');

$mensaje = "El mes actual es: ";

switch ($numeroMes) {
    case '01':
        $mensaje .= 'Enero';
        break;
    case '02':
        $mensaje .= 'Febrero';
        break;
    case '03':
        $mensaje .= 'Marzo';
        break;
    case '04':
        $mensaje .= 'Abril';
        break;
    case '05':
        $mensaje .= 'Mayo';
        break;
    case '06':
        $mensaje .= 'Junio';
        break;
    case '07':
        $mensaje .= 'Julio';
        break;
    case '08':
        $mensaje .= 'Agosto';
        break;
    case '09':
        $mensaje .= 'Septiembre';
        break;
    case '10':
        $mensaje .= 'Octubre';
        break;
    case '11':
        $mensaje .= 'Noviembre';
        break;
    case '12':
        $mensaje .= 'Diciembre';
        break;
    default:
        $mensaje = 'Error';
}

?>