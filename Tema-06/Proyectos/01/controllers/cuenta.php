
<?php
require_once("models/clienteModel.php");

class Cuenta extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $this->view->title = "Home - Panel Control Cuentas";

        $this->view->cuentas = $this->model->get();

        $this->view->render('cuenta/main/index');
    }

    function new()
    {
        $this->view->title = "Añadir - Gestión Cuentas";

        $clienteModel = new clienteModel();
        $clientesDisponibles = $clienteModel->get();

        $clientesConcatenados = [];
        foreach ($clientesDisponibles as $cliente) {
            $nombreCompleto = $cliente->nombre . ', ' . $cliente->apellidos;
            $clientesConcatenados[$cliente->id] = $nombreCompleto;
        }

        $this->view->clientes = $clientesConcatenados;


        $this->view->render('cuenta/new/index');
    }


    function create($param = [])
    {

        $cuenta = new classCuenta(
            null,
            $_POST['num_cuenta'],
            $_POST['id_cliente'],
            $_POST['fecha_alta'],
            $_POST['fecha_ul_mov'],
            $_POST['num_movtos'],
            $_POST['saldo']
        );

        $this->model->create($cuenta);

        header("Location: " . URL . "cuenta");
    }


    function edit($param = [])
    {
        $id = $param[0];

        $this->view->id = $id;

        $this->view->title = "Editar - Gestión Cuenta";

        $this->view->cuenta = $this->model->read($id);

        $this->view->render('cuenta/edit/index');
    }

    function update($param = [])
    {
        $id = $param[0];

        $this->view->id = $id;

        $cuenta = new classCuenta(
            null,
            $_POST['num_cuenta'],
            $_POST['id_cliente'],
            $_POST['fecha_alta'],
            $_POST['fecha_ul_mov'],
            $_POST['num_movtos'],
            $_POST['saldo']
        );

        $this->model->update($id, $cuenta);

        header("Location: " . URL . "cuenta");
    }

    function delete($param = [])
    {

        $id = $param[0];

        $this->view->id = $id;

        $this->model->delete($id);

        header("Location: " . URL . "cuenta");
    }

    function show($param = [])
    {
        $id = $param[0];

        $this->view->id = $id;

        $this->view->title = "Mostrar - Gestión Cuenta";

        $this->view->cuenta = $this->model->read($id);

        $this->view->render('cuenta/show/index');
    }


    function order($param = [])
    {

        $criterio = $param[0];

        $this->view->title = "Ordenar - Panel de Control cuentas";

        $this->view->cuentas = $this->model->order($criterio);

        $this->view->render('cuenta/main/index');
    }

    function filter($param = [])
    {
        $expresion = $_GET['expresion'];

        $this->view->title = "Buscar - Gestión Cuentas";

        $this->view->cuentas = $this->model->filter($expresion);

        $this->view->render('cuenta/main/index');
    }
}
