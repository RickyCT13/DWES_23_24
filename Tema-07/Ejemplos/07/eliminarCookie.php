<?php

/* 
    Ejemplo 7.6: Eliminar cookies
*/

// Eliminar cookie nombre
setcookie('nombre', '', time() - 3600);

// Eliminar cookie apellidos
setcookie('apellidos', '', time() - 3600);

?>