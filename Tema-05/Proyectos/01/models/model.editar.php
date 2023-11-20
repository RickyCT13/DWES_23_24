<?php 

setlocale(LC_MONETARY, "es_ES");

// Conexión con la base de datos
$db = new Fp();

// Cargar alumnos
$alumnos = $db->getAlumnos();

$tablaAlumnos = $alumnos->fetch_all(MYSQLI_ASSOC);

$stmt = "SELECT id, nombre FROM cursos ORDER BY id";

$result = $db->db->query($stmt);

$cursos = $result->fetch_all(MYSQLI_ASSOC);



$id = $_GET['id'];

$stmt = $db->db->prepare("SELECT * FROM alumnos WHERE id = ?");

$stmt->bind_param('i', $id);

$stmt->execute();

$result = $stmt->get_result();

$alumnoEdit = $result->fetch_assoc();



?>