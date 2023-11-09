<?php 

# Generar la tabla

$categorias = ArrayArticulos::getCategorias();
$marcas = ArrayArticulos::getMarcas();
$articulos = new ArrayArticulos();
$articulos->getDatos();

$criterio = $_GET['criterio'];

$articulos->setTabla($articulos->ordenar($criterio));

?>