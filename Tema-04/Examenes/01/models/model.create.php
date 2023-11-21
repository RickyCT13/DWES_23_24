<?php

# Creo el objeto de la clase arrayUsuarios
$jugadores = new ArrayJugadores();

# Obtengo arrays de paises, posiciones y equipos
$paises = ArrayJugadores::getPaises();
$posiciones = ArrayJugadores::getPosiciones();
$equipos = ArrayJugadores::getEquipos();

# Cargo los datos
$jugadores->getDatos();

// Create

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$numero = $_POST['numero'];
$pais = $_POST['pais'];
$equipo = $_POST['equipo'];
$posiciones = $_POST['posiciones'];
$contrato = $_POST['contrato'];

$jugador = new Jugador(
    $id,
    $nombre,
    $numero,
    $pais,
    $equipo,
    $posiciones,
    $contrato
);

$jugadores->crudCreate($jugador);

?>
