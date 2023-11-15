<?php

/**
 * class.fp.php
 * Métodos necesarios para la gestión de la BBDD 'fp'
 * En este caso sólo los métodos pertenecientes a la tabla
 * 'Alumnos'
 */

class Fp extends Conexion {
    public $dbname = "fp";
    public function __construct() {
        parent::__construct($this->dbname);
    }

    public function getAlumnos() {
        $stmt = "SELECT 
            al.id,
            concat_ws(\" \", al.nombre, al.apellidos) AS nombreCompleto,
            al.dni,
            al.telefono,
            al.poblacion,
            timestampdiff(YEAR, al.fechaNac, NOW()) AS edad,
            cu.nombreCorto as curso
        FROM alumnos AS al INNER JOIN cursos AS cu ON al.id_curso = cu.id ORDER BY id";
        $result = $this->db->query($stmt);
        return $result;
    }
}
