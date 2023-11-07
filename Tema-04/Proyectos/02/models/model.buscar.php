<?php 

# Generar la tabla

$articulos = generarTablaArticulos();
$categorias = generarTablaCategorias();
$marcas = generarTablaMarcas();

$expresion = $_GET['expresion'];

$articulos = filtrar($articulos, $expresion);

?>