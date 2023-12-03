<?php 

# Generar la tabla

$categorias = ArrayArticulos::getCategorias();
$marcas = ArrayArticulos::getMarcas();
$articulos = new ArrayArticulos();
$articulos->getDatos();

$indice = $_GET['indice'];
$articulo = $articulos->crudRead($indice);

?>