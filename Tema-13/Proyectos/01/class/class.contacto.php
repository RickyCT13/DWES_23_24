<?php

/*
    Clase que contiene los datos que se aportan en el formulario
    de contacto, con el propósito, como es usual, de rellenar el
    formulario con los datos válidos en caso de error.

    La clase no sigue el principio de encapsulamiento.
*/

class ClassContacto {
    public
    $nombre,
    $email,
    $asunto,
    $mensaje;

    public function __construct(
        $nombre = null,
        $email = null,
        $asunto = null,
        $mensaje = null,


    ) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->asunto = $asunto;
        $this->mensaje = $mensaje;
    }
}

?>