<?php

/** Class: Maratoon
 * Permite la conexión a la base de datos maratoon
 *  
 */

class Maratoon extends Conexion {

    /** Llama al constructor de la clase padre Conexion pasándole como parámetro el nombre de la base de datos */
    public function __construct() {
        parent::__construct('maratoon');
    }

    /* crudCreate, crudRead, crudUpdate, crudDelete */
    public function crudCreate($corredor) {
        try {
            $query = "INSERT INTO corredores VALUES (
                null,
                :nombre,
                :apellidos,
                :ciudad,
                :fechaNacimiento,
                :sexo,
                :edad,
                :categoria_id,
                :club_id
            );";

            $pdostmt = $this->pdo->prepare($query);

            $pdostmt->bindParam(':nombre', $corredor->nombre, PDO::PARAM_STR, 20);
            $pdostmt->bindParam(':apellidos', $corredor->apellidos, PDO::PARAM_STR, 45);
            $pdostmt->bindParam(':ciudad', $corredor->ciudad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':fechaNacimiento', $corredor->fechaNacimiento);
            $pdostmt->bindParam(':sexo', $corredor->sexo);
            $pdostmt->bindParam(':edad', $corredor->edad);
            $pdostmt->bindParam(':categoria_id', $corredor->categoria_id, PDO::PARAM_INT, 10);
            $pdostmt->bindParam(':club_id', $corredor->club_id, PDO::PARAM_INT, 10);

            $pdostmt->execute();

            $pdostmt = null;

            $this->pdo = null;
        } catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function crudRead($id) {
        try {

            $query = "SELECT * FROM corredores WHERE id = :id";

            $pdostmt = $this->pdo->prepare($query);

            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt->fetch();
        } catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function crudUpdate($id, $corredor) {
        try {

            $query = "UPDATE corredores SET
                nombre = :nombre,
                apellidos = :apellidos,
                ciudad = :ciudad,
                fechaNacimiento = :fechaNacimiento,
                sexo = :sexo,
                edad = :edad,
                categoria_id = :categoria_id,
                club_id = :club_id
                WHERE id = :id
            ";

            $pdostmt = $this->pdo->prepare($query);

            $pdostmt->bindParam(':nombre', $corredor->nombre, PDO::PARAM_STR, 20);
            $pdostmt->bindParam(':apellidos', $corredor->apellidos, PDO::PARAM_STR, 45);
            $pdostmt->bindParam(':ciudad', $corredor->ciudad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':fechaNacimiento', $corredor->fechaNacimiento);
            $pdostmt->bindParam(':sexo', $corredor->sexo);
            $pdostmt->bindParam(':edad', $corredor->edad);
            $pdostmt->bindParam(':categoria_id', $corredor->categoria_id, PDO::PARAM_INT, 10);
            $pdostmt->bindParam(':club_id', $corredor->club_id, PDO::PARAM_INT, 10);
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            $pdostmt->execute();

            $pdostmt = null;

            $this->pdo = null;
        }
        catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function crudDelete($id) {
        try {

            $query = "DELETE FROM corredores WHERE id = :id";

            $pdostmt = $this->pdo->prepare($query);

            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            $pdostmt->execute();

            $pdostmt = null;

            $this->pdo = null;

        }
        catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function getCorredores() {
        try {

            $query = "SELECT 
                al.id,
                CONCAT_WS(', ', al.apellidos, al.nombre) as nombreCorredor,
                al.ciudad,
                al.email,
                al.edad,
                ca.nombreCorto as categoria,
                cl.nombreCorto as club
                FROM alumnos AS al
                INNER JOIN categorias AS ca ON al.categoria_id = ca.id
                INNER JOIN clubs AS cl ON al.club_id = cl.id;
            ";

            $pdostmt = $this->pdo->prepare($query);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;

        }
        catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function getCategorias() {
        try {
            $query = "SELECT
                id,
                nombreCorto AS categoria
                FROM categorias;
            ";

            $pdostmt = $this->pdo->prepare($query);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;

        }
        catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function getClubs() {
        try {
            $query = "SELECT
                id,
                nombreCorto AS club
                FROM clubs;
            ";

            $pdostmt = $this->pdo->prepare($query);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;    
        }
        catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }
}
