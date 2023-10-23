<?php

# Generar la tabla

$libros = generarTabla();

$id = $_GET['id'];

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$editorial = $_POST['editorial'];
$genero = $_POST['genero'];
$precio = $_POST['precio'];

$idEdit = $_GET['id'];

$indiceLibroEdit = buscarEnTabla($libros, 'id', $idEdit);

$libro = [
    'id' => $id,
    'titulo' => $titulo,
    'autor' => $autor,
    'editorial' => $editorial,
    'genero' => $genero,
    'precio' => $precio
];

$libros[$indiceLibroEdit] = $libro;

?>