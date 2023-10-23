<?php

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$editorial = $_POST['editorial'];
$genero = $_POST['genero'];
$precio = $_POST['precio'];

$nuevoLibro = [
    'id' => $id,
    'titulo' => $titulo,
    'autor' => $autor,
    'editorial' => $editorial,
    'genero' => $genero,
    'precio' => $precio
];

$libros = (array) $libros;

nuevo($libros, $nuevoLibro);

?>