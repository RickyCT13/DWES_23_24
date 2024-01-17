<?php

class Corredor extends Controller {
    function __construct() {
        parent::__construct();
    }

    function render() {
        $this->view->title = "Home - Panel Control Corredores";

        $this->view->corredores = $this->model->get();

        $this->view->render('corredor/main/index');
    }
}

?>