<?php

/*

    Crear un array con los detalles de los alumnos

*/

setlocale(LC_MONETARY, "es_ES");

// Conexión con la base de datos
$db = new Maratoon();

// Cargar alumnos
$corredores = $db->getCorredores();

?>