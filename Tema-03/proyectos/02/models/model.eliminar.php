<?php 

# Generar la tabla

$articulos = generarTablaArticulos();
$categorias = generarTablaCategorias();

$id = $_GET['id'];

eliminar($articulos, $id);

?>