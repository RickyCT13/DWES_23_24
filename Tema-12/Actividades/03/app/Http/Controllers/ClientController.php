<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/*
    Controlador en laravel
*/

class ClientController extends Controller {
    public function index() {
        return "Clientes";
    }
    public function create() {
        return "Crear Nuevo Cliente";
    }
    public function show($id) {
        return "Mostrando los detalles del usuario: $id";
    }
    public function update($id) {
        return "Actualizando usuario con id = $id...";
    }
    public function delete($id) {
        return "¿Seguro que desea eliminar el cliente con id $id?";
    }
}
