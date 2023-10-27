<?php 

# Generar la tabla

$articulos = generarTablaArticulos();
$categorias = generarTablaCategorias();

# Recibir por POST los datos
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$categoria = $categorias[$_POST['categoria']];
$unidades = $_POST['unidades'];
$precio = $_POST['precio'];

$valoresNuevoArticulo = [
    $descripcion,
    $modelo,
    $categoria,
    $unidades,
    $precio
];

nuevo($articulos, $valoresNuevoArticulo);

?>