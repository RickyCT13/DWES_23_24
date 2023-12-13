<?php

   /*
        create.php

        Controlador que permite añadir un nuevo libro a la tabla libros de geslibros

   */

/* Cargar archivo de configuración */
include 'config/config.php';

/* Cargar clases necesarias en orden */
include 'class/class.conexion.php';
include 'class/class.libros.php';
include 'class/class.libro.php';

/* Cargar modelo y/o vista */
include 'models/model.create.php';
include 'views/view.index.php';

?>