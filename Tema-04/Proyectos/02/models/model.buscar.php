<?php 

# Generar la tabla

$categorias = ArrayArticulos::getCategorias();
$marcas = ArrayArticulos::getMarcas();
$articulos = new ArrayArticulos();
$articulos->getDatos();

$expresion = $_GET['expresion'];

$articulos = filtrar($articulos, $expresion);

?>