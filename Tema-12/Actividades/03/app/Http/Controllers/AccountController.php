<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller {
    public function index() {
        return "Home - Cuentas";
    }
    public function create() {
        return "Creando cuenta";
    }

    public function read($id) {
        return "Datos de la cuenta<br>Id: $id";
    }

    public function update($id) {
        return "Actualizando cuenta con id $id";
    }

    public function delete($id) {
        return "Eliminando cuenta con id $id";
    }
}
