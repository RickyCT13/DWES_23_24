<?php

    /*
        Muestra formulario para crear nuevo libro

        Necesito obtener las editoriales y los autores para generación dinámica del combox 
        para autores y editoriales
    */

   

$db = new Libros();
    
$libros = $db->getLibros(); 

$autores = $db->getAutores();

$editoriales = $db->getEditoriales();
?>