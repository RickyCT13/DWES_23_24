<?php

/*
        ClienteModel.php

        Modelo del controlador clientes

        Definir los métodos de acceso a la base de datos

        - insert
        - update
        - select
        - delete
        - etc
    
        */

class ClienteModel extends Model
{

    /*
        Extrae los detalles de los clientes
    */

    public function get()
    {
        try {
            //Sentencia SQL
            $query = "SELECT
                id,
                nombre,
                apellidos,
                telefono,
                ciudad,
                dni,
                email
            FROM clientes ORDER BY id;";

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
            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    public function create(ClassCliente $cliente)
    {
        try {

            //Creamos la query de SQL
            $query = "INSERT INTO clientes (
                nombre,
                apellidos,
                email,
                telefono,
                ciudad,
                dni
            ) VALUES (
                :nombre,
                :apellidos,
                :email,
                :telefono,
                :ciudad,
                :dni
            )";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Preparamos la sentencia
            $pdostmt = $conexion->prepare($query);

            //Vinculamos los parámetros al pdostatement
            $pdostmt->bindParam(':nombre', $cliente->nombre, PDO::PARAM_STR, 45);
            $pdostmt->bindParam(':apellidos', $cliente->apellidos, PDO::PARAM_INT, 10);
            $pdostmt->bindParam(':email', $cliente->email, PDO::PARAM_STR, 45);
            $pdostmt->bindParam(':telefono', $cliente->telefono, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':ciudad', $cliente->ciudad, PDO::PARAM_STR, 20);
            $pdostmt->bindParam(':dni', $cliente->dni, PDO::PARAM_STR, 9);

            //Ejecutamos el statement
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
            $query = "SELECT * FROM clientes WHERE id = :id";

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

    public function update(int $id, ClassCliente $cliente)
    {
        try {
            // Creamos la consulta a ejecutar
            $query = "UPDATE clientes SET
            apellidos = :apellidos,
            nombre = :nombre,
            telefono = :telefono,
            ciudad = :ciudad,
            dni = :dni,
            update_at = now()
            WHERE id = :id LIMIT 1
            ";

            // Preparamos la consulta
            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($query);

            // Vinculamos las parámetros
            $pdostmt->bindParam(':id',$id,PDO::PARAM_INT);
            $pdostmt->bindParam(':apellidos',$cliente->apellidos,PDO::PARAM_STR,45);
            $pdostmt->bindParam(':nombre',$cliente->nombre, PDO::PARAM_STR,20);
            $pdostmt->bindParam(':telefono',$cliente->telefono, PDO::PARAM_STR,9);
            $pdostmt->bindParam(':ciudad',$cliente->ciudad,PDO::PARAM_STR,20);
            $pdostmt->bindParam(':dni',$cliente->dni,PDO::PARAM_STR,9);

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
                id,
                nombre,
                apellidos,
                telefono,
                ciudad,
                dni,
                email
                FROM clientes ORDER BY :criterio";

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
                id,
                nombre,
                apellidos,
                email,
                telefono,
                ciudad,
                dni FROM clientes
                WHERE CONCAT_WS(' ', id, nombre, apellidos,
                                     email, telefono, ciudad, dni) 
                LIKE :expresion";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Ejecutamos con un prepare
            $pdostmt = $conexion->prepare($query);

            //bindValue para que no se pueda introducir código en expresion
            $expresion = '%'.$expresion.'%';
            $pdostmt -> bindParam(":expresion",$expresion);

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

    public function delete(int $id){
        try {
            //Sentencia SQL
            $query = "DELETE FROM clientes WHERE id = :id";

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

    // función para validar email (único)
    public function validateEmail($email) {
        try {
            //Sentencia SQL
            $query = "SELECT * FROM clientes where email = :email";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Ejecutamos con un prepare
            $pdostmt = $conexion->prepare($query);

            //Vinculamos los parámetros
            $pdostmt->bindParam(":email", $email, PDO::PARAM_STR);

            //Ejecutamos
            $pdostmt->execute();

            // Si hay un registro con este email, no se puede usar
            if ($pdostmt->rowCount() != 0) {
                return false;
            }
            // Si no hay registros con este email, todo está bien
            return true;

        } catch (PDOException $ex) {
            include 'template/partials/errorDB.php';
            exit();
        }
    }
    // función para validar dni (único)
    public function validateDNI($dni) {
        try {
            //Sentencia SQL
            $query = "SELECT * FROM clientes where dni = :dni";

            //Conectamos a la base de datos
            //$this->db es un objeto de la clase Database
            //Este objeto usará el método connect de esta clase
            $conexion = $this->db->connect();

            //Ejecutamos con un prepare
            $pdostmt = $conexion->prepare($query);

            //Vinculamos los parámetros
            $pdostmt->bindParam(":dni", $dni, PDO::PARAM_STR);

            //Ejecutamos
            $pdostmt->execute();

            // Si hay un registro con este dni, no se puede usar
            if ($pdostmt->rowCount() != 0) {
                return false;
            }
            // Si no hay registros con este dni, todo está bien
            return true;

        } catch (PDOException $ex) {
            include 'template/partials/errorDB.php';
            exit();
        }
    }

    public function getAllData() {
        try {
            //Sentencia SQL
            $query = "SELECT
                *
            FROM clientes ORDER BY id;";

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
            include_once('template/partials/errorDB.php');
            exit();
        }
    }

}
