<?php

# Generar la tabla

$libros = generarTabla();

$criterio = $_GET['criterio'];

$libros = ordenar($libros, $criterio);

?>