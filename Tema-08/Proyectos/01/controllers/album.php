<?php

class Album extends Controller {
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['main']))) {
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


            # Creo la propiedad title de la vista
            $this->view->title = "Home - Panel Control Álbumes";

            # Creo la propiedad albumes dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->albumes = $this->model->get();


            $this->view->render('album/main/index');
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['new']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'album');
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
                Crear un objeto album vacío
            */
            $this->view->album = new ClassAlbum();

            /*
                Comprobar si se vuelve de un registro no validado
            */
            if (isset($_SESSION['error'])) {
                /*
                    Mostrar mensaje de error
                */
                $this->view->error = $_SESSION['error'];

                /*
                    Rellenar formulario con los detalles del registro
                */
                $this->view->album = unserialize($_SESSION['album']);

                /*
                    Recuperar array con errores específicos
                */
                $this->view->errores = $_SESSION['errores'];

                /*
                    Eliminar variables de sesión
                */
                unset($_SESSION['error']);
                unset($_SESSION['album']);
                unset($_SESSION['errores']);
            }

            /*
                Crear la propiedad title (título) de la vista
            */
            $this->view->title = "Añadir - Panel Control Álbumes";

            /*
                Cargar la vista con el formulario nuevo álbum
            */
            $this->view->render('album/new/index');
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['new']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'album');
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
                Saneamiento de datos
            */
            $titulo = filter_var($_POST['titulo'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $descripcion = filter_var($_POST['descripcion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $autor = filter_var($_POST['autor'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha = filter_var($_POST['fecha'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $lugar = filter_var($_POST['lugar'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $categoria = filter_var($_POST['categoria'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $etiquetas = filter_var($_POST['etiquetas'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $carpeta = filter_var($_POST['carpeta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);

            /*
                Creación de álbum con datos saneados
            */
            $album = new ClassAlbum(
                null,
                $titulo,
                $descripcion,
                $autor,
                $fecha,
                $lugar,
                $categoria,
                $etiquetas,
                0,
                0,
                $carpeta
            );

            /*
                Validación de errores
            */
            $errores = [];

            // Título: Obligatorio <= 100 chars
            if (empty($titulo)) {
                $errores['titulo'] = 'El título es obligatorio';
            } else if (strlen($titulo) > 100) {
                $errores['titulo'] = 'El título no debe superar los 100 caracteres';
            }

            // Descripción: Obligatorio
            if (empty($descripcion)) {
                $errores['descripcion'] = 'La descripción es obligatoria';
            }

            // Autor: Obligatorio
            if (empty($autor)) {
                $errores['autor'] = 'El autor es obligatorio';
            }

            // Fecha: Obligatorio
            if (empty($fecha)) {
                $errores['fecha'] = 'La fecha es obligatoria';
            }

            // Lugar: Obligatorio
            if (empty($lugar)) {
                $errores['lugar'] = 'El lugar es obligatorio';
            }

            // Categoría: Obligatorio
            if (empty($categoria)) {
                $errores['categoria'] = 'La categoría es obligatoria';
            }

            // Etiquetas: NO obligatorio

            // Carpeta: Obligatorio (sin espacios)
            if (empty($carpeta)) {
                $errores['carpeta'] = 'La carpeta es obligatoria';
            } else if (str_contains($carpeta, ' ')) {
                $errores['carpeta'] = 'La ruta no debe contener espacios';
            }

            /*
                Comprobar validación
            */
            if (!empty($errores)) {
                /*
                    Errores de validación
                    Se serializa el objeto ya que no se admiten objetos en las
                    variables de sesión
                */
                $_SESSION['album'] = serialize($album);
                $_SESSION['error'] = 'El formulario no ha sido validado';
                $_SESSION['errores'] = $errores;

                /*
                    Redireccionamos al método new()
                */
                header('location:' . URL . 'album/new');
            } else {
                /*
                    Añadir registro a la tabla
                */
                $this->model->create($album);

                /*
                    Crear carpeta de album
                */
                mkdir('images/' . $carpeta);

                /*
                    Mostrar mensaje indicando que se ha realizado la operación
                */
                $_SESSION['mensaje'] = 'Álbum añadido correctamente';

                /*
                    Redirección a la página principal (main) de álbumes
                */
                header('location:' . URL . 'album');
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['edit']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'album');
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
                Obtener el id del album a editar
            */
            $id = $param[0];

            /*
                Asignar id a prop. de la vista
            */
            $this->view->id = $id;

            /*
                Asignar título
            */
            $this->view->title = 'Editar - Panel Control Álbumes';

            /*
                Obtener obj. de la clase álbum
            */
            $this->view->album = $this->model->read($id);


            /*
                Comprobar si se vuelve de un registro no validado
            */
            if (isset($_SESSION['error'])) {
                /*
                    Mostrar mensaje de error
                */
                $this->view->error = $_SESSION['error'];

                /*
                    Rellenar formulario con los detalles del registro
                */
                $this->view->album = unserialize($_SESSION['album']);

                /*
                    Recuperar array con errores específicos
                */
                $this->view->errores = $_SESSION['errores'];

                /*
                    Eliminar variables de sesión
                */
                unset($_SESSION['error']);
                unset($_SESSION['album']);
                unset($_SESSION['errores']);
            }

            /*
                Cargar la vista con el formulario editar álbum
            */
            $this->view->render('album/edit/index');
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['edit']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'album');
        } else {
            /*
                Comprobación exitosa
            */

            /*
                Saneamiento de datos
            */
            $titulo = filter_var($_POST['titulo'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $descripcion = filter_var($_POST['descripcion'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $autor = filter_var($_POST['autor'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $fecha = filter_var($_POST['fecha'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $lugar = filter_var($_POST['lugar'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $categoria = filter_var($_POST['categoria'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $etiquetas = filter_var($_POST['etiquetas'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);
            $carpeta = filter_var($_POST['carpeta'] ??= '', FILTER_SANITIZE_SPECIAL_CHARS);

            /*
                Creación de álbum con datos saneados
            */
            $album = new ClassAlbum(
                null,
                $titulo,
                $descripcion,
                $autor,
                $fecha,
                $lugar,
                $categoria,
                $etiquetas,
                0,
                0,
                $carpeta
            );

            /*
                Recuperar id del album a actualizar
            */
            $id = $param[0];

            /*
                Obtener obj. del album original
            */
            $album_o = $this->model->read($id);

            /*
                Validación de errores
            */
            $errores = [];

            // Título: Obligatorio <= 100 chars
            if (strcmp($titulo, $album_o->titulo) !== 0) {
                if (empty($titulo)) {
                    $errores['titulo'] = 'El título es obligatorio';
                } else if (strlen($titulo) > 100) {
                    $errores['titulo'] = 'El título no debe superar los 100 caracteres';
                }
            }


            // Descripción: Obligatorio
            if (strcmp($descripcion, $album_o->descripcion) !== 0) {
                if (empty($descripcion)) {
                    $errores['descripcion'] = 'La descripción es obligatoria';
                }
            }


            // Autor: Obligatorio
            if (strcmp($autor, $album_o->autor) !== 0) {
                if (empty($autor)) {
                    $errores['autor'] = 'El autor es obligatorio';
                }
            }

            // Fecha: Obligatorio
            if (strcmp($fecha, $album_o->fecha) !== 0) {
                if (empty($fecha)) {
                    $errores['fecha'] = 'La fecha es obligatoria';
                }
            }

            // Lugar: Obligatorio
            if (strcmp($lugar, $album_o->lugar) !== 0) {
                if (empty($lugar)) {
                    $errores['lugar'] = 'El lugar es obligatorio';
                }
            }

            // Categoría: Obligatorio
            if (strcmp($categoria, $album_o->categoria) !== 0) {
                if (empty($categoria)) {
                    $errores['categoria'] = 'La categoría es obligatoria';
                }
            }

            // Etiquetas: NO obligatorio

            // Carpeta: Obligatorio (sin espacios)
            if (strcmp($carpeta, $album_o->carpeta) !== 0) {
                if (empty($carpeta)) {
                    $errores['carpeta'] = 'La carpeta es obligatoria';
                } else if (str_contains($carpeta, ' ')) {
                    $errores['carpeta'] = 'La ruta no debe contener espacios';
                }
            }

            /*
                Comprobar validación
            */
            if (!empty($errores)) {
                /*
                    Errores de validación
                    Se serializa el objeto ya que no se admiten objetos en las
                    variables de sesión
                */
                $_SESSION['album'] = serialize($album);
                $_SESSION['error'] = 'El formulario no ha sido validado';
                $_SESSION['errores'] = $errores;

                /*
                    Redireccionamos al método edit
                */
                header('location:' . URL . 'album/edit/' . $id);
            } else {
                /*
                    Actualizar registro de la tabla
                */
                $this->model->update($id, $album);

                rename('images/' . $album_o->carpeta, 'images/' . $carpeta);

                /*
                    Mostrar mensaje indicando que se ha realizado la operación
                */
                $_SESSION['mensaje'] = 'Álbum editado correctamente';

                /*
                    Redirección a la página principal (main) de álbumes
                */
                header('location:' . URL . 'album');
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['delete']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'album');
        } else {
            /*
                Obtener id del álbum
            */
            $id = $param[0];

            /*
                Obtener objeto
            */
            $album = $this->model->read($id);
            $carpeta = $album->carpeta;

            /*
                Eliminar álbum
            */
            $this->model->delete($id);

            /*
                Eliminar los contenidos de la carpeta
            */
            foreach (glob('images/' . $carpeta . '/*') as $a) {
                unlink($a);
            }

            /*
                Eliminar carpeta
            */
            rmdir('images/' . $carpeta);

            /*
                Generar mensaje
            */
            $_SESSION['mensaje'] = 'Álbum eliminado correctamente';

            /*
                Redirección al main
            */
            header('location:' . URL . 'album');
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['show']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'album');
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
                Obtener el id del album a editar
            */
            $id = $param[0];

            /*
                Asignar id a prop. de la vista
            */
            $this->view->id = $id;

            /*
                Asignar título
            */
            $this->view->title = 'Mostrar - Panel Control Álbumes';

            /*
                Obtener obj. de la clase álbum
            */
            $this->view->album = $this->model->read($id);

            /* 
                Contador visitas
            */
            $this->model->contadorVisitas($id);

            /*
                Cargar vista
            */
            $this->view->render('album/show/index');
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['order']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'album');
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

            $this->view->criterio = (int) $param[0];

            $this->view->albumes = $this->model->order($this->view->criterio);

            $this->view->render('album/main/index');
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['filter']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'album');
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


            $this->view->albumes = $this->model->filter($_GET['expresion']);

            $this->view->render('album/main/index');
        }
    }
    function upload($param = []) {
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
        } else if ((!in_array($_SESSION['id_rol'], $GLOBALS['album']['upload']))) {
            $_SESSION['mensaje'] = "Ha intentado realizar operación sin privilegios";
            header('location:' . URL . 'album');
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
                Obtener id
            */
            $id = $param[0];

            /*
                Obtener obj.
            */
            $album = $this->model->read($id);

            $this->model->subirArchivo($_FILES['archivos'], $album->carpeta);

            $numFotos = count(glob('images/' . $album->carpeta . '/*'));

            $this->model->contadorFotos($album->id, $numFotos);

            header('location:' . URL . 'album');
        }

    }
    function contarVisitas($param = []) {
        
    }
}
