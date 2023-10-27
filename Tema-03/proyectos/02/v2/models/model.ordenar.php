<?php 

# Generar la tabla

$articulos = generarTablaArticulos();
$categorias = generarTablaCategorias();

$criterio = $_GET['criterio'];

$articulos = ordenar($articulos, $criterio);

?>