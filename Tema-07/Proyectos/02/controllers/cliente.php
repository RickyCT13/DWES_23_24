<?php
class Cliente extends Controller {
    function __construct() {
        parent::__construct();
    }

    function render($param = []) {
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

            $this->view->title = "Home - Panel Control Clientes";

            $this->view->clientes = $this->model->get();

            $this->view->render('cliente/main/index');
        }
    }

    function new($param = []) {
        // Inicio o continuo sesión
        session_start();

        # compruebo usuario autenticado
        if (!isset($_SESSION['id'])) {
            $_SESSION['mensaje'] = "Usuario sin autenticar";
            header("location:" . URL . "login");
        } else {

            // Crear un objeto vacío
            $this->view->cliente = new ClassCliente();

            // Comprobar si volvemos de un registro no validado
            if (isset($_SESSION['error'])) {
                // Mensaje de error
                $this->view->error = $_SESSION['error'];

                // Autorellenar el formulario con los detalles del cliente
                // no validado
                $this->view->cliente = unserialize($_SESSION['cliente']);

                // Recuperar el array de errores especificos
                $this->view->errores = $_SESSION['errores'];

                // borro las variables de sesión (apuntar el por qué)
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['cliente']);
            }
            // cambiar titulo de la vista
            $this->view->title = "Añadir - Gestión Clientes";

            // cargamos la vista con el formulario
            $this->view->render('cliente/new/index');
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

            // 1. Saneamos los datos del formulario para mayor seguridad
            // Si se introudce un campo vacío, se le otorga null
            $apellidos = filter_var($_POST['apellidos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefono = filter_var($_POST['telefono'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $ciudad = filter_var($_POST['ciudad'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);

            $cliente = new ClassCliente(
                null,
                $apellidos,
                $nombre,
                $telefono,
                $ciudad,
                $dni,
                $email
            );

            // 3. Validación
            $errores = [];

            // Apellidos: Obligatorio (<45 caracteres)
            if (empty($apellidos)) {
                $errores['apellidos'] = 'Este campo es obligatorio';
            } else if (strlen($apellidos) > 45) {
                $errores['apellidos'] = 'Este campo no debe superar los 45 caracteres';
            }

            // Nombre: Obligatorio (<20 caracteres)
            if (empty($nombre)) {
                $errores['nombre'] = 'Este campo es obligatorio';
            } else if (strlen($nombre) > 20) {
                $errores['nombre'] = 'El nombre no debe superar los 20 caracteres';
            }

            // Telefono: NO Obligatorio (9 digitos)
            if (isset($telefono) && (!is_numeric($telefono) || strlen($telefono) != 9)) {
                $errores['telefono'] = 'Este campo debe estar compuesto por 9 dígitos';
            }

            // ciudad: Obligatorio (<20 caracteres)
            if (empty($ciudad)) {
                $errores['ciudad'] = 'Este campo es obligatorio';
            } else if (strlen($ciudad) > 20) {
                $errores['ciudad'] = 'Este campo no debe superar los 20 caracteres';
            }

            //DNI: Obligatorio y Válido (8 dígitos + 1 letra de control)
            // Expresión regular para formato válido
            $options = [
                'options' => [
                    'regexp' => '/^(\d{8})([A-Z])$/'
                ]
            ];
            // DNI vacío
            if (empty($dni)) {
                $errores['dni'] = 'El campo dni es obligatorio';
            }
            // Formato no válido
            else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $options)) {
                $errores['dni'] = 'Formato de DNI incorrecto';
            }
            // El DNI ya existe
            else if (!$this->model->validateDNI($dni)) {
                $errores['dni'] = 'El dni ya existe';
            }

            //Email: Obligatorio
            // Email vacío
            if (empty($email)) {
                $errores['email'] = 'El campo email es obligatorio';
            }
            // Formato no válido
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = 'Formato email incorrecto';
            }
            // El email ya existe
            else if (!$this->model->validateEmail($email)) {
                $errores['email'] = 'El email ya existe';
            }

            // 4. Comprobar validación
            if (!empty($errores)) {
                // Errores de validación
                // Transforma el obj cliente a string
                $_SESSION['cliente'] = serialize($cliente);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                // Redirección a new
                header('Location:' . URL . 'cliente/new');
            } else {
                // Añadir registro a la tabla
                $this->model->create($cliente);

                // Mensaje
                $_SESSION['mensaje'] = 'Cliente creado con éxito';

                // Redirección a pág. principal de 'clientes'
                header('Location:' . URL . 'cliente');
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

            // obtener id del elemento a editar
            $id = $param[0];

            // asignar id a una propiedad de la vista
            $this->view->id = $id;

            // cambiar el titulo de la vista
            $this->view->title = "Editar - Gestión Cliente";

            // Obtener objeto de la clase
            $this->view->cliente = $this->model->read($id);

            // Comprobar si volvemos de un registro no validado
            if (isset($_SESSION['error'])) {
                // Mensaje de error
                $this->view->error = $_SESSION['error'];

                // Autorellenar el formulario con los detalles del cliente
                // no validado
                $this->view->cliente = unserialize($_SESSION['cliente']);

                // Recuperar el array de errores especificos
                $this->view->errores = $_SESSION['errores'];

                // borrar las variables de sesión, para evitar repetición
                unset($_SESSION['error']);
                unset($_SESSION['errores']);
                unset($_SESSION['cliente']);
            }

            // Cargar la vista
            $this->view->render('cliente/edit/index');
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

            // 1. Saneamos los datos del formulario para mayor seguridad
            // Si se introudce un campo vacío, se le otorga null
            $apellidos = filter_var($_POST['apellidos'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $nombre = filter_var($_POST['nombre'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefono = filter_var($_POST['telefono'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $ciudad = filter_var($_POST['ciudad'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $dni = filter_var($_POST['dni'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_var($_POST['email'] ??= '', FILTER_SANITIZE_EMAIL);

            $cliente = new ClassCliente(
                null,
                $apellidos,
                $nombre,
                $telefono,
                $ciudad,
                $dni,
                $email
            );

            // Cargar id del cliente
            $id = $param[0];

            // Obtener objeto
            $objOriginal = $this->model->read($id);

            // 3. Validación
            $errores = [];

            // uso de strcmp() para edición

            // Apellidos: Obligatorio (<45 caracteres)
            if (strcmp($cliente->apellidos, $objOriginal->apellidos) !== 0) {
                if (empty($apellidos)) {
                    $errores['apellidos'] = 'Este campo es obligatorio';
                } else if (strlen($apellidos) > 45) {
                    $errores['apellidos'] = 'Este campo no debe superar los 45 caracteres';
                }
            }

            // Nombre: Obligatorio (<20 caracteres)
            if (strcmp($cliente->nombre, $objOriginal->nombre) !== 0) {
                if (empty($nombre)) {
                    $errores['nombre'] = 'Este campo es obligatorio';
                } else if (strlen($nombre) > 20) {
                    $errores['nombre'] = 'El nombre no debe superar los 20 caracteres';
                }
            }

            // Telefono: Obligatorio (9 digitos)
            if (strcmp($cliente->telefono, $objOriginal->telefono) !== 0) {
                if (empty($telefono)) {
                    $errores['telefono'] = 'Este campo es obligatorio';
                } else if (!is_numeric($telefono) || strlen($telefono) != 9) {
                    $errores['telefono'] = 'Este campo debe estar compuesto por 9 dígitos';
                }
            }

            // ciudad: Obligatorio (<20 caracteres)
            if (strcmp($cliente->ciudad, $objOriginal->ciudad) !== 0) {
                if (empty($ciudad)) {
                    $errores['ciudad'] = 'Este campo es obligatorio';
                } else if (strlen($ciudad) > 20) {
                    $errores['ciudad'] = 'Este campo no debe superar los 20 caracteres';
                }
            }

            //DNI: Obligatorio y Válido (8 dígitos + 1 letra de control)
            // Expresión regular para formato válido
            if (strcmp($cliente->dni, $objOriginal->dni) !== 0) {
                $options = [
                    'options' => [
                        'regexp' => '/^(\d{8})([A-Z])$/'
                    ]
                ];
                // DNI vacío
                if (empty($dni)) {
                    $errores['dni'] = 'El campo dni es obligatorio';
                }
                // Formato no válido
                else if (!filter_var($dni, FILTER_VALIDATE_REGEXP, $options)) {
                    $errores['dni'] = 'Formato de DNI incorrecto';
                }
                // El DNI ya existe
                else if (!$this->model->validateDNI($dni)) {
                    $errores['dni'] = 'El dni ya existe';
                }
            }

            //Email: Obligatorio
            if (strcmp($cliente->email, $objOriginal->email) !== 0) {
                // Email vacío
                if (empty($email)) {
                    $errores['email'] = 'El campo email es obligatorio';
                }
                // Formato no válido
                else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errores['email'] = 'Formato email incorrecto';
                }
                // El email ya existe
                else if (!$this->model->validateEmail($email)) {
                    $errores['email'] = 'El email ya existe';
                }
            }

            // 4. Comprobar validación
            if (!empty($errores)) {
                // Errores de validación
                // Transforma el obj cliente a string
                $_SESSION['cliente'] = serialize($cliente);
                $_SESSION['error'] = 'Formulario no validado';
                $_SESSION['errores'] = $errores;

                // Redirección a new
                header('Location:' . URL . 'cliente/edit/' . $id);
            } else {
                // Actualizar registro de la tabla
                $this->model->update($id, $cliente);

                // Mensaje
                $_SESSION['mensaje'] = 'Cliente editado con éxito';

                // Redirección a pág. principal de 'clientes'
                header('Location:' . URL . 'cliente');
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

            $this->model->delete($id);

            // Mensaje
            $_SESSION['mensaje'] = 'Cliente eliminado';

            header("Location: " . URL . "cliente");
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
            // Obtener id del elemento
            $id = $param[0];

            // Cambiar titulo de la vista
            $this->view->title = "Mostrar - Gestión Cliente";

            // Obtener datos del cliente
            $this->view->cliente = $this->model->read($id);

            // cargar la vista 'mostrar'
            $this->view->render('cliente/show/index');
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

            $this->view->title = "Ordenar - Gestión Clientes";

            $this->view->clientes = $this->model->order($criterio);

            $this->view->render('cliente/main/index');
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

            $this->view->title = "Buscar - Gestión clientes";

            $this->view->clientes = $this->model->filter($expresion);

            $this->view->render('cliente/main/index');
        }
    }
}
