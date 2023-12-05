<?php 

# Generar la tabla

setlocale(LC_MONETARY, "es_ES");

// Conexión con la base de datos
$db = new Fp();

// Cargar alumnos

$expresion = $_GET['expresion'];

$alumnos = $db->filter($expresion);

?>