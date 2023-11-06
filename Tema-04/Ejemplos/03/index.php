<?php

include 'class/class.vehiculo.php';
include 'class/class.deportivo.php';

$coche1 = new Vehiculo (
    "Opel",
    "Corsa 2009",
    "2578 FFD",
    0
);

$deportivo1 = new Deportivo (
    "Honda",
    "NSX '92",
    "4867 LWQ",
    0,
    3.2,
    23500
);

print_r($coche1);

print_r($deportivo1);

?>