<?php

class Main extends Controller {

    function __construct() {

        parent::__construct();
    }

    function render() {
        sec_session_start();

        /*
            Comprobamos si hay algún error
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

            unset($_SESSION['error']);
            unset($_SESSION['errores']);

        }

        /*
            Mostrar mensaje, en caso de que haya uno
        */
        if (isset($_SESSION['mensaje'])) {
            $this->view->mensaje = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }
        $this->view->render('main/index');
    }
}
