<?php

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