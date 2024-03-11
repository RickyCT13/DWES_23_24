<?php

    echo "ERROR: ";
    echo "<hr>";
    echo "Mensaje:         " . $ex->getMessage() . "<br>";
    echo "Codigo de error: " . $ex->getCode() . "<br>";
    echo "Fichero:         " . $ex->getFile() . "<br>";
    echo "Linea:           " . $ex->getLine() . "<br>";
    echo "Trace:           " . $ex->getTraceAsString() . "<br>";

?>
