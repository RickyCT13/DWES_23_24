<?php

echo "<h3>Actividad 2.2 (Versión con la función settype();)</h3>";

$miVariable = "Hola, mundo.";

settype($miVariable, "int");
echo $miVariable;
echo "<br>";

settype($miVariable, "bool");
echo $miVariable;
echo "<br>";

settype($miVariable, "string");
echo $miVariable;
echo "<br>";

settype($miVariable, "float");
echo $miVariable;
echo "<br>";

?>