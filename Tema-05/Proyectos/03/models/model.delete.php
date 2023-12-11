<?php

# Generar la tabla

setlocale(LC_MONETARY, "es_ES");

$db = new Maratoon();

// Cargar corredores
$corredores = $db->getCorredores();

$categorias = $db->getCategorias();

$clubs = $db->getClubs();

$id = $_GET['id'];

$db->crudDelete($id);

$db = new Maratoon();

// Cargar corredores
$corredores = $db->getCorredores();

$categorias = $db->getCategorias();

$clubs = $db->getClubs();

?>