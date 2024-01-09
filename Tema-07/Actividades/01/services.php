<?php

// Inicio sesión
session_start();

// Contador de visitas
if (isset($_SESSION['numVisitasServices'])) {
    $_SESSION['numVisitasServices']++;
}
else {
    $_SESSION['numVisitasServices'] = 1;
}

// Fecha y hora de inicio de sesión
if (!isset($_SESSION['fechaHoraIniSesion'])) {
    $_SESSION['fechaHoraIniSesion'] = new DateTime('now');
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
        <a href="close.php">Close</a>
    </nav>
    <h1>Detalles</h1>
    <ul>
        <li>Nombre de la página: services.php</li>
        <li>SID: <?=session_id()?></li>
        <li>Nombre de la sesión: <?=session_name()?></li>
        <li>Fecha de inicio de sesión: <?=date_format($_SESSION['fechaHoraIniSesion'], "d/m/Y h:i:s")?></li>
        <li>Visitas a esta página: <?=$_SESSION['numVisitasServices']?></li>
    </ul>

</body>

</html>