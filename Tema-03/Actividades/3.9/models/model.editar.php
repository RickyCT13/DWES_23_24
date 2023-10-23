<?php

$id = $_GET['id'];

$indiceEditar = buscarEnTabla($libros, 'id', $id);

if ($indiceEditar !== false) {
    $libro = $libros[$indiceEditar];
}
else {
    echo "Error: Libro no encontrado";
    exit();
}

?>