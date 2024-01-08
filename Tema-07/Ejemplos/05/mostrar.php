<?php

/*
    Ejemplo 7.5
    Mostrar valor de variables de sesión 
*/

# Inicio sesión
session_start();

# Mostrar variables sesión
echo 'Nombre: ' . $_SESSION['nombre'];
echo '<br>';
echo 'Apellidos: ' . $_SESSION['apellidos'];
echo '<br>';
echo 'id: ' . $_SESSION['id'];

?>