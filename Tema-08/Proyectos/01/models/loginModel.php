<?php 
    class loginModel extends Model {


    # Devuelve un objeto de la clase album.users a partir del email de usuario
    public function getUserEmail($email) {
        try {

            $sql = "SELECT * FROM album.users WHERE email= :email LIMIT 1";
            $connection = $this->db->connect();
            $pdostmt = $connection->prepare($sql);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->bindParam(":email", $email, PDO::PARAM_STR);
            $pdostmt->execute();
            
            return $pdostmt->fetch();

        }  catch (PDOException $ex) {
            
            include_once('template/partials/errorDB.php');
            exit();

        }
    }

    # Devuelve id de perfil a partir del id de usuario
    public function getUserIdPerfil($id) {

        try {

            $sql = "SELECT 
                        ru.role_id
                    FROM
                        album.users u
                    INNER JOIN
                        roles_users ru ON u.id = ru.user_id
                    WHERE
                        u.id = :id
                    LIMIT 1";
            $connection = $this->db->connect();
            $pdostmt = $connection->prepare($sql);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdostmt->execute();
            return $pdostmt->fetch()->role_id;

        } catch (PDOException $ex) {
            
            include_once('template/partials/errorDB.php');
            exit();

        }

    }

        
    # Obtener el nombre perfil a partir del id de perfil
    public function getUserPerfil($id) {

        try {

            $sql = "SELECT 
                        name
                    FROM
                        roles
                    WHERE
                        id = :id
                    LIMIT 1";

            $connection = $this->db->connect();
            $pdostmt = $connection->prepare($sql);
            $pdostmt->setFetchMode(PDO::FETCH_OBJ);
            $pdostmt->bindParam(':id', $id, PDO::PARAM_INT);
            $pdostmt->execute();
            return $pdostmt->fetch()->name;

        } catch (PDOException $ex) {
            
            include_once('template/partials/errorDB.php');
            exit();
    
        }
        

    }

}
?>