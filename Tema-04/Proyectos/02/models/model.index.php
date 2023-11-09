<?php

# Generación de tablas

setlocale(LC_MONETARY, "es_ES");

$categorias = ArrayArticulos::getCategorias();
$marcas = ArrayArticulos::getMarcas();
$articulos = new ArrayArticulos();
$articulos->getDatos();

?>