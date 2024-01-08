<?php
class Cliente extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $this->view->title = "Home - Panel Control Clientes";

        $this->view->clientes = $this->model->get();

        $this->view->render('cliente/main/index');
    }

    function new()
    {

        $this->view->title = "Añadir - Gestión Clientes";

        $this->view->render('cliente/new/index');
    }

    function create($param = [])
    {

        $cliente = new classCliente(
            null,
            $_POST['apellidos'],
            $_POST['nombre'],
            $_POST['telefono'],
            $_POST['ciudad'],
            $_POST['dni'],
            $_POST['email']
        );

        $this->model->create($cliente);

        header("Location: " . URL . "cliente");
    }


    function edit($param = [])
    {

        $id = $param[0];

        $this->view->id = $id;

        $this->view->title = "Editar - Gestión Cliente";

        $this->view->cliente = $this->model->read($id);

        //Cargo la vista
        $this->view->render('cliente/edit/index');
    }

    function update($param = [])
    {
        $id = $param[0];

        $this->view->id = $id;

        $cliente = new classCliente(
            null,
            $_POST['apellidos'],
            $_POST['nombre'],
            $_POST['telefono'],
            $_POST['ciudad'],
            $_POST['dni'],
            $_POST['email']
        );

        $this->model->update($id, $cliente);

        header("Location: " . URL . "cliente");
    }

    function delete($param = [])
    {
        $id = $param[0];

        $this->view->id = $id;

        $this->model->delete($id);

        header("Location: " . URL . "cliente");
    }

    function show($param = [])
    {
        $id = $param[0];

        $this->view->id = $id;

        $this->view->title = "Mostrar - Gestión Cliente";

        $this->view->cliente = $this->model->read($id);

        $this->view->render('cliente/show/index');
    }


    function order($param = [])
    {
        $criterioOrdenacion = $param[0];

        $this->view->title = "Ordenar - Gestión Clientes";

        $this->view->clientes = $this->model->order($criterioOrdenacion);

        $this->view->render('cliente/main/index');
    }
    function filter($param = [])
    {

        $expresion = $_GET['expresion'];

        $this->view->title = "Buscar - Gestión clientes";

        $this->view->clientes = $this->model->filter($expresion);

        $this->view->render('cliente/main/index');
    }
}
