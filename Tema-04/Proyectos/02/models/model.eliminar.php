<?php 

# Generar la tabla

$articulos = generarTablaArticulos();
$categorias = generarTablaCategorias();
$marcas = generarTablaMarcas();

$id = $_GET['id'];

eliminar($articulos, $id);

?>