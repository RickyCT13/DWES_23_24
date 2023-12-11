<?php 

setlocale(LC_MONETARY, "es_ES");

// Conexión con la base de datos
$db = new Maratoon();

$corredores = $db->getCorredores();

$categorias = $db->getCategorias();

$clubs = $db->getClubs();

$id = $_GET['id'];

$corredor = new Corredor();

$corredor->nombre = $_POST['nombre'];
$corredor->apellidos = $_POST['apellidos'];
$corredor->ciudad = $_POST['ciudad'];
$corredor->fechaNacimiento = $_POST['fechaNac'];
$fechaNac = new DateTime($corredor->fechaNacimiento);
$now = new DateTime();
$corredor->edad = intval(date_diff($fechaNac, $now)->format("%R%y"));
$corredor->sexo = $_POST['sexo'];
$corredor->email = $_POST['email'];
$corredor->dni = $_POST['dni'];
$corredor->id_categoria = $_POST['categoria'];
$corredor->id_club = $_POST['club'];

$db->crudUpdate($id, $corredor);

$db = new Maratoon();

$corredores = $db->getCorredores();

$categorias = $db->getCategorias();

$clubs = $db->getClubs();

?>