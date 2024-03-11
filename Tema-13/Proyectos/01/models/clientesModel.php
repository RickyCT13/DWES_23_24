<?php


class clientesModel extends Model {

    # Método get
    # Consulta SELECT a la tabla clientes
    public function get() {
        try {
            $query = "

            SELECT 
                id,
                concat_ws(', ', apellidos, nombre) cliente,
                telefono,
                ciudad,
                dni,
                email
            FROM 
                clientes
            ORDER BY id;

            ";

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

    # Método create
    # Permite ejecutar INSERT en la tabla clientes
    public function create(ClassCliente $cliente) {
        try {
            $query = " INSERT INTO 
                        clientes 
                        (
                            nombre, 
                            apellidos, 
                            email, 
                            telefono, 
                            ciudad, 
                            dni
                        ) 
                        VALUES 
                        ( 
                            :nombre,
                            :apellidos,
                            :email,
                            :telefono,
                            :ciudad,
                            :dni
                        )";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($query);

            //Vinculamos los parámetros
            $pdostmt->bindParam(":nombre", $cliente->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(":apellidos", $cliente->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(":email", $cliente->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(":telefono", $cliente->telefono, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(":ciudad", $cliente->ciudad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(":dni", $cliente->dni, PDO::PARAM_STR, 9);

            // ejecuto
            $pdostmt->execute();
        } catch (PDOException $ex) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método delete
    # Permite ejecutar comando DELETE en la tabla clientes
    public function delete($id) {
        try {

            $query = " 
                   DELETE FROM clientes WHERE id = :id;
                   ";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($query);
            $pdostmt->bindParam(":id", $id, PDO::PARAM_INT);
            $pdostmt->execute();
            return $pdostmt;
        } catch (PDOException $error) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método getCliente
    # Obtiene los detalles de un cliente a partir del id
    public function getCliente($id) {
        try {
            $query = " 
                    SELECT     
                        id,
                        apellidos,
                        nombre,
                        telefono,
                        ciudad,
                        dni,
                        email
                    FROM  
                        clientes  
                    WHERE
                        id = :id";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($query);
            $pdostmt->bindParam(":id", $id, PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            return $pdostmt->fetch();
        } catch (PDOException $ex) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método update
    # Actuliza los detalles de un cliente una vez editados en el formuliario
    public function update(ClassCliente $cliente, $id) {
        try {
            $query = " 
                    UPDATE clientes
                    SET
                        apellidos=:apellidos,
                        nombre=:nombre,
                        telefono=:telefono,
                        ciudad=:ciudad,
                        dni=:dni,
                        email=:email,
                        update_at = now()
                    WHERE
                        id=:id
                    LIMIT 1";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($query);
            //Vinculamos los parámetros
            $pdostmt->bindParam(":nombre", $cliente->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(":apellidos", $cliente->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(":email", $cliente->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(":telefono", $cliente->telefono, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(":ciudad", $cliente->ciudad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(":dni", $cliente->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(":id", $id, PDO::PARAM_INT);

            $pdostmt->execute();
        } catch (PDOException $error) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }



    # Método update
    # Permite ordenar la tabla de cliente por cualquiera de las columnas del main
    # El criterio de ordenación se establec mediante el número de la columna del select
    public function order(int $criterio) {
        try {
            $query = "
                    SELECT 
                        id,
                        concat_ws(', ', apellidos, nombre) cliente,
                        telefono,
                        ciudad,
                        dni,
                        email
                    FROM 
                        clientes 
                    ORDER BY
                        :criterio";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($query);
            $pdostmt->bindParam(":criterio", $criterio, PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;
        } catch (PDOException $ex) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método filter
    # Permite filtar la tabla clientes a partir de una expresión de búsqueda
    public function filter($expresion) {
        try {

            $query = "
                    SELECT 
                        id,
                        concat_ws(', ', apellidos, nombre) cliente,
                        telefono,
                        ciudad,
                        dni,
                        email
                    FROM 
                        clientes 
                    WHERE 
                        concat_ws(  
                                    ' ',
                                    id,
                                    apellidos,
                                    nombre,
                                    telefono,
                                    ciudad,
                                    dni,
                                    email
                                )
                        LIKE 
                                :expresion
                    
                    ORDER BY id ASC";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($query);

            # enlazamos parámetros con variable
            $expresion = "%" . $expresion . "%";
            $pdostmt->bindValue(':expresion', $expresion, PDO::PARAM_STR);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            return $pdostmt;
        } catch (PDOException $ex) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    //Validación de email único
    public function validateUniqueEmail($email) {
        try {
            $query = "SELECT * FROM clientes 
                    WHERE email = :email";


            //Conectar con la base de datos
            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($query);
            $pdostmt->bindParam(':email', $email, PDO::PARAM_STR);

            $pdostmt->execute();

            if ($pdostmt->rowCount() != 0) {
                return false;
            }

            return true;
        } catch (PDOException $ex) {

            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    //Validación de dni único
    public function validateDNI($dni) {
        try {
            $query = "SELECT * FROM clientes 
                     WHERE dni = :dni";


            //Conectar con la base de datos
            $conexion = $this->db->connect();

            $pdostmt = $conexion->prepare($query);
            $pdostmt->bindParam(':dni', $dni, PDO::PARAM_STR);

            $pdostmt->execute();

            if ($pdostmt->rowCount() != 0) {
                return false;
            }

            return true;
        } catch (PDOException $ex) {

            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    //Pillamos los datos del CSV
    function getCSV() {

        try {

            # comando sql
            $query = "SELECT 
                        clientes.id,
                        clientes.apellidos,
                        clientes.nombre,
                        clientes.email,
                        clientes.telefono,
                        clientes.ciudad,
                        clientes.dni
                    FROM
                        clientes
                    ORDER BY 
                        id";

            # conectamos con la base de datos

            // $this->db es un objeto de la clase database
            // ejecuto el método connect de esa clase

            $conexion = $this->db->connect();

            # ejecutamos mediante prepare
            $pdostmt = $conexion->prepare($query);

            # establecemos  tipo fetch
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            #  ejecutamos 
            $pdostmt->execute();

            # devuelvo objeto pdostatement
            return $pdostmt;
        } catch (PDOException $ex) {

            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    public function getCuentasDelCliente($idCliente) {
        try {
            $query = "
            SELECT 
                id,
                num_cuenta,
                id_cliente,
                fecha_alta,
                fecha_ul_mov,
                num_movtos,
                saldo
            FROM 
                cuentas 
            WHERE 
                id_cliente = :idCliente";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($query);
            $pdostmt->bindParam(":idCliente", $idCliente, PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            return $pdostmt->fetchAll();
        } catch (PDOException $ex) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    public function deleteCuentas($idCuenta) {
        try {
            $query = "
        DELETE FROM cuentas 
        WHERE id = :idCuenta";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($query);
            $pdostmt->bindParam(":idCuenta", $idCuenta, PDO::PARAM_INT);
            $pdostmt->execute();
        } catch (PDOException $ex) {
            require_once("template/partials/errorDB.php");
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
