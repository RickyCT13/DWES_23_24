<?php 

# Generar la tabla

setlocale(LC_MONETARY, "es_ES");

// Conexión con la base de datos
$db = new Fp();

// Cargar alumnos
$alumnos = $db->getAlumnos();

$cursos = $db->getCursos();

$criterio = $_GET['criterio'];

$alumnos = $db->order($criterio);


?>