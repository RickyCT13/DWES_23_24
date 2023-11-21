<?php

# Creo el objeto de la clase arrayUsuarios
$jugadores = new ArrayJugadores();

# Obtengo arrays de paises, posiciones y equipos
$paises = ArrayJugadores::getPaises();
$posiciones = ArrayJugadores::getPosiciones();
$equipos = ArrayJugadores::getEquipos();

# Cargo los datos
$jugadores->getDatos();
    
?>