<?php

/*  
    Ejemplo 7.1
    Inicio de sesión y id de sesión
*/

# Inicio sesión
session_start();

echo 'Sesión iniciada';

echo '<br>';

echo 'ID de sesión / SID: '. session_id();
?>