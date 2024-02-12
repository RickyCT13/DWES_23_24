<?php

/*
    Ejemplo 10.1: Enviar emails con PHP
    Función mail()
*/

/*
    Cabecera
*/

$header = "Mime-version: 1.0" . "\n";
$header .= "Content-type: text/html; charset-iso-8859-1" . "\n";
$header .= "From: Ricardo Moreno Cantea <ricardomorenocantea13@gmail.com>" . "\n";
$header .= "cc: ricardomorenocantea13@gmail.com" . "\n";
$header .= "X-Mailer: PHP/" . phpversion();

/*
    Parámetros
*/
$destino = "hola@ae.com";
$asunto = "Mensaje prueba mail()";
$mensaje = "Este correo ha sido enviado usando la función mail() de PHP";


/*
    Envío
*/
if (mail($destino, $asunto, $mensaje, $header)) {
    echo '<p>Correo Enviado.</p>';
}
else {
    echo '<p>Error de envío.</p>';
}

?>