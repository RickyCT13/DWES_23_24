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
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return "Hola mundo, Laravel 10";
    // return view('welcome');
});

Route::resource('articulos', ArticuloController::class);
