<?php

$valor = intval($_GET['valor']);

$conversion = "HEXADECIMAL";
$resultado = strtoupper(dechex($valor));

?>