<?php

class MovimientoModel extends Model {

    public function create() {
        
    }
    public function get() {
        try {
            $query = "SELECT * FROM movimientos ORDER BY id;";

            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare();

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();
            
            return $pdostmt;
        }
        catch(PDOException $ex) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }
    public function read($id) {
        try {
            $query = "SELECT * FROM movimientos WHERE id = :id ORDER BY id;";

            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare();

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();
            
            return $pdostmt;
        }
        catch(PDOException $ex) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }
    public function filtrar($expresion) {
        try {

        }
        catch(PDOException $ex) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }
    public function ordenar($criterio) {
        try {

        }
        catch(PDOException $ex) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }
}

?>