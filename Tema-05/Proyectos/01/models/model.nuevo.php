<?php 

# Generar la tabla

setlocale(LC_MONETARY, "es_ES");

// Conexión con la base de datos
$db = new Fp();

// Cargar alumnos
$alumnos = $db->getAlumnos();

$stmt = "SELECT id, nombre FROM cursos ORDER BY id";

$result = $db->db->query($stmt);

$cursos = $result->fetch_all(MYSQLI_ASSOC);
print_r($cursos);

?>