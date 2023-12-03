<?php 

# Generar la tabla

setlocale(LC_MONETARY, "es_ES");

// Conexión con la base de datos
$db = new Fp();

// Cargar alumnos
$alumnos = $db->getAlumnos();

$tablaAlumnos = $alumnos->fetch_all(MYSQLI_ASSOC);

$stmt = $db->db->prepare("UPDATE alumnos SET
nombre = ?,
apellidos = ?,
email = ?,
telefono = ?,
direccion = ?,
poblacion = ?,
provincia = ?,
nacionalidad = ?,
dni = ?,
fechaNac = ?,
id_curso = ?
WHERE id = ?
");
$stmt->bind_param(
    "ssssssssssii",
    $nombre,
    $apellidos,
    $email,
    $telefono,
    $direccion,
    $poblacion,
    $provincia,
    $nacionalidad,
    $dni,
    $fechaNac,
    $idCurso,
    $idEdit
);


$idEdit = $_GET['id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$poblacion = $_POST['poblacion'];
$provincia = $_POST['provincia'];
$nacionalidad = $_POST['nacionalidad'];
$dni = $_POST['dni'];
$fechaNac = $_POST['fechaNac'];
$idCurso = $_POST['curso'];

$stmt->execute();




?>