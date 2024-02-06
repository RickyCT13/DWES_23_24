<?php
class PerfilModel extends Model {

    # Devuelve objeto user si lo encuentra
    # Si no lo encuentra devuelve FALSE
    public function getUserId($id) {
        try {

            $sql = "SELECT * FROM album.users WHERE id= :id LIMIT 1";
            $connection = $this->db->connect();
            $pdostmt = $connection->prepare($sql);
            $pdostmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classUser');
            $pdostmt->bindParam(":id", $id, PDO::PARAM_INT);
            $pdostmt->execute();

            return $pdostmt->fetch();
        } catch (PDOException $ex) {

            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    # Actualizar password
    public function updatePass(classUser $user) {
        try {

            $password_encriptado = password_hash($user->password, CRYPT_BLOWFISH);
            $update = "
                        UPDATE album.users SET
                            password = :password
                        WHERE id = :id      
                        ";

            $connection = $this->db->connect();
            $pdostmt = $connection->prepare($update);

            $pdostmt->bindParam(':password', $password_encriptado, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':id', $user->id, PDO::PARAM_INT);

            $pdostmt->execute();
        } catch (PDOException $ex) {

            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    # Valida nombre de usuario ha de ser único
    public function validateName($name) {

        try {
            $sql = "
                    SELECT * FROM album.users
                    WHERE name = :name
            ";

            # Conectamos con la base de datos
            $connection = $this->db->connect();

            # Ejecutamos mediante prepare la consulta SQL
            $pdostmt = $connection->prepare($sql);
            $pdostmt->bindParam(':name', $name, PDO::PARAM_STR);
            $pdostmt->execute();

            if ($pdostmt->rowCount() == 0)
                return TRUE;
            return FALSE;
        } catch (PDOException $ex) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    # Valida nombre de usuario ha de ser único
    public function validateEmail($email) {

        try {
            $sql = "
                SELECT * FROM album.users 
                WHERE email = :email
        ";

            # Conectamos con la base de datos
            $connection = $this->db->connect();

            # Ejecutamos mediante prepare la consulta SQL
            $pdostmt = $connection->prepare($sql);
            $pdostmt->bindParam(':email', $email, PDO::PARAM_STR);
            $pdostmt->execute();

            if ($pdostmt->rowCount() == 0)
                return TRUE;
            return FALSE;
        } catch (PDOException $ex) {
            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    # Actualizar perfil name y email
    public function update(classUser $user) {
        try {

            $update = "
                        UPDATE album.users SET
                            name = :name,
                            email = :email
                        WHERE id = :id
                        LIMIT 1      
                        ";

            $connection = $this->db->connect();
            $pdostmt = $connection->prepare($update);

            $pdostmt->bindParam(':name', $user->name, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':email', $user->email, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':id', $user->id, PDO::PARAM_INT);

            $pdostmt->execute();
        } catch (PDOException $ex) {

            include_once('template/partials/errorDB.php');
            exit();
        }
    }

    public function delete($id) {

        try {
            $delete = "
                    DELETE FROM album.users 
                    WHERE id = :id      
                ";

            $connection = $this->db->connect();
            $pdostmt = $connection->prepare($delete);

            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);

            $pdostmt->execute();
        } catch (PDOException $ex) {

            include_once('template/partials/errorDB.php');
            exit();
        }
    }
}
