<?php 

setlocale(LC_MONETARY, "es_ES");

// Conexión con la base de datos
$db = new Maratoon();

// Cargar alumnos
$corredores = $db->getCorredores();

$categorias = $db->getCategorias();

$clubs = $db->getClubs();

$idElim = $_GET['id'];

$corredorElim = $db->getCorredorFormat($idElim);

?>