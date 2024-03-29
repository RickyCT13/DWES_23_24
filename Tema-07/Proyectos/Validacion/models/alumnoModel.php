<?php

/*
        alumnoModel.php

        Modelo del  controlador alumnos

        Definir los métodos de acceso a la base de datos
        
        - insert
        - update
        - select
        - delete
        - etc..
    */

class alumnoModel extends Model
{

    /*
            Extrae los detalles  de los alumnos
        */
    public function get()
    {

        try {

            # comando sql
            $sql = "
                SELECT 
                    alumnos.id,
                    concat_ws(', ', alumnos.apellidos, alumnos.nombre) alumno,
                    alumnos.email,
                    alumnos.telefono,
                    alumnos.poblacion,
                    alumnos.dni,
                    timestampdiff(YEAR,  alumnos.fechaNac, NOW() ) edad,
                    cursos.nombreCorto curso
                FROM
                    alumnos
                INNER JOIN
                    cursos
                ON 
                    alumnos.id_curso = cursos.id
                ORDER BY 
                    id
                ";

            # conectamos con la base de datos

            // $this->db es un objeto de la clase database
            // ejecuto el método connect de esa clase

            $conexion = $this->db->connect();

            # ejecutamos mediante prepare
            $pdost = $conexion->prepare($sql);

            # establecemos  tipo fetch
            $pdost->setFetchMode(PDO::FETCH_OBJ);

            #  ejecutamos 
            $pdost->execute();

            # devuelvo objeto pdostatement
            return $pdost;
        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    public function getCursos()
    {

        try {
            # Plantilla
            $sql = "
                
                    SELECT 
                            id,
                            nombreCorto curso
                    FROM 
                            cursos
                    ORDER BY 
                            nombreCorto

                ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();

            # ejecutar PREPARE
            $result = $conexion->prepare($sql);

            # establezco com quiero que devuelva el resultado
            $result->setFetchMode(PDO::FETCH_OBJ);

            # ejecuto
            $result->execute();

            return $result;
        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    public function create(classAlumno $alumno)
    {

        try {
            $sql = "
                    INSERT INTO Alumnos (
                        nombre,
                        apellidos,
                        email,
                        telefono,
                        poblacion,
                        dni,
                        fechaNac,
                        id_curso
                    )
                    VALUES (
                        :nombre,
                        :apellidos,
                        :email,
                        :telefono,
                        :poblacion,
                        :dni,
                        :fechaNac,
                        :id_curso
                    )
            ";
            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':nombre', $alumno->nombre, PDO::PARAM_STR, 30);
            $pdoSt->bindParam(':apellidos', $alumno->apellidos, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':email', $alumno->email, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':telefono', $alumno->telefono, PDO::PARAM_STR, 13);
            $pdoSt->bindParam(':poblacion', $alumno->poblacion, PDO::PARAM_STR, 30);
            $pdoSt->bindParam(':dni', $alumno->dni, PDO::PARAM_STR, 9);
            $pdoSt->bindParam(':fechaNac', $alumno->fechaNac);
            $pdoSt->bindParam(':id_curso', $alumno->id_curso, PDO::PARAM_INT);

            $pdoSt->execute();
        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    public function read($id)
    {

        try {
            $sql = "
                        SELECT 
                                id,
                                nombre, 
                                apellidos,
                                email,
                                telefono,
                                poblacion,
                                dni,
                                fechaNac,
                                id_curso
                        FROM 
                                alumnos
                        WHERE
                                id = :id
                ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();


            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdoSt->setFetchMode(PDO::FETCH_OBJ);
            $pdoSt->execute();

            return $pdoSt->fetch();
        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    public function update(classAlumno $alumno, $id)
    {

        try {

            $sql = "
                
                UPDATE alumnos
                SET
                        nombre = :nombre,
                        apellidos = :apellidos,
                        email = :email,
                        telefono = :telefono,
                        poblacion = :poblacion,
                        dni = :dni,
                        fechaNac = :fechaNac,
                        id_curso = :id_curso
                WHERE
                        id = :id
                LIMIT 1
                ";

            $conexion = $this->db->connect();

            $pdoSt = $conexion->prepare($sql);

            $pdoSt->bindParam(':id', $id, PDO::PARAM_INT);

            $pdoSt->bindParam(':nombre', $alumno->nombre, PDO::PARAM_STR, 30);
            $pdoSt->bindParam(':apellidos', $alumno->apellidos, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':email', $alumno->email, PDO::PARAM_STR, 50);
            $pdoSt->bindParam(':telefono', $alumno->telefono, PDO::PARAM_STR, 9);
            $pdoSt->bindParam(':poblacion', $alumno->poblacion, PDO::PARAM_STR, 30);
            $pdoSt->bindParam(':dni', $alumno->dni, PDO::PARAM_STR, 9);
            $pdoSt->bindParam(':fechaNac', $alumno->fechaNac);
            $pdoSt->bindParam(':id_curso', $alumno->id_curso, PDO::PARAM_INT);

            $pdoSt->execute();
        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    /*
            Extrae los detalles  de los alumnos
        */
    public function order(int $criterio)
    {

        try {

            # comando sql
            $sql = "
                SELECT 
                    alumnos.id,
                    concat_ws(', ', alumnos.apellidos, alumnos.nombre) alumno,
                    alumnos.email,
                    alumnos.telefono,
                    alumnos.poblacion,
                    alumnos.dni,
                    timestampdiff(YEAR,  alumnos.fechaNac, NOW() ) edad,
                    cursos.nombreCorto curso
                FROM
                    alumnos
                INNER JOIN
                    cursos
                ON 
                    alumnos.id_curso = cursos.id
                ORDER BY 
                    :criterio
                ";

            # conectamos con la base de datos

            // $this->db es un objeto de la clase database
            // ejecuto el método connect de esa clase

            $conexion = $this->db->connect();

            # ejecutamos mediante prepare
            $pdost = $conexion->prepare($sql);

            $pdost->bindParam(':criterio', $criterio, PDO::PARAM_INT);

            # establecemos  tipo fetch
            $pdost->setFetchMode(PDO::FETCH_OBJ);

            #  ejecutamos 
            $pdost->execute();

            # devuelvo objeto pdostatement
            return $pdost;
        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    public function filter($expresion)
    {
        try {
            $sql = "

                SELECT 
                    alumnos.id,
                    concat_ws(', ', alumnos.apellidos, alumnos.nombre) alumno,
                    alumnos.email,
                    alumnos.telefono,
                    alumnos.poblacion,
                    alumnos.dni,
                    timestampdiff(YEAR,  alumnos.fechaNac, NOW() ) edad,
                    cursos.nombreCorto curso
                FROM
                    alumnos
                INNER JOIN
                    cursos
                ON 
                    alumnos.id_curso = cursos.id
                WHERE

                    CONCAT_WS(  ', ', 
                                alumnos.id,
                                alumnos.nombre,
                                alumnos.apellidos,
                                alumnos.email,
                                alumnos.telefono,
                                alumnos.poblacion,
                                alumnos.dni,
                                TIMESTAMPDIFF(YEAR, alumnos.fechaNac, now()),
                                alumnos.fechaNac,
                                cursos.nombreCorto,
                                cursos.nombre) 
                    like :expresion

                ORDER BY 
                    alumnos.id
                
                ";

            # Conectar con la base de datos
            $conexion = $this->db->connect();

            $pdost = $conexion->prepare($sql);

            $pdost->bindValue(':expresion', '%' . $expresion . '%', PDO::PARAM_STR);
            $pdost->setFetchMode(PDO::FETCH_OBJ);
            $pdost->execute();
            return $pdost;
        } catch (PDOException $e) {

            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    // public function validacionUniqueEmail($email_a_verificar)
    // {
    //     try {
    //         $sql = "SELECT * FROM alumnos 
    //         WHERE email = :email_a_verificar";

    //         # Conectar con la base de datos
    //         $conexion = $this->db->connect();

    //         //Preparamos el statement
    //         $pdost = $conexion->prepare($sql);

    //         //Vinculamos valores
    //         $pdost->bindParam(':email_a_verificar', $email_a_verificar, PDO::PARAM_STR);
    //         $pdost->execute();

    //         if ($pdost->rowCount() == 0){
    //             return TRUE;
    //         } else return FALSE;

    //     } catch (PDOException $e) {
    //         include_once('template/partials/errorDB.php');
    //         exit();
    //     }
    // }

    //Manera mejor
    public function validacionUniqueEmail($email_a_verificar)
    {
        try {
            $sql = "SELECT id FROM alumnos WHERE email = :email_a_verificar";

            // Conectar con la base de datos
            $conexion = $this->db->connect();

            // Preparamos el statement
            $pdost = $conexion->prepare($sql);

            // Vinculamos valores
            $pdost->bindParam(':email_a_verificar', $email_a_verificar, PDO::PARAM_STR);
            $pdost->execute();

            // Devolvemos true si el correo electrónico es único, false si ya existe
            return ($pdost->rowCount() == 0);
        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }


    public function validacionUniqueDNI($dni_a_verificar)
    {
        try {
            $sql = "SELECT id FROM alumnos WHERE dni = :dni_a_verificar";

            // Conectar con la base de datos
            $conexion = $this->db->connect();

            // Preparamos el statement
            $pdost = $conexion->prepare($sql);

            // Vinculamos valores
            $pdost->bindParam(':dni_a_verificar', $dni_a_verificar, PDO::PARAM_STR);
            $pdost->execute();

            // Devolvemos true si el DNI es único, false si ya existe
            return ($pdost->rowCount() == 0);
        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    public function validacionCurso($id_curso)
    {
        try {
            $sql = "SELECT id FROM cursos WHERE id = :id_curso";

            // Conectar con la base de datos
            $conexion = $this->db->connect();

            // Preparamos el statement
            $pdost = $conexion->prepare($sql);

            // Vinculamos valores
            $pdost->bindParam(':id_curso', $id_curso, PDO::PARAM_INT);
            $pdost->execute();

            // Devolvemos true si la ID del curso existe, false si no existe
            return ($pdost->rowCount() == 1);
        } catch (PDOException $e) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }
}
