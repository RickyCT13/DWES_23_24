<?php

    /*

        Modelo: model.mostrar.PHP

        - Carga los datos
        - Recibo por GET indice de la película que se desea mostrar

    */
$paises = getPaises();
$generos = getGeneros();
$peliculas = getPeliculas();

$id = $_GET['id'];
$pelicula = $peliculas[$id - 1];
   
    
    

?>