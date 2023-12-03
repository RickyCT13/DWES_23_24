<?php 

setlocale(LC_MONETARY, "es_ES");

// Conexión con la base de datos
$db = new Fp();

// Cargar alumnos
$alumnos = $db->getAlumnos();

$cursos = $db->getCursos();

$idElim = $_GET['id'];

$alumnoElim = $db->getAlumnoFormat($idElim);

?>