<?php

# Generar la tabla

$libros = generarTabla();

$expresion = $_GET['expresion'];

$libros = filtrar($libros, $expresion);

?>