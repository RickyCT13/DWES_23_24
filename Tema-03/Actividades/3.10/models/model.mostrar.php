<?php

# Generar la tabla

$libros = generarTabla();

$id = $_GET['id'];


$id = $_GET['id'];

$indiceMostrar = buscarEnTabla($libros, 'id', $id);

if ($indiceMostrar !== false) {
    $libro = $libros[$indiceMostrar];
}
else {
    echo "Error: Libro no encontrado";
    exit();
}

?>