<?php

# Cargamos configuración
include('config/db.php');


# Cargamos clases en orden
include('class/class.conexion.php');
include('class/class.maratoon.php');
include('class/class.corredor.php');

# Cargo modelo
include('models/model.index.php');

# Cargo vista
include('views/view.index.php');

?>