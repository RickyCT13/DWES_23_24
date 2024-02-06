<?php 
    class RegisterModel extends Model {

    # Valida el nombre de usuario
    public function validateName($username) {
        if ((strlen($username) < 5) || (strlen($username) > 50)) {
            return false;
        }
        return true;
    
    }

    #Validar password
    public function validatePass($pass) {
        if ((strlen($pass) < 5) || (strlen($pass) > 50)) {
            return false;
        }
        return true;
    }

    #Validar email unique
    public function validateEmailUnique($email) {

        try {
            
            $sql = "SELECT * FROM album.users WHERE email = :email";
            $connection = $this->db->connect();
            $pdostmt = $connection->prepare($sql);
            $pdostmt->bindParam(':email', $email, PDO::PARAM_STR, 50);
            $pdostmt->execute();
            if ($pdostmt->rowCount() > 0)
                return false;
            else 
                return true;
        } catch (PDOException $ex) {
            
            include_once('template/partials/errorDB.php');
            exit();

        }
    
        
    }

    # Creo nuevo usuario a partir de los datos de formulario de registro
    public function create ($name, $email, $pass) {
        try {
            
            $password_encriptado = password_hash($pass, CRYPT_BLOWFISH);
           
            $sql = "INSERT INTO album.users VALUES (
                 null,
                :nombre,
                :email,
                :pass,
                default,
                default)";

            $connection = $this->db->connect();
            $pdostmt = $connection->prepare($sql);

            $pdostmt->bindParam(':nombre', $name, PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':email', $email , PDO::PARAM_STR, 50);
            $pdostmt->bindParam(':pass', $password_encriptado, PDO::PARAM_STR, 60) ;
            $pdostmt->execute();

            # Asignamos rol de registrado
            // Rol que asignaremos por defecto
            $role_id = 3;
            $sql = "INSERT INTO roles_users VALUES (
                null,
                :user_id,
                :role_id,
                default,
                default)";
            
            # Obtener id del último usuario insertado
            $ultimo_id = $connection->lastInsertId();

            $pdostmt = $connection->prepare($sql);

            $pdostmt->bindParam(':user_id', $ultimo_id);
            $pdostmt->bindParam(':role_id', $role_id);
            $pdostmt->execute();

        }  catch (PDOException $ex) {
            
            include_once('template/partials/errorDB.php');
            exit();

        }
    }





    }
?>