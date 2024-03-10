<?php

class usuarioModel extends Model
{
    # Método get
    # Consulta SELECT a la tabla clientes
    public function getUsers()
    {
        try {
            $query = "SELECT * from gesbank.users";

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

    public function getRoles()
    {
        try {
            $query = "SELECT * from roles";

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
    # Ejecuta INSERT sobre la tabla cuentas
    public function create($nombre, $email, $password, $id_rol)
    {
        try {

            //Encriptamos la password
            $password = password_hash($password, PASSWORD_BCRYPT);

            //Primero tenemos que crear el usuario
            $query = "INSERT INTO gesbank.users VALUES (
                null,
                :nombre,
                :email,
                :pass,
                default,
                default)";

            $conexion = $this->db->connect();
            $stmt = $conexion->prepare($query);

            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR, 50);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR, 50);
            $stmt->bindParam(':pass', $password, PDO::PARAM_STR, 60);

            $stmt->execute();

            //Guardamos en una variable el valor id de este último registro insertado
            $id_usuario = $conexion->lastInsertId();

            //Ahora asociamos el rol al usuario
            # Asignamos rol de registrado
            $query = "INSERT INTO roles_users VALUES (
                null,
                :user_id,
                :role_id,
                default,
                default)";

            $stmt = $conexion->prepare($query);
            $stmt->bindParam(':user_id', $id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(':role_id', $id_rol, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $ex) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método isEmailUnique
    # Comprueba si un email está disponible
    public function isEmailUnique($email)
    {
        try {
            $query = "SELECT COUNT(*) FROM gesbank.users WHERE email = :email";
            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($query);
            $pdostmt->bindParam(":email", $email, PDO::PARAM_STR);
            $pdostmt->execute();
            $count = $pdostmt->fetchColumn();

            // Si el conteo es cero, significa que el email es único
            return $count == 0;
        } catch (PDOException $ex) {
            // Manejo de errores específicos de PDO
            // Puedes agregar mensajes de error más descriptivos según sea necesario
            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    # Método getUserByID
    # Consulta SELECT a la tabla usuarios
    public function getUserByID($id)
    {
        try {
            $query = "SELECT * FROM gesbank.users WHERE id = :id";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($query);
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            return $pdostmt->fetch();
        } catch (PDOException $ex) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método getRoleOfUser
    # Consulta SELECT a la tabla roles
    public function getRoleOfUser($id)
    {
        try {
            $query = "SELECT ro.id, ro.name
                    FROM gesbank.roles ro
                    INNER JOIN gesbank.roles_users ru ON ro.id = ru.role_id
                    INNER JOIN gesbank.users us ON ru.user_id = us.id
                    WHERE us.id = :id";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($query);
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            return $pdostmt->fetch();
        } catch (PDOException $ex) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método delete
    # Permite eliminar un usuario, ejecuta DELETE 
    public function delete($id)
    {
        try {
            $query = " 
                   DELETE FROM gesbank.users WHERE id=:id;
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

    # Método order
    # Permite ordenar la tabla por cualquiera de las columnas de la tabla
    public function order(int $criterio)
    {
        try {
            $query = "SELECT * from gesbank.users ORDER BY :criterio";

            $conexion = $this->db->connect();
            $pdostmt = $conexion->prepare($query);
            $pdostmt->bindParam(':criterio', $criterio, PDO::PARAM_INT);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();
            return $pdostmt;
        } catch (PDOException $ex) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método filter
    # Permite filtrar la tabla cuentas a partir de una expresión de búsqueda o filtrado
    public function filter($expresion)
    {
        try {

            $query = " SELECT 
                        us.id,
                        us.name,
                        us.email
                    FROM 
                        gesbank.users
                    WHERE 
                        concat_ws(  ' ',
                                    us.id,
                                    us.name,
                                    us.email
                                )
                    LIKE
                        :expresion ";


            $conexion = $this->db->connect();

            $expresion = "%" . $expresion . "%";
            $pdostmt = $conexion->prepare($query);

            $pdostmt->bindValue(':expresion', $expresion, PDO::PARAM_STR);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->execute();

            return $pdostmt;
        } catch (PDOException $ex) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }

    # Método update
    # Actualiza los detalles de un usuario
    # Método update
    # Actualiza los detalles de un usuario, incluido el rol
    public function update(classUser $usuario, $id, $idRol)
    {
        try {
            // Obtener la conexión a la base de datos
            $conexion = $this->db->connect();

            // Actualizamos los detalles del usuario en la tabla gesbank.users
            $query = "UPDATE gesbank.users SET
                    name = :name,
                    email = :email,
                    password = :password,
                    update_at = NOW()
                WHERE
                    id=:id";
            $pdostmt = $conexion->prepare($query);
            // Vinculamos los parámetros
            $pdostmt->bindParam(":name", $usuario->name, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(":email", $usuario->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(":password", $usuario->password, PDO::PARAM_STR, 60);
            $pdostmt->bindParam(":id", $id, PDO::PARAM_INT);
            $pdostmt->execute();

            // Actualizamos el rol del usuario en la tabla roles_users
            $query = "UPDATE gesbank.roles_users SET
                    role_id = :role_id,
                    update_at = NOW()
                WHERE
                    user_id = :user_id";
            $pdostmt = $conexion->prepare($query);
            // Vinculamos los parámetros
            $pdostmt->bindParam(":role_id", $idRol, PDO::PARAM_INT);
            $pdostmt->bindParam(":user_id", $id, PDO::PARAM_INT);
            $pdostmt->execute();
        } catch (PDOException $ex) {
            require_once("template/partials/errorDB.php");
            exit();
        }
    }
}