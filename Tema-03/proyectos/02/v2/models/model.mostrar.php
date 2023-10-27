<?php 

# Generar la tabla

$articulos = generarTablaArticulos();
$categorias = generarTablaCategorias();

$id = $_GET['id'];

$indiceMostrar = buscarEnTabla($articulos, 'id', $id);

if ($indiceMostrar !== false) {
    $articulo = $articulos[$indiceMostrar];
}
else {
    echo "Error: articulo no encontrado";
    exit();
}

?>