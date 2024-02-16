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
    Rutas
*/
Route::get('/', function () {
    return "Hola mundo, Laravel 10";
    // return view('welcome');
});

Route::get('/clients', function () {
    return 'Vista principal de clientes';
});

Route::get('/clients/create', function () {
    return "Creación de cliente";
});

Route::get('/clients/edit/{id}', function ($id) {
    return "Editando cliente con id {$id}";
});


Route::get('/clients/delete/{id}', function ($id) {
    return "Eliminar cliente con id {$id}?";
});

Route::get('/clients/order/{criterio}', function ($criterio) {
    return "Ordenando clientes según {$criterio}";
});

Route::get('/clients/filter/{expresion}', function ($expresion) {
    return "Mostrando resultados que coincidan con: {$expresion}";
});

/*
    Parámetros opcionales
*/
Route::get('/clients/delete/{id1}/{id2?}', function ($id1, $id2 = null) {
    if ($id2) {
        return "Eliminar clientes ${id1} y ${id2}";
    }
    return "Eliminar cliente con id {$id1}?";
});
