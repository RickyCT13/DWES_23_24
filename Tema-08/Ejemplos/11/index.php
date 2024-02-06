<?php

/*
    Ejemplo 10
    Abrir, leer y cerrar directorio  
*/


// Mostrar dir. actual
echo 'Directorio actual: ' . getcwd();

// Abrir directorio con opendir()
if ($gestor = opendir('files')) {
    echo 'Gestor de directorio: ' . $gestor . '<br>';

    // Leer contenido del dir. con readdir()
    while ($entrada = readdir($gestor)) {
        echo $entrada . '<br>';
    }
    // Cerrar el directorio con closedir()
    closedir($gestor);
    echo 'Directorio abierto correctamente';
}
else {
    echo 'Error en la apertura del directorio';
}
