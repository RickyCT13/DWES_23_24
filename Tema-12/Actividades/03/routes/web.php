<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
    Para usar los controladores, incluimos la clase con la palabra
    clave "use"
*/
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return "Hola mundo, Laravel 10";
    // return view('welcome');
});

/*
    Vinculamos cada ruta con un método de la clase
*/
Route::controller(ClientController::class)->group(function () {
    Route::get('/clients', 'index');
    Route::get('/clients/show/{id}', 'show');
    Route::get('/clients/create', 'create');
    Route::get('/clients/update/{id}', 'update');
    Route::get('/clients/delete/{id}', 'delete');
});

/* 
    Se pueden agrupar los vinculos como
    se ve arriba o vincular los métodos de manera individual
    de la siguiente forma:
        Route::get('/clients', [ClientController::class, 'index']);
*/

/*
    AccountController
    Al crear un controlador con la opción --resource podemos hacer que
    se generen las rutas automáticamente con el método:
        Route::resource('nombre', Controlador::class);
    Además, podemos especificar los métodos que queremos vincular
    mediante los métodos:
        - ...->only([<metodos que se quieren vincular>]);
        - ...->except([<metodos que NO se quieren vincular>]);
*/

Route::resource('accounts', AccountController::class);