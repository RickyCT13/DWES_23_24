
<?php
require_once("models/clienteModel.php");

class Cuenta extends Controller {
    function __construct() {
        parent::__construct();
    }

    function render() {
        // Inicio o continuo sesión
        session_start();

        # compruebo usuario autenticado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario sin autenticar";
            header("location:" . URL . "login");
        } else {

            if (isset($_SESSION['mensaje'])) {
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
            }
            $this->view->title = "Home - Panel Control Cuentas";

            $this->view->cuentas = $this->model->get();

            $this->view->render('cuenta/main/index');
        }
    }

    function new() {
        // Inicio o continuo sesión
        session_start();

        # compruebo usuario autenticado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario sin autenticar";
            header("location:" . URL . "login");
        } else {

            $clienteModel = new ClienteModel();


            // Comprobar si volvemos de un registro no validado
            if (isset($_SESSION['error'])) {
                // Mensaje de error
                $this->view->error = $_SESSION['error'];

                // Autorellenar el formulario con los detalles de la cuenta
                // no validada
                $this->view->cuenta = unserialize($_SESSION['cuenta']);

                // Recuperar el array de errores especificos
                $this->view->errores = $_SESSION['errores'];

                // borro las variables de sesión
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['cuenta']);
            }

            $this->view->clientes = $clienteModel->get();

            $this->view->title = "Añadir - Gestión Cuentas";

            $this->view->render('cuenta/new/index');
        }
    }


    function create($param = []) {

        // Inicio o continuo sesión
        session_start();
        # compruebo usuario autenticado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario sin autenticar";
            header("location:" . URL . "login");
        } else {

            // 1. Saneamiento de datos
            $num_cuenta = filter_var($_POST['num_cuenta'] ??= '', FILTER_SANITIZE_NUMBER_INT);
            $id_cliente = filter_var($_POST['id_cliente'] ??= '', FILTER_SANITIZE_NUMBER_INT);
            $fecha_alta = filter_var($_POST['fecha_alta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha_ul_mov = filter_var($_POST['fecha_ul_mov'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $num_movtos = filter_var($_POST['num_movtos'] ??= '', FILTER_SANITIZE_NUMBER_INT);
            $saldo = filter_var($_POST['saldo'] ??= '', FILTER_SANITIZE_NUMBER_FLOAT);

            $cuenta = new ClassCuenta(
                null,
                $num_cuenta,
                $id_cliente,
                $fecha_alta,
                $fecha_ul_mov,
                $num_movtos,
                $saldo
            );

            // 2. Validación
            // Creación de array de errores especificos
            $errores = [];

            // num_cuenta: obligatorio, único y de 20 dígitos numéricos de longitud
            if (empty($num_cuenta)) {
                $errores['num_cuenta'] = 'Este campo es obligatorio';
            } else if (!is_numeric($num_cuenta) || strlen($num_cuenta) != 20) {
                $errores['num_cuenta'] = 'El número de cuenta debe consistir de 20 caracteres numéricos';
            } else if (!$this->model->validateNumCuenta($num_cuenta)) {
                $errores['num_cuenta'] = 'Ya existe otra cuenta con este número de cuenta';
            }

            // id_cliente: obligatorio, ha de existir en la tabla clientes
            if (empty($id_cliente)) {
                $errores['id_cliente'] = 'La cuenta debe tener un cliente asociado registrado en la base de datos';
            }

            // 3. Comprobar validación
            if (!empty($errores)) {
                // Errores de validación
                // Serializa el objeto cuenta a string
                $_SESSION['cuenta'] = serialize($cuenta);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                // Redirección al formulario
                header('Location:' . URL . 'cuenta/new');
            } else {
                // Añadir cuenta a la tabla
                $this->model->create($cuenta);

                // Mensaje
                $_SESSION['mensaje'] = 'Cuenta creada con éxito';

                // Redirección a pág principal cuentas
                header('Location: ' . URL . 'cuenta');
            }
        }
    }


    function edit($param = []) {
        // Inicio o continuo sesión
        session_start();
        # compruebo usuario autenticado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario sin autenticar";
            header("location:" . URL . "login");
        } else {

            $id = $param[0];

            $this->view->id = $id;

            $this->view->title = "Editar - Gestión Cuenta";

            $this->view->cuenta = $this->model->read($id);

            $clienteModel = new ClienteModel();

            // Comprobar si volvemos de un registro no validado
            if (isset($_SESSION['error'])) {
                // Mensaje de error
                $this->view->error = $_SESSION['error'];

                // Autorellenar el formulario con los detalles de la cuenta
                // no validada
                $this->view->cuenta = unserialize($_SESSION['cuenta']);

                // Recuperar el array de errores especificos
                $this->view->errores = $_SESSION['errores'];

                // borro las variables de sesión
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['cuenta']);
            }

            $this->view->clientes = $clienteModel->get();

            $this->view->render('cuenta/edit/index');
        }
    }

    function update($param = []) {
        // Inicio o continuo sesión
        session_start();

        # compruebo usuario autenticado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario sin autenticar";
            header("location:" . URL . "login");
        } else {

            // 1. Saneamiento de datos
            $num_cuenta = filter_var($_POST['num_cuenta'] ??= '', FILTER_SANITIZE_NUMBER_INT);
            $id_cliente = filter_var($_POST['id_cliente'] ??= '', FILTER_SANITIZE_NUMBER_INT);
            $fecha_alta = filter_var($_POST['fecha_alta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha_ul_mov = filter_var($_POST['fecha_ul_mov'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $num_movtos = filter_var($_POST['num_movtos'] ??= '', FILTER_SANITIZE_NUMBER_INT);
            $saldo = filter_var($_POST['saldo'] ??= '', FILTER_SANITIZE_NUMBER_FLOAT);

            $cuenta = new ClassCuenta(
                null,
                $num_cuenta,
                $id_cliente,
                $fecha_alta,
                $fecha_ul_mov,
                $num_movtos,
                $saldo
            );

            $id = $param[0];

            $objOriginal = $this->model->read($id);

            // 2. Validación
            // Creación de array de errores especificos
            $errores = [];

            // num_cuenta: obligatorio, único y de 20 dígitos numéricos de longitud
            if (strcmp($cuenta->num_cuenta, $objOriginal->num_cuenta) !== 0) {
                if (empty($num_cuenta)) {
                    $errores['num_cuenta'] = 'Este campo es obligatorio';
                } else if (!is_numeric($num_cuenta) || strlen($num_cuenta) != 20) {
                    $errores['num_cuenta'] = 'El número de cuenta debe consistir de 20 caracteres numéricos';
                } else if (!$this->model->validateNumCuenta($num_cuenta)) {
                    $errores['num_cuenta'] = 'Ya existe otra cuenta con este número de cuenta';
                }
            }
            // id_cliente: obligatorio, ha de existir en la tabla clientes
            if (strcmp($cuenta->id_cliente, $objOriginal->id_cliente) !== 0) {
                if (empty($id_cliente)) {
                    $errores['id_cliente'] = 'La cuenta debe tener un cliente asociado registrado en la base de datos';
                }
            }

            // 3. Comprobar validación
            if (!empty($errores)) {
                // Errores de validación
                // Serializa el objeto cuenta a string
                $_SESSION['cuenta'] = serialize($cuenta);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                // Redirección al formulario
                header('Location:' . URL . 'cuenta/new');
            } else {
                // Añadir cuenta a la tabla
                $this->model->update($id, $cuenta);

                // Mensaje
                $_SESSION['mensaje'] = 'Cuenta editada con éxito';

                // Redirección a pág principal cuentas
                header('Location: ' . URL . 'cuenta');
            }
        }
    }

    function delete($param = []) {
        // Inicio o continuo sesión
        session_start();

        # compruebo usuario autenticado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario sin autenticar";
            header("location:" . URL . "login");
        } else {
            $id = $param[0];

            $this->view->id = $id;

            $this->model->delete($id);

            // Mensaje
            $_SESSION['mensaje'] = 'Cuenta eliminada';

            header("Location: " . URL . "cuenta");
        }
    }

    function show($param = []) { 
        // Inicio o continuo sesión
        session_start();

        # compruebo usuario autenticado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario sin autenticar";
            header("location:" . URL . "login");
        } else {
            $id = $param[0];

            $this->view->id = $id;

            $this->view->title = "Mostrar - Gestión Cuenta";

            $this->view->cuenta = $this->model->read($id);

            $this->view->render('cuenta/show/index');
        }
    }


    function order($param = []) { 
        // Inicio o continuo sesión
        session_start();

        # compruebo usuario autenticado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario sin autenticar";
            header("location:" . URL . "login");
        } else {

            $criterio = $param[0];

            $this->view->title = "Ordenar - Panel de Control cuentas";

            $this->view->cuentas = $this->model->order($criterio);

            $this->view->render('cuenta/main/index');
        }
    }

    function filter($param = []) {
        // Inicio o continuo sesión
        session_start();

        # compruebo usuario autenticado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario sin autenticar";
            header("location:" . URL . "login");
        } else {
            $expresion = $_GET['expresion'];

            $this->view->title = "Buscar - Gestión Cuentas";

            $this->view->cuentas = $this->model->filter($expresion);

            $this->view->render('cuenta/main/index');
        }
    }
}
