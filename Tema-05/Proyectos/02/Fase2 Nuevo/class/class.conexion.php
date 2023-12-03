<?php

/**
 * Clase conexión mediante mysqli
 */

class Conexion {
    protected $pdo;
    public function __construct($dbname) {
        try {
            $dsn = "mysql:host=" . SERVER . ";dbname=" . $dbname;

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => false,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . CHARSET . " COLLATE " . COLLATION
            ];

            $this->pdo = new PDO($dsn, USER, PASS, $options);

        }
        catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function cerrarConexion() {
        $this->pdo = null;
    }
}

?>