<?php

# Generar la tabla

setlocale(LC_MONETARY, "es_ES");

// Conexión con la base de datos
$db = new Fp();

// Cargar alumnos
$alumnos = $db->getAlumnos();

$cursos = $db->getCursos();

$id = $_GET['id'];

$db->deleteAlumno($id);

$db = new Fp();

$alumnos = $db->getAlumnos();

$cursos = $db->getCursos();

?>