<?php

$indice = $_GET['indice'];

$indiceElim = buscarEnTabla($libros, 'id', $indice);

if ($indiceElim !== false) {
    unset($libros[$indiceElim]);
}
else {
    echo "Error: Libro no encontrado";
    exit();
}

?>