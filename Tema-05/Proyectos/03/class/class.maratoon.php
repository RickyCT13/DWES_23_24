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
            $query = "INSERT INTO corredores (nombre, apellidos, ciudad, fechaNacimiento, sexo, email, dni, edad, id_categoria, id_club) VALUES (
                :nombre,
                :apellidos,
                :ciudad,
                :fechaNacimiento,
                :sexo,
                :email,
                :dni,
                :edad,
                :id_categoria,
                :id_club
            );";

            $pdostmt = $this->pdo->prepare($query);

            $pdostmt->bindParam(':nombre', $corredor->nombre, PDO::PARAM_STR, 20);
            $pdostmt->bindParam(':apellidos', $corredor->apellidos, PDO::PARAM_STR, 45);
            $pdostmt->bindParam(':ciudad', $corredor->ciudad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':fechaNacimiento', $corredor->fechaNacimiento);
            $pdostmt->bindParam(':sexo', $corredor->sexo);
            $pdostmt->bindParam(':email', $corredor->email, PDO::PARAM_STR, 45);
            $pdostmt->bindParam(':dni', $corredor->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':edad', $corredor->edad, PDO::PARAM_INT, 2);
            $pdostmt->bindParam(':id_categoria', $corredor->id_categoria, PDO::PARAM_INT, 10);
            $pdostmt->bindParam(':id_club', $corredor->id_club, PDO::PARAM_INT, 10);

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
                email = :email,
                dni = :dni,
                edad = :edad,
                id_categoria = :id_categoria,
                id_club = :id_club
                WHERE id = :id
            ";

            $pdostmt = $this->pdo->prepare($query);

            $pdostmt->bindParam(':nombre', $corredor->nombre, PDO::PARAM_STR, 20);
            $pdostmt->bindParam(':apellidos', $corredor->apellidos, PDO::PARAM_STR, 45);
            $pdostmt->bindParam(':ciudad', $corredor->ciudad, PDO::PARAM_STR, 30);
            $pdostmt->bindParam(':fechaNacimiento', $corredor->fechaNacimiento);
            $pdostmt->bindParam(':sexo', $corredor->sexo);
            $pdostmt->bindParam(':email', $corredor->email, PDO::PARAM_STR, 45);
            $pdostmt->bindParam(':dni', $corredor->dni, PDO::PARAM_STR, 9);
            $pdostmt->bindParam(':edad', $corredor->edad);
            $pdostmt->bindParam(':id_categoria', $corredor->id_categoria, PDO::PARAM_INT, 10);
            $pdostmt->bindParam(':id_club', $corredor->id_club, PDO::PARAM_INT, 10);
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            $pdostmt->execute();

            $pdostmt = null;

            $this->pdo = null;
        } catch (PDOException $ex) {
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
        } catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function order($criterio) {
        try {
            $query = "SELECT 
                co.id,
                CONCAT_WS(', ', co.apellidos, co.nombre) as nombreCorredor,
                co.ciudad,
                co.email,
                co.edad,
                ca.nombreCorto as categoria,
                cl.nombreCorto as club
            FROM corredores AS co
            INNER JOIN categorias AS ca ON co.id_categoria = ca.id
            INNER JOIN clubs AS cl ON co.id_club = cl.id ORDER BY :criterio";

            $pdostmt = $this->pdo->prepare($query);

            $pdostmt->bindParam(':criterio', $criterio);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;
        } catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function filter($expresion) {
        try {
            $query = "SELECT 
                co.id,
                CONCAT_WS(', ', co.apellidos, co.nombre) as nombreCorredor,
                co.ciudad,
                co.email,
                co.edad,
                ca.nombreCorto as categoria,
                cl.nombreCorto as club
            FROM corredores AS co
            INNER JOIN categorias AS ca ON co.id_categoria = ca.id
            INNER JOIN clubs AS cl ON co.id_club = cl.id WHERE CONCAT_WS(' ', co.id, co.nombre, co.apellidos, co.ciudad, co.email, co.edad, ca.nombreCorto, cl.nombreCorto) LIKE :expresion";

            $pdostmt = $this->pdo->prepare($query);

            $expresionLike = '%'.$expresion.'%';

            $pdostmt->bindParam(':expresion', $expresionLike);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;
        }
        catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function getCorredores() {
        try {

            $query = "SELECT 
                co.id,
                CONCAT_WS(', ', co.apellidos, co.nombre) as nombreCorredor,
                co.ciudad,
                co.email,
                co.edad,
                ca.nombreCorto as categoria,
                cl.nombreCorto as club
                FROM corredores AS co
                INNER JOIN categorias AS ca ON co.id_categoria = ca.id
                INNER JOIN clubs AS cl ON co.id_club = cl.id ORDER BY co.id;
            ";

            $pdostmt = $this->pdo->prepare($query);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;
        } catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }
    public function getCorredorFormat($id) {
        try {

            $query = "SELECT 
                co.id,
                CONCAT_WS(', ', co.apellidos, co.nombre) as nombreCorredor,
                co.ciudad,
                co.email,
                co.edad,
                ca.nombreCorto as categoria,
                cl.nombreCorto as club
                FROM corredores AS co
                INNER JOIN categorias AS ca ON co.id_categoria = ca.id
                INNER JOIN clubs AS cl ON co.id_club = cl.id WHERE co.id = :id ORDER BY co.id LIMIT 1;
            ";

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

    public function getCategorias() {
        try {
            $query = "SELECT
                id,
                nombreCorto AS categoria
                FROM categorias ORDER BY id;
            ";

            $pdostmt = $this->pdo->prepare($query);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;
        } catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function categoriaCorredor($idCorredor) {
        try {
            $query = "SELECT
                id,
                nombreCorto AS categoria
                FROM categorias WHERE id = :idcat ORDER BY id;
            ";

            $pdostmt = $this->pdo->prepare($query);

            $corredor = $this->crudRead($idCorredor);

            $pdostmt->bindParam(':idcat', $corredor->id_categoria, PDO::PARAM_INT);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt->fetch();
        } catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function getClubs() {
        try {
            $query = "SELECT
                id,
                nombreCorto AS club
                FROM clubs ORDER BY id;
            ";

            $pdostmt = $this->pdo->prepare($query);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;
        } catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

    public function clubCorredor($idCorredor) {
        try {
            $query = "SELECT
                id,
                nombreCorto AS club
                FROM clubs WHERE id = :idclu ORDER BY id;
            ";

            $pdostmt = $this->pdo->prepare($query);

            $corredor = $this->crudRead($idCorredor);

            $pdostmt->bindParam(':idclu', $corredor->id_club, PDO::PARAM_INT);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt->fetch();
        } catch (PDOException $ex) {
            include('views/partials/errorDB.php');
            exit();
        }
    }

}
