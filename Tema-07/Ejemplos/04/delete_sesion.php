<?php

/*
    Ejemplo 7.4
    Destruir sesión
*/

# Continuo con la sesión
session_start();
echo 'Sesión iniciada';

# Detalles de la sesión
echo '<br>';
echo 'ID de sesión / SID: '. session_id();
echo '<br>';
echo 'Nombre de la sesión / NAME: ' . session_name();

# Elimino sesión
session_destroy();
session_unset();

?>