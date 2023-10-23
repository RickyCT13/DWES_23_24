<?php

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$genero = $_POST['genero'];
$precio = $_POST['precio'];

$nuevoLibro = [
    'id' => $id,
    'titulo' => $titulo,
    'autor' => $autor,
    'genero' => $genero,
    'precio' => $precio
];

$libros = (array) $libros;

nuevo($libros, $nuevoLibro);

?>