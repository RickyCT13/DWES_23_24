<?php 

# Generar la tabla

$articulos = generarTablaArticulos();
$categorias = generarTablaCategorias();
$marcas = generarTablaMarcas();

# Recibir por POST los datos
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$indiceCategorias = $_POST['categorias'];
$unidades = $_POST['unidades'];
$precio = $_POST['precio'];

$valoresNuevoArticulo = [
    $descripcion,
    $modelo,
    $marca,
    $indiceCategorias,
    $unidades,
    $precio
];

nuevo($articulos, $valoresNuevoArticulo);

?>