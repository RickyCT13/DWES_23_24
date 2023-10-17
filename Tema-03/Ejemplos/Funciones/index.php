<?php

include 'aritmeticas.php';

$a = 13;
$b = 5;

echo 'Suma: '.sumar($a, $b);
echo '<br>';
echo 'Resta: '.restar($a, $b);
echo '<br>';
echo 'Producto: '.multiplicar($a, $b);
echo '<br>';
echo 'División: '.dividir($a, $b);
echo '<br>';
echo $a;
echo '<br>';
incremento($a);
echo $a;

?>