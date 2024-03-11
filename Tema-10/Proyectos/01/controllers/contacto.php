<?php

require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/auth.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Contacto extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function render() {
        /*
            Iniciar o continuar sesión
        */
        sec_session_start();

        /*
            En este caso, no es necesario comprobar si el usuario
            ha iniciado sesión o si tiene permisos
        */

        /*
            Creamos un objeto para el contacto
        */
        $this->view->contacto = new ClassContacto();

        $this->view->title = "Formulario Contacto";

        /*
            Comprobamos si se vuelve de un registro no validado
        */
        if (isset($_SESSION['error'])) {
            /*
                Mostrar mensaje de error
            */
            $this->view->error = $_SESSION['error'];

            /*
                Recuperar array de errores específicos
            */
            $this->view->errores = $_SESSION['errores'];

            $this->view->contacto = unserialize($_SESSION['contacto']);

            unset($_SESSION['error']);
            unset($_SESSION['errores']);
            unset($_SESSION['contacto']);
        }

        /*
            Mostrar mensaje, en caso de que haya uno
        */
        if (isset($_SESSION['mensaje'])) {
            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }

        $this->view->render('contacto/index');
    }
    public function validar() {
        /*
            Iniciar o continuar sesión
        */
        sec_session_start();

        /*
            Creamos un objeto para el contacto
        */
        $this->view->contacto = new ClassContacto();

        /*
            Comprobamos si se vuelve de un registro no validado
        */
        if (isset($_SESSION['error'])) {
            /*
                Mostrar mensaje de error
            */
            $this->view->error = $_SESSION['error'];

            /*
                Recuperar array de errores específicos
            */
            $this->view->errores = $_SESSION['errores'];

            $this->view->contacto = unserialize($_SESSION['contacto']);

            unset($_SESSION['error']);
            unset($_SESSION['errores']);
            unset($_SESSION['contacto']);
        }

        /*
            Saneamiento de los datos del formulario
        */
        //Si se introduce un campo vacío, se le otorga "nulo"
        $nombre = filter_var($_POST['nombre'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
        $asunto = filter_var($_POST['asunto'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $mensaje = filter_var($_POST['mensaje'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

        /*
            Crear un objeto con los datos
        */
        $contacto = new ClassContacto($nombre, $email, $asunto, $mensaje);

        /*
            Validación de campos
        */
        $errores = [];

        if (empty($nombre)) {
            $errores['nombre'] = 'El nombre es obligatorio';
        }
        if (empty($email)) {
            $errores['email'] = 'Debe indicar una dirección de email';
        }
        if (empty($asunto)) {
            $errores['asunto'] = 'Debe indicar el asunto del mensaje';
        }
        if (empty($mensaje)) {
            $errores['mensaje'] = 'Este campo es obligatorio';
        }

        /*
            Comprobación val.
            Si hay errores, se almacenan y se redirige al formulario.
        */
        if (!empty($errores)) {
            $_SESSION['contacto'] = serialize($contacto);
            $_SESSION['error'] = "Formulario no validado";
            $_SESSION['errores'] = $errores;
            header('Location:' . URL . 'contacto');
            exit();
        }
        enviarEmail($nombre, $email, $asunto, $mensaje);
        $_SESSION['mensaje'] = 'Mensaje enviado correctamente.';
        header('Location:' . URL);
        exit();
    }

    
}
