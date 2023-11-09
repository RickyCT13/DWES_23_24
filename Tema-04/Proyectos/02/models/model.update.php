<?php 

# Generar la tabla

$categorias = ArrayArticulos::getCategorias();
$marcas = ArrayArticulos::getMarcas();

$articulos = new ArrayArticulos();
$articulos->getDatos();

$indice = $_GET['indice'];
$articuloEdit = $articulos->crudRead($indice);

$articuloEdit->setDescripcion($_POST['descripcion']);
$articuloEdit->setModelo($_POST['modelo']);
$articuloEdit->setMarca($_POST['marca']);
$articuloEdit->setCategorias($_POST['categorias']);
$articuloEdit->setUnidades($_POST['unidades']);
$articuloEdit->setPrecio($_POST['precio']);

$articulos->crudUpdate($indice, $articuloEdit);

?>