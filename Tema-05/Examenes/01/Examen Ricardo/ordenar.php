<?php

    /*
        ordenar.php

        Permite mostrar los libros ordenados por criterio ASC a partir de las siguientes columnas:
        - id
        - titulo
        - autor
        - editorial
        - unidades
        - coste
        - pvp

    */

/* Cargar archivo de configuración */
include 'config/config.php';

/* Cargar clases necesarias en orden */
include 'class/class.conexion.php';
include 'class/class.libros.php';
include 'class/class.libro.php';

/* Cargar modelo y/o vista */
include 'models/model.ordenar.php';
include 'views/view.index.php';

?>