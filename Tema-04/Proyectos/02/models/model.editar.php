<?php 

# Generar la tabla

$articulos = generarTablaArticulos();
$categorias = generarTablaCategorias();
$marcas = generarTablaMarcas();

$id = $_GET['id'];

$indiceEditar = buscarEnTabla($articulos, 'id', $id);

if ($indiceEditar !== false) {
    $articulo = $articulos[$indiceEditar];
}
else {
    echo "Error: articulo no encontrado";
    exit();
}

?>