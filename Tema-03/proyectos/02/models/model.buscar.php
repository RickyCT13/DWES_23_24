<?php 

# Generar la tabla

$articulos = generarTablaArticulos();
$categorias = generarTablaCategorias();

$expresion = $_GET['expresion'];

$articulos = filtrar($articulos, $expresion);

?>