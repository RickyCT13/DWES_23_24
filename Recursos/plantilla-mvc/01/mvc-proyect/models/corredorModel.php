<?php

/* corredorModel.php
    Métodos de acceso a base de datos
    create, read, update, delete, etc
*/

class CorredorModel extends Model {
    public function get() {
        try {
            // Sentencia SQL
            $query = "SELECT
            co.id,
            CONCAT_WS(' ', co.nombre, co.apellidos) as corredor,
            co.ciudad,
            co.fechaNacimiento,
            co.sexo,
            co.email,
            co.dni,
            co.edad,
            ca.nombrecorto as categoria,
            cl.nombrecorto as club
            FROM corredores AS co INNER JOIN categorias AS ca ON co.id_categoria = ca.id INNER JOIN clubs AS cl ON co.id_club = cl.id ORDER BY co.id";

            // Conexión a base de datos
            // db --> objeto de la clase Database
            // connect --> metodo de la clase Database
            $conexion = $this->db->connect();
            
            // preparamos la sentencia sql
            $pdostmt = $conexion->prepare($query);

            // Establecemos fetchMode (objeto)
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            // Ejecutamos el stmt
            $pdostmt->execute();

            // Devolvemos el stmt
            return $pdostmt;
        }
        catch (PDOException $ex) {
            include_once('template/partials/error.php');
            exit();
        }
    }
}

?>