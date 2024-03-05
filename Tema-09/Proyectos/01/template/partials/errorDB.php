<?php

echo "ERROR BASE DE DATOS: ";
echo "<HR>";
echo "Mensaje:      ". $ex->getMessage(). '<BR>';
echo 'Código e:     '. $ex->getCode(). '<BR>';
echo 'Fichero:      '. $ex->getFile(). '<BR>';
echo 'Linea:        '. $ex->getLine(). '<BR>';
echo 'Trace:        '. $ex->getTraceAsString(). '<BR>';

?>