<?php 

# Generar la tabla

$articulos = generarTablaArticulos();
$categorias = generarTablaCategorias();

$id = $_GET['id'];
$descripcion = $_POST['descripcion'];
$modelo = $_POST['modelo'];
$categoria = $_POST['categoria'];
$unidades = $_POST['unidades'];
$precio = $_POST['precio'];

$valoresActualizarArticulo = [
    $descripcion,
    $modelo,
    $categoria,
    $unidades,
    $precio
];

actualizar($articulos, $id, $valoresActualizarArticulo);

?>