<?php

/*

    Crear un array con los detalles de los alumnos

*/

setlocale(LC_MONETARY, "es_ES");

// Conexión con la base de datos
$db = new Fp();

// Cargar alumnos
$alumnos = $db->getAlumnos();

?>