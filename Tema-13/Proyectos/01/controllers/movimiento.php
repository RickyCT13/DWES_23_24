<?php

class Movimiento extends Controller {
    function render($param = []) {
        /*
            Iniciar o continuar sesión
        */
        sec_session_start();

        /*
            Comprobar si el usuario está autenticado
        */
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario sin autenticar";
            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['movimiento']['main']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'index');
        } else {
            /*
                Comprobación exitosa
            */

            /*
                Mostrar mensaje en caso de que haya uno
                Tras esto, borrar la variable de sesión para
                evitar que se muestre múltiples veces
            */
            if (isset($_SESSION['mensaje'])) {
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
            }

            $this->view->title = "Home - Panel Control Movimientos";

            $this->view->movimientos = $this->model->get();

            $this->view->render('movimiento/main/index');
        }
    }
    function new($param = []) {
        /*
            Iniciar o continuar sesión
        */
        sec_session_start();

        /*
            Comprobar si el usuario está autenticado
        */
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario sin autenticar";
            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['movimiento']['main']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'index');
        } else {
            /*
                Comprobación exitosa
            */
            /*
                Creación de un objeto vacío
            */
            $this->view->movimiento = new ClassMovimiento();

            /*
                Comprobamos si hay algún error
            */
            if (isset($_SESSION['error'])) {
                /*
                    Añadir mensaje de error
                */
                $this->view->error = $_SESSION['error'];

                /*
                    Autorellenar fourmlario
                */
                $this->view->movimiento = unserialize($_SESSION['movimiento']);

                /*
                    Recuperar array errores especificos
                */
                $this->view->errores = $_SESSION['errores'];
                
                /*
                    Se eliminan las variables una vez usadas
                    para evitar problemas
                */
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['movimiento']);
            }

            //Añadimos a la vista la propiedad title
            $this->view->title = "Añadir - Gestión Movimientos";
            //Para generar la lista select dinámica de cuentas
            $this->view->cuentas = $this->model->getCuentas();

            //Cargamos la vista del formulario para añadir una nueva movimiento
            $this->view->render("movimiento/new/index");
        }
    }
    function create($param = []) {
        /*
            Iniciar o continuar sesión
        */
        sec_session_start();

        /*
            Comprobar si el usuario está autenticado
        */
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario sin autenticar";
            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['movimiento']['main']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'index');
        } else {
            /*
                Comprobación exitosa
            */
            $id_cuenta = filter_var($_POST['cuenta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha_hora = filter_var($_POST['fecha_hora'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $concepto = filter_var($_POST['concepto'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $tipo = filter_var($_POST['tipo'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $cantidad = filter_var($_POST['cantidad'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $saldo = $this->model->getSaldoCuenta($id_cuenta);

            $movimiento = new ClassMovimiento(
                null,
                $id_cuenta,
                $fecha_hora,
                $concepto,
                $tipo,
                $cantidad,
                $saldo
            );

            if (!isset($fecha_hora) || $fecha_hora == '0000-00-00 00:00') {
                $fecha_hora = date('Y-m-d\TH:i');
            }

            if (empty($concepto)) {
                $errores['concepto'] = 'El campo concepto es obligatorio';
            } else if (strlen($concepto) > 50) {
                $errores['concepto'] = 'El campo concepto debe ser inferior a 50 caracteres';
            }
            if (empty($tipo)) {
                $errores['tipo'] = 'El campo tipo es obligatorio';
            } else if (!in_array($tipo, ['I', 'R'])) {
                $errores['tipo'] = 'El campo tipo debe ser I o R';
            }

            if (empty($cantidad)) {
                $errores['cantidad'] = 'El campo cantidad es obligatorio';
            } else if (!is_numeric($cantidad)) {
                $errores['cantidad'] = 'El campo cantidad debe ser un valor numérico';
            } else if ($tipo == 'R' && $cantidad > $saldo) {
                $errores['cantidad'] = 'Cantidad no disponible, es superior al saldo de la cuenta';
            }

            if (!empty($errores)) {

                $_SESSION['movimiento'] = serialize($movimiento);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;


                header('location:' . URL . 'movimiento/new/index');
            } else {

                if ($tipo == 'I') {
                    $nuevoSaldo = $saldo + $cantidad;
                }

                else {
                    $nuevoSaldo = $saldo - $cantidad;
                }


                $movimiento->saldo = $nuevoSaldo;


                $this->model->create($movimiento);

                $this->model->actualizarSaldoCuenta($id_cuenta, $nuevoSaldo);


                $_SESSION['mensaje'] = "Se ha creado el movimiento bancario correctamente.";

                header("Location:" . URL . "movimiento");
            }
        }
    }
    function mostrar($param = []) {
        /*
            Iniciar o continuar sesión
        */
        sec_session_start();
        
        /*
            Comprobar si el usuario está autenticado
        */
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario sin autenticar";
            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['movimiento']['show']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'movimiento');
        } else {
            /*
                Comprobación exitosa
            */
            // Obtener id del elemento
            $id = $param[0];

            // Cambiar titulo de la vista
            $this->view->title = "Mostrar - Gestión Movimientos";

            // Obtener datos del cliente
            $this->view->movimiento = $this->model->read($id);
            $this->view->cuenta = $this->model->getCuenta($this->view->movimiento->id_cuenta);
            // cargar la vista 'mostrar'
            $this->view->render('movimiento/show/index');
        }
    }
    function ordenar($param = []) {
        /*
            Iniciar o continuar sesión
        */
        sec_session_start();
        
        /*
            Comprobar si el usuario está autenticado
        */
        if (!isset($_SESSION['id'])) {
            $_SESSION['notify'] = "Usuario sin autenticar";
            header("location:" . URL . "login");
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['movimiento']['show']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'movimiento');
        } else {
            $this->view->title = "Home - Panel Control Movimientos";
            $criterio = $param[0];
            $this->view->movimientos = $this->model->order($criterio);

            $this->view->render("movimiento/main/index");
        }
    }
}
