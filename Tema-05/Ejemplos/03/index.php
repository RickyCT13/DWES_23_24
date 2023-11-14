<?php

/**
 * 
 * Conexión localhost (127.0.0.1:3306) con usuario root
 * a la base de datos fp
 * - Conexión mediante clase mysqli
 */


$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'fp';

$connection = new mysqli($server, $user, $pass, $db);

if ($connection->connect_errno) {
    echo 'Error de conexión. Nº del error: ' . $connection->connect_errno;
    echo '<br>';
    echo 'Error de conexión: ' . $connection->connect_error;
    exit();
}

echo 'Conexión establecida con éxito';

$sql = 'SELECT * FROM alumnos ORDER BY id';

$result = $connection->query($sql);

echo '<br>';

echo 'Número de registros: ' . $result->num_rows;

echo '<br>';

echo 'Número de columnas: ' . $result->field_count;

echo '<br>';

// Devuelve un array asociativo

$alumnos = $result->fetch_all(MYSQLI_ASSOC);

foreach ($alumnos as $alumno) {
    foreach ($alumno as $indice => $campo) {
        echo $indice.': '.$campo;
        echo '<br>';
    }
    echo '<hr>';
}

?>
