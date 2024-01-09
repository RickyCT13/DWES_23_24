<?php


// Fecha y hora de inicio de sesión
session_start();

$_SESSION['fechaHoraCierreSesion'] = new DateTime('now');

$sid = session_id();

$nombreSesion = session_name();

$fechaIniSesion = $_SESSION['fechaHoraIniSesion'];

$fechaCierreSesion = $_SESSION['fechaHoraCierreSesion'];

$duracionSesion = date_diff($_SESSION['fechaHoraIniSesion'], $_SESSION['fechaHoraCierreSesion']);

$visitasTotales = $_SESSION['numVisitasHome'] + $_SESSION['numVisitasAbout'] + $_SESSION['numVisitasServices'] + $_SESSION['numVisitasEvents'];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DWES Actividad 7.1</title>
</head>

<body>
    <h1>Detalles</h1>
    <ul>
        <li>SID: <?= $sid ?></li>
        <li>Nombre de la sesión: <?= $nombreSesion ?></li>
        <li>Fecha de inicio de sesión: <?= date_format($fechaIniSesion, "d/m/Y h:i:s") ?></li>
        <li>Fecha de cierre de sesión: <?= date_format($fechaCierreSesion, "d/m/Y h:i:s") ?></li>
        <li>Duración de la sesión: <?=$duracionSesion->format('%h Horas, %i minutos, %s segundos')?></li>
        <li>Visitas totales: <?= $visitasTotales ?></li>
    </ul>

</body>

</html>