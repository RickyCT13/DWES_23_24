<?php

/* 
    Ejemplo 7.5
    Creación de variables de sesión
*/

# Inicio sesión
session_start();

# Crear variable de sesión

$_SESSION['nombre'] = 'Fulanito';
$_SESSION['apellidos'] = 'Gómez Pérez';
$_SESSION['id'] = 234;

echo 'Variables creadas';

?>