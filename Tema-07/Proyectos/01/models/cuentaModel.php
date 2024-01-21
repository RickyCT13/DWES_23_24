<?php

/*
        clienteModel.php

        Modelo del controlador cuentas

        Definir los métodos de acceso a la base de datos

        - insert
        - update
        - select
        - delete
        - etc
    
        */

class CuentaModel extends Model
{

    /*
        Extrae los detalles de las cuentas
    */

    public function get()
    {
        try {
            //Sentencia SQL
            $query = "SELECT 
            cu.id,
            cu.num_cuenta,
            cl.nombre AS nombreCuenta,
            cl.apellidos AS apellidosCuenta,
            cu.fecha_alta,
            cu.fecha_ul_mov,
            cu.num_movtos,
            cu.saldo
            FROM cuentas AS cu
            INNER JOIN clientes AS cl ON cu.id_cliente = cl.id
            ORDER BY cu.id";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Ejecutamos con un prepare
            $pdostmt = $conexion->prepare($query);

            //Establecemos tipo fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            //Ejecutamos
            $pdostmt->execute();

            //Devolvemos el objeto pdostatement
            return $pdostmt;
        } catch (PDOException $ex) {
            include_once('template/partials/error.php');
            exit();
        }
    }

    public function create(classCuenta $cuenta)
    {
        try {

            //Creamos la query de SQL
            $query = "INSERT INTO cuentas VALUES (
                null,
                :num_cuenta,
                :id_cliente,
                :fecha_alta,
                :fecha_ul_mov,
                :num_movtos,
                :saldo,
                now(),
                now()
            )";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Ejecutamos con un prepare
            $pdostmt = $conexion->prepare($query);

            //Vinculamos los parámetros
            $pdostmt->bindParam(':num_cuenta', $cuenta->num_cuenta, PDO::PARAM_STR, 20);
            $pdostmt->bindParam(':id_cliente', $cuenta->id_cliente, PDO::PARAM_INT, 10);
            $pdostmt->bindParam(':fecha_alta', $cuenta->fecha_alta);
            $pdostmt->bindParam(':fecha_ul_mov', $cuenta->fecha_ul_mov);
            $pdostmt->bindParam(':num_movtos', $cuenta->num_movtos);
            $pdostmt->bindParam(':saldo', $cuenta->saldo, PDO::PARAM_STR);

            //Ejecutamos
            $pdostmt->execute();
        } catch (PDOException $ex) {
            include_once('template/partials/error.php');
            exit();
        }
    }

    public function read(int $id)
    {
        try {

            //Creamos la query de SQL
            $query = "SELECT * FROM cuentas WHERE id=:id";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Creamos un objeto pdostatement
            $pdostmt = $conexion->prepare($query);

            //Vincular los parámetros con valores
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            //Establecemos tipo fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            //Ejecutamos
            $pdostmt->execute();

            return $pdostmt->fetch();
        } catch (PDOException $ex) {
            include('template/partials/errorDB.php');
            exit();
        }
    }

    public function update(int $id, classCuenta $cuenta)
    {
        try {
            // Creamos la consulta a ejecutar
            $query = "UPDATE cuentas SET
                num_cuenta = :num_cuenta,
                id_cliente = :id_cliente,
                fecha_alta = :fecha_alta,
                fecha_ul_mov = :fecha_ul_mov,
                num_movtos = :num_movtos,
                saldo = :saldo,
                update_at = now()
            WHERE id = :id
            ";

            // Preparamos la consulta   
            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($query);

            // Vinculamos las parámetros
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdostmt->bindParam(':num_cuenta', $cuenta->num_cuenta, PDO::PARAM_STR, 20);
            $pdostmt->bindParam(':id_cliente', $cuenta->id_cliente, PDO::PARAM_INT, 10);
            $pdostmt->bindParam(':fecha_alta', $cuenta->fecha_alta);
            $pdostmt->bindParam(':fecha_ul_mov', $cuenta->fecha_ul_mov);
            $pdostmt->bindParam(':num_movtos', $cuenta->num_movtos);
            $pdostmt->bindParam(':saldo', $cuenta->saldo, PDO::PARAM_STR);

            // Ejecutamos la sentencia
            $pdostmt->execute();
        } catch (PDOException $ex) {
            include 'template/partials/errorDB.php';
            exit();
        }
    }

    public function order(int $criterio)
    {
        try {
            $query = "SELECT 
                cu.id,
                cu.num_cuenta,
                cl.nombre AS nombreCuenta,
                cl.apellidos AS apellidosCuenta,
                cu.fecha_alta,
                cu.fecha_ul_mov,
                cu.num_movtos,
                cu.saldo
            FROM cuentas AS cu INNER JOIN clientes AS cl ON cu.id_cliente = cl.id
            ORDER BY :criterio";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Ejecutamos con un prepare
            $pdostmt = $conexion->prepare($query);

            //bindParam para que no se pueda introducir código en criterio
            $pdostmt->bindParam(':criterio', $criterio, PDO::PARAM_INT);

            //Establecemos tipo fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            //Ejecutamos
            $pdostmt->execute();

            //Devolvemos el objeto pdostatement
            return $pdostmt;
        } catch (PDOException $ex) {
            include_once('template/partials/error.php');
            exit();
        }
    }

    public function filter($expresion)
    {
        try {
            $query = "SELECT 
            cu.id,
            cu.num_cuenta,
            cl.nombre AS nombreCuenta,
            cl.apellidos AS apellidosCuenta,
            cu.fecha_alta,
            cu.fecha_ul_mov,
            cu.num_movtos,
            cu.saldo
            FROM cuentas AS cu
            INNER JOIN clientes AS cl ON cu.id_cliente = cl.id
                WHERE CONCAT_WS(' ', cu.id, cu.num_cuenta, nombreCuenta, apellidosCuenta,
                                     cu.fecha_alta, cu.fecha_ul_mov, cu.num_movtos, cu.saldo) 
                LIKE :expresion";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Ejecutamos con un prepare
            $pdostmt = $conexion->prepare($query);

            //bindValue para que no se pueda introducir código en expresion
            $expresion = '%' . $expresion . '%';
            $pdostmt->bindParam(":expresion", $expresion);

            //Establecemos tipo fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            //Ejecutamos
            $pdostmt->execute();

            //Devolvemos el objeto pdostatement
            return $pdostmt;
        } catch (PDOException $ex) {
            include_once('template/partials/errorDB.php');
        }
    }

    public function delete(int $id)
    {
        try {
            //Sentencia SQL
            $query = "DELETE FROM cuentas WHERE id=:id";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Ejecutamos con un prepare
            $pdostmt = $conexion->prepare($query);

            //Vinculamos los parámetros
            $pdostmt->bindParam(":id", $id, PDO::PARAM_INT);

            //Ejecutamos
            $pdostmt->execute();
        } catch (PDOException $ex) {
            include 'template/partials/errorDB.php';
            exit();
        }
    }

    public function validateNumCuenta($num_cuenta) {
        try {
            //Sentencia SQL
            $query = "SELECT * FROM cuentas WHERE num_cuenta = :num_cuenta";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Ejecutamos con un prepare
            $pdostmt = $conexion->prepare($query);

            //Vinculamos los parámetros
            $pdostmt->bindParam(":num_cuenta", $num_cuenta, PDO::PARAM_INT);

            //Ejecutamos
            $pdostmt->execute();

            // Comprobar si existe ya una cuenta con ese número
            if ($pdostmt->rowCount() != 0) {
                return false;
            }
            return true;
            
        } catch (PDOException $ex) {
            include 'template/partials/errorDB.php';
            exit();
        }
    }
}
