<?php

/*
    Modelo: AlbumModel.php
    Acceso a la base de datos
*/

class AlbumModel extends Model {
    /*
        Extrae los detalles de los álbumes
    */
    public function get() {
        /*
            Estructura básica para realizar operaciones de acceso
            a la base de datos con manejo de errores integrado
        */
        try {
            /*
                Sentencia SQL
            */
            $sql = "SELECT
                id,
                titulo,
                lugar,
                categoria,
                etiquetas,
                num_fotos,
                num_visitas
                FROM albumes ORDER BY id;
            ";

            /*
                Conexión a la base de datos
                ejecutando el método connect() del
                objeto $db de la clase Database
                que este modelo posee
            */
            $connection = $this->db->connect();

            /*
                Creación de la sentencia preparada PDOStatement
            */
            $pdostmt = $connection->prepare($sql);

            /*
                Establecer método de extracción / fetch mode
                si es necesario
            */
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            /*
                Ejecución de la sentencia preparada
            */
            $pdostmt->execute();

            /*
                Devolver resultado, si lo hay
            */
            return $pdostmt;
        } catch (PDOException $ex) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }
    public function create(ClassAlbum $album) {
        try {
            /*
                Sentencia SQL
            */
            $sql = "INSERT INTO albumes VALUES (
                NULL,
                :titulo,
                :descripcion,
                :autor,
                :fecha,
                :lugar,
                :categoria,
                :etiquetas,
                NULL,
                NULL,
                :carpeta,
                NULL,
                NULL
            );";

            /*
                Conexión a la base de datos
                ejecutando el método connect() del
                objeto $db de la clase Database
                que este modelo posee
            */
            $connection = $this->db->connect();


            /*
                Creación de la sentencia preparada PDOStatement
            */
            $pdostmt = $connection->prepare($sql);


            /*
                Vinculación de parámetros con bindParam() si es necesario
            */
            $pdostmt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 100);
            $pdostmt->bindParam(':descripcion', $album->descripcion, PDO::PARAM_STR);
            $pdostmt->bindParam(':autor', $album->autor, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':fecha', $album->fecha);
            $pdostmt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR, 250);
            $pdostmt->bindParam(':carpeta', $album->carpeta, PDO::PARAM_STR, 50);

            /*
                Ejecución de la sentencia preparada
            */
            $pdostmt->execute();
        } catch (PDOException $ex) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }
    public function read($id) {
        try {
            /*
                Sentencia SQL
            */
            $sql = "SELECT
                *
                FROM albumes WHERE id = :id ORDER BY id;
            ";

            /*
                Conexión a la base de datos
                ejecutando el método connect() del
                objeto $db de la clase Database
                que este modelo posee
            */
            $connection = $this->db->connect();

            /*
                Creación de la sentencia preparada PDOStatement
            */
            $pdostmt = $connection->prepare($sql);

            /*
                Vinculación de parámetros con bindParam() si es necesario
            */
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            /*
                Establecer método de extracción / fetch mode
                si es necesario
            */
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            /*
                Ejecución de la sentencia preparada
            */
            $pdostmt->execute();

            /*
                Devolver resultado, si lo hay
            */
            return $pdostmt->fetch();
        } catch (PDOException $ex) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }
    public function update($id, ClassAlbum $album) {
        try {
            /*
                Sentencia SQL
            */
            $sql = "UPDATE albumes SET
                titulo = :titulo,
                descripcion = :descripcion,
                autor = :autor, 
                fecha = :fecha,
                lugar = :lugar,
                categoria = :categoria,
                etiquetas = :etiquetas,
                carpeta = :carpeta
                WHERE id = :id LIMIT 1;";

            /*
                Conexión a la base de datos
                ejecutando el método connect() del
                objeto $db de la clase Database
                que este modelo posee
            */
            $connection = $this->db->connect();

            /*
                Creación de la sentencia preparada PDOStatement
            */
            $pdostmt = $connection->prepare($sql);

            /*
                Vinculación de parámetros con bindParam() si es necesario
            */
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdostmt->bindParam(':titulo', $album->titulo, PDO::PARAM_STR, 100);
            $pdostmt->bindParam(':descripcion', $album->descripcion, PDO::PARAM_STR);
            $pdostmt->bindParam(':autor', $album->autor, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':fecha', $album->fecha);
            $pdostmt->bindParam(':lugar', $album->lugar, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':categoria', $album->categoria, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':etiquetas', $album->etiquetas, PDO::PARAM_STR, 250);
            $pdostmt->bindParam(':carpeta', $album->carpeta, PDO::PARAM_STR, 50);

            /*
                Ejecución de la sentencia preparada
            */
            $pdostmt->execute();
        } catch (PDOException $ex) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }
    public function delete($id) {
        try {
            /*
                Sentencia SQL
            */
            $sql = "DELETE FROM albumes WHERE id = :id LIMIT 1;";

            /*
                Conexión a la base de datos
                ejecutando el método connect() del
                objeto $db de la clase Database
                que este modelo posee
            */
            $connection = $this->db->connect();

            /*
                Creación de la sentencia preparada PDOStatement
            */
            $pdostmt = $connection->prepare($sql);

            /*
                Vinculación de parámetros con bindParam() si es necesario
            */
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            /*
                Ejecución de la sentencia preparada
            */
            $pdostmt->execute();
        } catch (PDOException $ex) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }
    public function order($criterio) {
        /*
            Estructura básica para realizar operaciones de acceso
            a la base de datos con manejo de errores integrado
        */
        try {
            /*
                Sentencia SQL
            */
            $sql = "SELECT
                id,
                titulo,
                lugar,
                categoria,
                etiquetas,
                num_fotos,
                num_visitas
                FROM albumes ORDER BY :criterio;
            ";

            /*
                Conexión a la base de datos
                ejecutando el método connect() del
                objeto $db de la clase Database
                que este modelo posee
            */
            $connection = $this->db->connect();

            /*
                Creación de la sentencia preparada PDOStatement
            */
            $pdostmt = $connection->prepare($sql);

            /*
                Vinculación de parámetros con bindParam() si es necesario
            */
            $pdostmt->bindParam(':criterio', $criterio, PDO::PARAM_INT);

            /*
                Establecer método de extracción / fetch mode
                si es necesario
            */
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            /*
                Ejecución de la sentencia preparada
            */
            $pdostmt->execute();

            /*
                Devolver resultado, si lo hay
            */
            return $pdostmt;
        } catch (PDOException $ex) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }
    public function filter($expresion) {
        /*
            Estructura básica para realizar operaciones de acceso
            a la base de datos con manejo de errores integrado
        */
        try {
            /*
                Sentencia SQL
            */
            $sql = "SELECT
                id,
                titulo,
                lugar,
                categoria,
                etiquetas,
                num_fotos,
                num_visitas
                FROM albumes WHERE CONCAT_WS(id, titulo, lugar, categoria, etiquetas, num_fotos, num_visitas) LIKE :expresion ORDER BY id;
            ";

            /*
                Conexión a la base de datos
                ejecutando el método connect() del
                objeto $db de la clase Database
                que este modelo posee
            */
            $connection = $this->db->connect();

            /*
                Creación de la sentencia preparada PDOStatement
            */
            $pdostmt = $connection->prepare($sql);


            /*
                Añadir wildcards a la expresión
            */
            $expresion = '%' . $expresion . '%';

            /*
                Vinculación de parámetros con bindParam() si es necesario
            */
            $pdostmt->bindParam(':expresion', $expresion, PDO::PARAM_INT);

            /*
                Establecer método de extracción / fetch mode
                si es necesario
            */
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);

            /*
                Ejecución de la sentencia preparada
            */
            $pdostmt->execute();

            /*
                Devolver resultado, si lo hay
            */
            return $pdostmt;
        } catch (PDOException $ex) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }


    public function subirArchivo($archivos, $carpeta) {

        $num = count($archivos['tmp_name']);

        //Comprobamos antes si ha ocurrido algún errorde archivo
        $phpFileUploadErrors = array(
            0 => 'There is no error, the file uploaded with success',
            1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
            2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
            3 => 'The uploaded file was only partially uploaded',
            4 => 'No file was uploaded',
            6 => 'Missing a temporary folder',
            7 => 'Failed to write file to disk.',
            8 => 'A PHP extension stopped the file upload.',
        );

        $error = null;

        for ($i = 0; $i <= $num - 1 && is_null($error); $i++) {
            if ($archivos['error'][$i] != UPLOAD_ERR_OK) {
                $error = $phpFileUploadErrors[$archivos['error'][$i]];
            } else {
                //Validar tamaño máximo 4mb
                $max_file = 4194304;
                if ($archivos['size'][$i] > $max_file) {

                    //Errores de tipo error
                    $error = "Archivo excede tamaño maximo 4MB";
                }
                $info = new SplFileInfo($archivos['name'][$i]);
                $tipos_permitidos = ['JPEG', 'JPG', 'GIF', 'PNG'];
                if (!in_array(strtoupper($info->getExtension()), $tipos_permitidos)) {
                    $error = "Tipo archivo no permitido. Sólo JPG, JPEG, GIF o PNG";
                }
            }
        }

        //Sólo se procederá a la subida de archivos en caso de no ocurrir ningun error
        if (is_null($error)) {
            for ($i = 0; $i <= $num - 1; $i++) {
                if (is_uploaded_file($archivos['tmp_name'][$i])) {
                    move_uploaded_file($archivos['tmp_name'][$i], "images/" . $carpeta . "/" . $archivos['name'][$i]);
                }
            }
            $_SESSION['mensaje'] = "Archivo/s subido/s con éxito";
        } else {
            $_SESSION['error'] = $error;
        }
    }

    public function contadorFotos($id, $contador) {

        try {

            /*
                Sentencia SQL
            */
            $sql = "UPDATE albumes 
                SET
                    num_fotos = :num_fotos
                WHERE id = :id
            LIMIT 1";

            /*
                Conexión a la base de datos
            */
            $connection = $this->db->connect();

            /*
                Creación de la sentencia preparada PDOStatement
            */
            $pdostmt = $connection->prepare($sql);

            /*
                Vinculación de parámetros con bindParam() si es necesario
            */
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdostmt->bindParam(':num_fotos', $contador, PDO::PARAM_INT);


            /*
                Ejecución de la sentencia preparada
            */
            $pdostmt->execute();
        } catch (PDOException $ex) {

            include "template/partials/errordb.php";
            exit();
        }
    }
    public function contadorVisitas($id) {
        try {
            /*
                Sentencia SQL
            */
            $sql = "UPDATE albumes 
                SET
                    num_visitas = num_visitas + 1
                WHERE id = :id
            LIMIT 1";

            /*
                Conexión a la base de datos
            */
            $connection = $this->db->connect();

            /*
                Creación de la sentencia preparada PDOStatement
            */
            $pdostmt = $connection->prepare($sql);

            /*
                Vinculación de parámetros con bindParam() si es necesario
            */
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);;

            /*
                Ejecución de la sentencia preparada
            */
            $pdostmt->execute();
        } catch (PDOException $ex) {

            include "template/partials/errordb.php";
            exit();
        }
    }
    public function validarFecha($fecha) {
        $valores = explode('-', $fecha);
        if (count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])) {
            return true;
        }
        return false;
    }
}
