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

        $pdostmt->setFetchMode(PDO::FETCH_ASSOC);

        $pdostmt->execute();

        return $pdostmt;
    }

    public function getCursos() {
        
        $stmt = "SELECT id, nombreCorto AS curso FROM cursos ORDER BY id";

        $pdostmt = $this->pdo->prepare($stmt);

        $pdostmt->setFetchMode(PDO::FETCH_ASSOC);

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
        }
        catch (PDOException $ex) {

            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function insertAlumnos(Alumno $alumno) {
        $stmt = "
        INSERT INTO Alumnos (
            nombre,
            apellidos,
            email,
            telefono,
            direccion,
            poblacion,
            provincia,
            nacionalidad,
            dni,
            fechaNac,
            id_curso
        )
        VALUES (
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
    }
}

?>
