<?php

/**
 * class.fp.php
 * Métodos necesarios para la gestión de la BBDD 'fp'
 * En este caso sólo los métodos pertenecientes a la tabla
 * 'Alumnos'
 */

class Fp extends Conexion {
    public function __construct() {
        parent::__construct('fp');
    }

    public function getAlumnos() {

        $stmt = "SELECT 
            al.id,
            concat_ws(\" \", al.nombre, al.apellidos) AS nombreCompleto,
            al.email,
            al.telefono,
            al.poblacion,
            al.dni,
            timestampdiff(YEAR, al.fechaNac, NOW()) AS edad,
            cu.nombreCorto as curso
        FROM alumnos AS al INNER JOIN cursos AS cu ON al.id_curso = cu.id ORDER BY id";

        $pdostmt = $this->pdo->prepare($stmt);

        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        $pdostmt->execute();

        return $pdostmt;
    }

    public function getCursos() {

        $stmt = "SELECT id, nombreCorto AS curso FROM cursos ORDER BY id";

        $pdostmt = $this->pdo->prepare($stmt);

        $pdostmt->setFetchMode(PDO::FETCH_OBJ);

        $pdostmt->execute();

        return $pdostmt;
    }

    public function insertCurso(Curso $curso) {

        try {

            # Prepare o plantilla sql
            $stmt = "
                    INSERT INTO Cursos (
                        nombre,
                        ciclo,
                        nombreCorto,
                        nivel
                    ) VALUES (
                        :nombre,
                        :ciclo,
                        :nombreCorto,
                        :nivel
                    )
                
                ";

            # objeto de clase PDOStatement
            $pdostmt = $this->pdo->prepare($stmt);

            # Vincular los parámetros con valores
            $pdostmt->bindParam(':nombre', $curso->nombre, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':ciclo', $curso->ciclo, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':nombreCorto', $curso->nombreCorto, PDO::PARAM_STR, 4);
            $pdostmt->bindParam(':nivel', $curso->nivel, PDO::PARAM_INT, 1);

            #ejecutamos sql
            $pdostmt->execute();

            # liberamos objeto 
            $pdostmt = null;

            # cerramos conexión
            $this->pdo = null;
        } catch (PDOException $ex) {

            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function insertAlumno(Alumno $alumno) {
        try {
            $stmt = "
        INSERT INTO alumnos VALUES (
            null,
            :nombre,
            :apellidos,
            :email,
            :telefono,
            :direccion,
            :poblacion,
            :provincia,
            :nacionalidad,
            :dni,
            :fechaNac,
            :id_curso
        )
        ";


            $pdostmt = $this->pdo->prepare($stmt);

            $pdostmt->bindParam(':nombre', $alumno->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $alumno->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':email', $alumno->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':telefono', $alumno->telefono, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':direccion', $alumno->direccion, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':poblacion', $alumno->poblacion, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':provincia', $alumno->provincia, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':nacionalidad', $alumno->nacionalidad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':dni', $alumno->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':fechaNac', $alumno->fechaNac);
            $pdostmt->bindParam(':id_curso', $alumno->id_curso, PDO::PARAM_INT, 10);

            $pdostmt->execute();

            $pdostmt = null;

            $this->pdo = null;

        }
        catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function readAlumno($id) {
        try {
            $stmt = "SELECT * FROM alumnos WHERE id = :id";

            $pdostmt = $this->pdo->prepare($stmt);

            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt->fetch();
        } catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function updateAlumno($id, $alumno) {
        try {
            $stmt = "UPDATE alumnos
                SET
                nombre = :nombre, 
                apellidos = :apellidos, 
                email = :email, 
                telefono = :telefono, 
                direccion = :direccion, 
                poblacion = :poblacion, 
                provincia = :provincia, 
                nacionalidad = :nacionalidad, 
                dni = :dni, 
                fechaNac = :fechaNac, 
                id_curso = :id_curso
                WHERE id = :id";

            $pdostmt = $this->pdo->prepare($stmt);

            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdostmt->bindParam(':nombre', $alumno->nombre, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':apellidos', $alumno->apellidos, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':email', $alumno->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':telefono', $alumno->telefono, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':direccion', $alumno->direccion, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':poblacion', $alumno->poblacion, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':provincia', $alumno->provincia, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':nacionalidad', $alumno->nacionalidad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':dni', $alumno->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':fechaNac', $alumno->fechaNac);
            $pdostmt->bindParam(':id_curso', $alumno->id_curso, PDO::PARAM_INT, 10);

            $pdostmt->execute();

            $pdostmt = null;

            $this->pdo = null;

        }
        catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }
}
