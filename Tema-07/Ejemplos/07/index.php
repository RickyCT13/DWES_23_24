<?php

/* 
    Ejemplo 7.7: Contador de visitas
*/

// Comprobar si existe la cookie contador
if (isset($_COOKIE['contador'])) {
    // Actualiza el numero de visitas. La cookie expirará en un año
    $numVisitas = $_COOKIE['contador'];
    $numVisitas++;
    setcookie('contador', $numVisitas, time() + 365 * 24 * 60 * 60);
}
else {
    $numVisitas = 1;
    setcookie('contador', $numVisitas, time() + 365 * 24 * 60 * 60);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 7.7:  Contador de visitas</title>
</head>
<body>
    <ul>
        <li>
            <a href="crearCookie.php">Crear cookie</a>
        </li>
        <li>
            <a href="mostrarCookie.php">Mostrar cookie</a>
        </li>
        <li>
            <a href="eliminarCookie.php">Eliminar cookie</a>
        </li>
    </ul>
    <p><strong>Numero de visitas: <?=$numVisitas?></strong></p>
</body>
</html>