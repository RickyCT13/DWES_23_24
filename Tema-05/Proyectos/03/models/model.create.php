<?php

setlocale(LC_MONETARY, "es_ES");

// Conexión con la base de datos
$db = new Maratoon();

// Cargar corredores
$corredores = $db->getCorredores();

$categorias = $db->getCategorias();

$clubs = $db->getClubs();

$corredor = new Corredor();

$corredor->nombre = $_POST['nombre'];
$corredor->apellidos = $_POST['apellidos'];
$corredor->ciudad = $_POST['ciudad'];
$corredor->fechaNacimiento = $_POST['fechaNac'];
$corredor->sexo = $_POST['sexo'];
$corredor->email = $_POST['email'];
$corredor->dni = $_POST['dni'];
$corredor->id_categoria = $_POST['categoria'];
$corredor->id_club = $_POST['club'];

$db->crudCreate($corredor);

$corredores = $db->getCorredores();


?>