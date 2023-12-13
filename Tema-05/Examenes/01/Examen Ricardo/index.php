<?php

/*

        index.php

        Controlador que permite realizar una consulta de libros en geslibros y mostrarlos en
        una vista a partir del diseño establecido

*/


/* Cargar archivo de configuración */
include 'config/config.php';

/* Cargar clases necesarias en orden */
include 'class/class.conexion.php';
include 'class/class.libros.php';
include 'class/class.libro.php';

/* Cargar modelo y/o vista */
include 'models/model.index.php';
include 'views/view.index.php';

?>
