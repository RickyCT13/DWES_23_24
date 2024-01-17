<?php

/*
    clase: classCorredor.php
    Almacena los datos de un corredor en un objeto.
    No cumple la propiedad de encapsulamiento
*/

class ClassCorredor {
    public
    $id,
    $nombre,
    $apellidos,
    $ciudad,
    $fechaNacimiento,
    $sexo,
    $email,
    $dni,
    $edad,
    $id_categoria,
    $id_club;

    public function __construct(
        $id = null,
        $nombre = null,
        $apellidos = null,
        $ciudad = null,
        $fechaNacimiento = null,
        $sexo = null,
        $email = null,
        $dni = null,
        $id_categoria = null,
        $id_club = null
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->ciudad = $ciudad;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->sexo = $sexo;
        $this->email = $email;
        $this->dni = $dni;
        $this->id_categoria = $id_categoria;
        $this->id_club = $id_club;
    }

}

?>