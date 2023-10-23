<?php

# Generar la tabla

$libros = generarTabla();

$id = $_GET['id'];


$id = $_GET['id'];

$idElim = buscarEnTabla($libros, 'id', $id);

if ($idElim !== false) {
    eliminar($libros, $id);
}
else {
    echo "Error: Libro no encontrado";
    exit();
}

?>