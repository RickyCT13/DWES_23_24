<?php

/*
        Clase libros 

        Aquí se definirán los métodos necesarios para completar el examen
        
    */


class Libros extends Conexion {
    public function __construct() {
        parent::__construct();
    }

    public function getLibros() {
        try {
            $query = "SELECT
            li.id,
            li.titulo,
            au.nombre AS autor,
            ed.nombre AS editorial,
            li.stock AS unidades,
            li.precio_coste AS coste,
            li.precio_venta AS pvp
            FROM libros AS li
            INNER JOIN autores AS au ON li.autor_id = au.id
            INNER JOIN editoriales AS ed ON li.editorial_id = ed.id
            ORDER BY li.id;
            ";

            $pdostmt = $this->pdo->prepare($query);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;
        }
        catch (PDOException $ex) {
            include 'views/partials/partial.errorDB.php';
            exit();
        }
    }

    public function getAutores() {
        try {
            $query = "SELECT
            id,
            nombre
            FROM autores ORDER BY nombre ASC;";

            $pdostmt = $this->pdo->prepare($query); 

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;
        }
        catch (PDOException $ex) {
            include 'views/partials/partial.errorDB.php';
            exit();
        }
    }

    public function getEditoriales() {
        try {
            $query = "SELECT
            id,
            nombre
            FROM editoriales ORDER BY nombre ASC;";

            $pdostmt = $this->pdo->prepare($query); 

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;
        }
        catch (PDOException $ex) {
            include 'views/partials/partial.errorDB.php';
            exit();
        }
    }

    public function crudCreate($libro) {
        try {
            $query = "INSERT INTO libros VALUES (
                NULL,
                :isbn,
                NULL,
                :titulo,
                :autor_id,
                :editorial_id,
                :precio_coste,
                :precio_venta,
                :stock,
                NULL,
                NULL,
                :fecha_edicion,
                NULL,
                NULL
            );";

            $pdostmt = $this->pdo->prepare($query);

            $pdostmt->bindParam(':isbn', $libro->isbn, PDO::PARAM_STR, 13);
            $pdostmt->bindParam(':titulo', $libro->titulo, PDO::PARAM_STR, 80);
            $pdostmt->bindParam(':autor_id', $libro->autor_id, PDO::PARAM_INT);
            $pdostmt->bindParam(':editorial_id', $libro->editorial_id, PDO::PARAM_INT);
            $pdostmt->bindParam(':precio_coste', $libro->precio_coste);
            $pdostmt->bindParam(':precio_venta', $libro->precio_venta);
            $pdostmt->bindParam(':stock', $libro->stock, PDO::PARAM_INT);
            $pdostmt->bindParam(':fecha_edicion', $libro->fecha_edicion);

            $pdostmt->execute();

            $pdostmt = null;

            $this->pdo = null;
        }
        catch (PDOException $ex) {
            include 'views/partials/partial.errorDB.php';
            exit();
        }
    }
    public function order($criterio) {
        try {
            $query = "SELECT
            li.id,
            li.titulo,
            au.nombre AS autor,
            ed.nombre AS editorial,
            li.stock AS unidades,
            li.precio_coste AS coste,
            li.precio_venta AS pvp
            FROM libros AS li
            INNER JOIN autores AS au ON li.autor_id = au.id
            INNER JOIN editoriales AS ed ON li.editorial_id = ed.id
            ORDER BY $criterio;
            ";

            $pdostmt = $this->pdo->prepare($query);

            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            $pdostmt->execute();

            return $pdostmt;
        }
        catch (PDOException $ex) {
            include 'views/partials/partial.errorDB.php';
            exit();
        }
    }

}
