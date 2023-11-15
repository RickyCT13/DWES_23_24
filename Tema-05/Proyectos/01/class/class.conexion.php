<?php

/**
 * Clase conexión mediante mysqli
 */

class Conexion {
    public $db;
    public function __construct($dbname) {
        try {
            $this->db = new mysqli("localhost", "root", "", (string) $dbname);
            if ($this->db->connect_error) {
                throw new Exception("ERROR");
            }
        }
        catch (Exception $ex) {
            echo "ERROR". $ex->getMessage();
            echo "<br>";
            echo "CÓDIGO". $ex->getCode();
            echo "<br>";
            echo "FICHERO". $ex->getFile();
            echo "<br>";
            echo "LÍNEA". $ex->getLine();
            echo "<br>";
        }
    }
}

?>