<?php 

setlocale(LC_MONETARY, "es_ES");

// Conexión con la base de datos
$db = new Maratoon();

$criterio = $_GET['criterio'];

// Cargar alumnos
$corredores = $db->order($criterio);


?>