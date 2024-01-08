<?php

/*
    Ejemplo 7.4
    Crear sesión
*/

# Inicio sesión
session_start();

echo 'Sesión iniciada';

echo '<br>';

echo 'ID de sesión / SID: '. session_id();

echo '<br>';

echo 'Nombre de la sesión / NAME: ' . session_name();

?>