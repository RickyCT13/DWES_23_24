<?php

# Cargamos configuración
include('config/db.php');

# Cargamos clases en orden
include('class/class.conexion.php');
include('class/class.maratoon.php');
include('class/class.corredor.php');

include 'models/model.eliminar.php';

include 'views/view.eliminar.php';

?>