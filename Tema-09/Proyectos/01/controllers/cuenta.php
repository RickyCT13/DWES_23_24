
<?php
require_once("models/clienteModel.php");

class Cuenta extends Controller {
    function __construct() {
        parent::__construct();
    }

    function render() {
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuenta']['main']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'index');
        } else {
            /*
                Comprobación exitosa
            */

            if (isset($_SESSION['mensaje'])) {
                $this->view->mensaje = $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
            }
            $this->view->title = "Home - Panel Control cuenta";

            $this->view->cuenta = $this->model->get();

            $this->view->render('cuenta/main/index');
        }
    }

    function new() {
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuenta']['new']))) {
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
            $clienteModel = new ClienteModel();

            $this->view->cliente = $clienteModel->get();

            $this->view->cuenta = new ClassCuenta();

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

            $this->view->title = "Añadir - Gestión cuenta";

            $this->view->render('cuenta/new/index');
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuenta']['new']))) {
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

                // Redirección a pág principal cuenta
                header('Location: ' . URL . 'cuenta');
            }
        }
    }


    function edit($param = []) {
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuenta']['edit']))) {
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

            $this->view->cliente = $clienteModel->get();

            $this->view->render('cuenta/edit/index');
        }
    }

    function update($param = []) {
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuenta']['edit']))) {
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

                // Redirección a pág principal cuenta
                header('Location: ' . URL . 'cuenta');
            }
        }
    }

    function delete($param = []) {
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuenta']['delete']))) {
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

            $id = $param[0];

            $this->view->id = $id;

            $this->model->delete($id);

            // Mensaje
            $_SESSION['mensaje'] = 'Cuenta eliminada';

            header("Location: " . URL . "cuenta");
        }
    }

    function show($param = []) {
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuenta']['show']))) {
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

            $id = $param[0];

            $this->view->id = $id;

            $this->view->title = "Mostrar - Gestión Cuenta";

            $this->view->cuenta = $this->model->read($id);

            $this->view->render('cuenta/show/index');
        }
    }


    function order($param = []) {
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuenta']['order']))) {
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

            $criterio = $param[0];

            $this->view->title = "Ordenar - Panel de Control cuenta";

            $this->view->cuenta = $this->model->order($criterio);

            $this->view->render('cuenta/main/index');
        }
    }

    function filter($param = []) {
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuenta']['filter']))) {
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

            $expresion = $_GET['expresion'];

            $this->view->title = "Buscar - Gestión cuenta";

            $this->view->cuenta = $this->model->filter($expresion);

            $this->view->render('cuenta/main/index');
        }
    }
    function exportCSV() {
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuenta']['export']))) {
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

            /*
                Obtener los datos de las cuenta, almacenándolos en un
                array asociativo estableciendo el "Fetch Mode"
            */
            $cuentas = $this->model->getAllData()->fetchAll(PDO::FETCH_ASSOC);

            /*
                Establecemos el nombre del archivo csv a exportar
            */
            $fileName = 'cuentas.csv';

            /*
                Enviar cabecera(s) HTTP
                La primera línea especifica que se enviará un archivo CSV
                En la segunda línea se especifica el nombre del archivo
            */
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');

            /*
                Creamos / Abrimos un archivo csv para escritura.
                Se añade el modificador 'b' para evitar incompatibilidades
            */
            $file = fopen('php://output', 'w');

            /*
                Iterar sobre el array de cuenta, escribiendo cada registro en el CSV
            */
            foreach ($cuentas as $cuenta) {
                
                array_shift($cuenta);
                fputcsv($file, $cuenta, ';');
            }

            /*
                Cerramos el flujo, aplicándose los cambios
            */
            fclose($file);
        }
    }

    function importCSV() {
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
            exit();
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuenta']['import']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'cuenta');
            exit();
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
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo_csv"]) && $_FILES["archivo_csv"]["error"] == UPLOAD_ERR_OK) {
                $file = $_FILES["archivo_csv"]["tmp_name"];

                $handle = fopen($file, "r");

                if ($handle !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                        $num_cuenta = $data[0];
                        $id_cliente = $data[1];
                        $fecha_alta = $data[2];
                        $fecha_ul_mov = $data[3];
                        $num_movtos = $data[4];
                        $saldo = $data[5];
                        $create_at = $data[6];
                        $update_at = $data[7];

                        //Método para verificar número de cuenta único.
                        if ($this->model->validateNumCuenta($num_cuenta)) {
                            // Si no existe, crear una nueva cuenta
                            $cuenta = new ClassCuenta(
                                null,
                                $num_cuenta,
                                $id_cliente,
                                $fecha_alta,
                                $fecha_ul_mov,
                                $num_movtos,
                                $saldo,
                                $create_at,
                                $update_at
                            );

                            //Usamos create para meter la cuenta en la base de datos
                            $this->model->create($cuenta);
                        } else {
                            //Error de cuenta existente
                            $_SESSION['error'] = "Error, esta cuenta ya existe en la base de datos";
                        }
                    }

                    fclose($handle);
                    $_SESSION['mensaje'] = "Importación realizada correctamente";
                    header('location:' . URL . 'cuenta');
                    exit();
                } else {
                    $_SESSION['error'] = "Error con el archivo CSV";
                    header('location:' . URL . 'cuenta');
                    exit();
                }
            } else {
                $_SESSION['error'] = "Seleccione un archivo CSV";
                header('location:' . URL . 'cuenta');
                exit();
            }
        }
    }
    function pdf() {
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['cuenta']['export']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'index');
        } else {
            /*
                Comprobación exitosa
            */
            /*
                Obtener los registros de la tabla cuentas
            */
            $cuentas = $this->model->getAllData();
            /*
                Crear objeto de la clase ClassPdfCuentas
            */
            $pdfCuentas = new ClassPdfCuentas();

            /*
                Establecemos el título que aparecerá en la pestaña
                Tras esto, llamamos al resto de métodos
            */
            $pdfCuentas->SetTitle('Informe Cuentas ' . date("d/m/Y"), true);
            $pdfCuentas->AddPage();
            $pdfCuentas->titulo();
            $pdfCuentas->encabezado();
            $pdfCuentas->contenido($cuentas);

            /*
                El archivo PDF se abrirá para su visualización, con la
                opción de descargarlo. El nombre, de manera similar al título,
                contiene la fecha actual
            */
            $pdfCuentas->Output('I','Informe_Cuentas_' . date("d/m/Y") . ".pdf", true);
            
        }
    }
}
