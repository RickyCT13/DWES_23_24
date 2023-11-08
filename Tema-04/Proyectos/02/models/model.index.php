<?php

# Generación de tablas

$articulos = new ArrayArticulos();
$articulos->setTabla(ArrayArticulos::getDatos());
$categorias = ArrayArticulos::getTablaCategorias();
$marcas = ArrayArticulos::getTablaMarcas();

?>