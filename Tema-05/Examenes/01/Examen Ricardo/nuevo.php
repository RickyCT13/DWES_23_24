<?php

    /*

        nuevo.php

        Controlador que permite acceder a geslibros, extraer la lista de Autores y Editoriales
        y mostrar el formulario que permitirá añadir nuevo libro.

    */

/* Cargar archivo de configuración */
include 'config/config.php';

/* Cargar clases necesarias en orden */
include 'class/class.conexion.php';
include 'class/class.libros.php';
include 'class/class.libro.php';

/* Cargar modelo y/o vista */
include 'models/model.nuevo.php';
include 'views/view.nuevo.php';

?>