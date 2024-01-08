<?php

/*
    Ejemplo 7.3
    Sesión Personalizada

    No es recomendable personalizar la sesión
*/

# Personalizar sesión
session_id(13052004);
session_name("MI_SESION");

# Inicio sesión
session_start();

echo 'Sesión iniciada';

echo '<br>';

echo 'ID de sesión / SID: '. session_id();

echo '<br>';

echo 'Nombre de la sesión / NAME: ' . session_name();

?>