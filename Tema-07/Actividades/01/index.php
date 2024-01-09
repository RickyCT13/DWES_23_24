<?php

// Inicio sesión
session_start();

// Contador de visitas
if (isset($_SESSION['numVisitasHome'])) {
    $_SESSION['numVisitasHome']++;
}
else {
    $_SESSION['numVisitasHome'] = 1;
}



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DWES Actividad 7.1</title>
</head>

<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="services.php">Services</a>
        <a href="events.php">Events</a>
    </nav>
    <h1>Detalles</h1>
    <ul>
        <li>Nombre de la página: <?=?></li>
        <li>SID: <?=?></li>
        <li>Nombre de la sesión: <?=?></li>
        <li>Fecha de inicio de sesión: <?=?></li>
        <li>Visitas a esta página: <?=?></li>

    </ul>

</body>

</html>