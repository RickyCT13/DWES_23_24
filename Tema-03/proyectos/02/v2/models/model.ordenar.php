<?php 

# Generar la tabla

$articulos = generarTablaArticulos();
$categorias = generarTablaCategorias();
$marcas = generarTablaMarcas();

$criterio = $_GET['criterio'];

$articulos = ordenar($articulos, $criterio);

?>