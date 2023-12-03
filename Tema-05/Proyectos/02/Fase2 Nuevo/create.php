<?php

# Cargamos configuración
include('config/db.php');

# Cargamos librería de funciones

# Cargamos clases en orden
include('class/class.conexion.php');
include('class/class.fp.php');
include('class/class.alumno.php');
include('class/class.curso.php');

include 'models/model.create.php';

include 'views/view.index.php';

?>