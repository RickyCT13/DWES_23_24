<?php

    /*

        model.create.PHP

        - Añade un elemento a la tabla 

    */
$paises = getPaises();
$generos = getGeneros();
$peliculas = getPeliculas();
$nuevaPelicula = [
    'id' => count($peliculas) + 1,
    'titulo' => $_POST['titulo'],
    'pais' => $_POST['pais'],
    'director' => $_POST['director'],
    'generos' => $_POST['generos'],
    'año' => $_POST['año']
];

$peliculas[] = $nuevaPelicula;


?>