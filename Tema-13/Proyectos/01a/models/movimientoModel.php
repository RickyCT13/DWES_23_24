<?php

class MovimientoModel extends Model {
    public function get() {
        try {
            $query = "SELECT 
            mo.id,
            cu.num_cuenta as cuenta,
            mo.fecha_hora,
            mo.concepto,
            mo.tipo,
            mo.cantidad,
            mo.saldo
            FROM movimientos mo INNER JOIN cuentas cu ON mo.id_cuenta = cu.id ORDER BY mo.id";

            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($query);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;
        } catch (PDOException $ex) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }
    public function read($id) {
        try {
            $query = "SELECT * FROM movimientos WHERE id = :id LIMIT 1";

            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($query);

            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt->fetch();
        } catch (PDOException $ex) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }
    public function create($movimiento) {
        try {
            $query = "INSERT INTO movimientos VALUES (
                null,
                :id_cuenta,
                :fecha_hora,
                :concepto,
                :tipo,
                :cantidad,
                :saldo,
                null,
                null
            );";

            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($query);

            $pdostmt->bindParam(':id_cuenta', $movimiento->id_cuenta, PDO::PARAM_INT);
            $pdostmt->bindParam(':fecha_hora', $movimiento->fecha_hora);
            $pdostmt->bindParam(':concepto', $movimiento->concepto, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':tipo', $movimiento->tipo, PDO::PARAM_STR);
            $pdostmt->bindParam(':cantidad', $movimiento->cantidad, PDO::PARAM_INT);
            $pdostmt->bindParam(':saldo', $movimiento->saldo, PDO::PARAM_INT);

            $pdostmt->execute();
        } catch (PDOException $ex) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }


    public function order(int $criterio) {
        try {
            $query = "SELECT 
                mo.id,
                cu.num_cuenta as cuenta,
                mo.fecha_hora,
                mo.concepto,
                mo.tipo,
                mo.cantidad,
                mo.saldo
                FROM movimientos mo INNER JOIN cuentas cu ON mo.id_cuenta = cu.id ORDER BY :criterio
            ";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($query);
            $pdostmt->bindParam(':criterio', $criterio, PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            return $pdostmt;
        } catch (PDOException $ex) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function filter($expresion) {
        try {
            $query = "                
            SELECT 
            mo.id,
            cu.num_cuenta as cuenta,
            mo.fecha_hora,
            mo.concepto,
            mo.tipo,
            mo.cantidad,
            mo.saldo
            FROM movimientos INNER JOIN cuentas ON mo.id_cuenta = cu.id 
            WHERE concat_ws(' ',             
                mo.id,
                cu.num_cuenta,
                mo.fecha_hora,
                mo.concepto,
                mo.tipo,
                mo.cantidad,
                mo.saldo) LIKE :expresion";

            $conexion = $this->db->connect();

            $expresion = "%" . $expresion . "%";
            $pdostmt = $conexion->prepare($query);

            $pdostmt->bindValue(':expresion', $expresion, PDO::PARAM_STR);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();

            return $pdostmt;
        } catch (PDOException $ex) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }
    public function getCuentas() {
        try {
            $query = "SELECT * from cuentas";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($query);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            return $pdostmt;
        } catch (PDOException $ex) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function getCuenta($id) {
        try {
            

            $query = " 
                    SELECT 
                        cuentas.id,
                        cuentas.num_cuenta,
                        cuentas.id_cliente,
                        cuentas.fecha_alta,
                        cuentas.fecha_ul_mov,
                        cuentas.num_movtos,
                        cuentas.saldo
                    FROM 
                        cuentas
                    WHERE
                        id=:id;";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($query);
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();

            return $pdostmt->fetch();
        } catch (PDOException $ex) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function getSaldoCuenta($id) {
        try {
            $query = "SELECT saldo FROM cuentas WHERE id = :id";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($query);
            $pdostmt->bindParam(":id", $id, PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();

            return $pdostmt->fetchColumn();
        } catch (PDOException $ex) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function actualizarSaldoCuenta($id, $nuevoSaldo) {
        try {
            $query = "UPDATE cuentas SET saldo = :nuevoSaldo WHERE id = :id";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($query);
            $pdostmt->bindParam(":id", $id, PDO::PARAM_INT);
            $pdostmt->bindParam(":nuevoSaldo", $nuevoSaldo, PDO::PARAM_INT);
            $pdostmt->execute();
        } catch (PDOException $ex) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }
}
