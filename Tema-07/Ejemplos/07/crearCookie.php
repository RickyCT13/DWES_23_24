<?php

/* 
    Ejemplo 7.6: Creación de cookies
*/

// La cookie expirará a los 60 minutos
$expiracion = time() + 60 * 60;

/* Crear cookie de nombre y cookie de apellidos */

// Nombre
setcookie('nombre', 'Ricardo', $expiracion);

// Apellidos
setcookie('apellidos', 'Moreno Cantea', $expiracion);

echo 'Cookies creadas correctamente';




?>