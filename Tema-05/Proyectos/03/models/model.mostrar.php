<?php 

setlocale(LC_MONETARY, "es_ES");

// Conexión con la base de datos
$db = new Maratoon();

// Cargar alumnos
$corredores = $db->getCorredores();

$categorias = $db->getCategorias();

$clubs = $db->getClubs();

$id = $_GET['id'];

$corredor = $db->crudRead($id);

$categoria = $db->categoriaCorredor($id);

$club = $db->clubCorredor($id);

?>