<?php

/**
 * 
 * Conexión localhost (127.0.0.1:3306) con usuario root
 * a la base de datos fp
 * - Conexión mediante mysqli_connect()
 */


$servidor = 'localhost';
$user = 'root';
$pass = '';
$bd = 'AAAAAAAAAAAAA';

$conexion = mysqli_connect($servidor, $user, $pass, $bd);

if (mysqli_connect_errno()) {
    echo 'Error de conexión. Nº del error: '. mysqli_connect_errno();
    echo '<br>';
    echo 'Error de conexión: '. mysqli_connect_error();
    exit();
}

echo 'Conexión establecida con éxito';


?>