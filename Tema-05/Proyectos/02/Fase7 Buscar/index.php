<?php

# Cargamos configuración
include('config/db.php');

# Cargamos librería de funciones

# Cargamos clases en orden
include('class/class.conexion.php');
include('class/class.fp.php');
include('class/class.alumno.php');
include('class/class.curso.php');

# Cargo modelo
include('models/model.index.php');

# Cargo vista
include('views/view.index.php');

?>