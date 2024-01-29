<?php

/*
    Ejemplo 10
    Contenido de un directorio
*/


// Mostrar dir. actual
echo 'Directorio actual: ' . getcwd();

echo '<br>';

// Obtener contenido del dir. files
$contenido = scandir('files');

print_r($contenido);
