<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CapacitacionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InscripcionCapacitacionController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/login-admin', function () {
    return view('auth.login-admin');
})->name('login-admin');


Route::post('/crear', [CapacitacionController::class, 'store'])
    ->name('crear');

Route::get('/administrar', [CapacitacionController::class, 'index'])
    ->name('administrar');

Route::get('/mis-capacitaciones', [InscripcionCapacitacionController::class, 'index'])
    ->name('mis-capacitaciones');

Route::get('/ver/{id}', [CapacitacionController::class, 'show'])
    ->name('ver');

Route::get('/editar/{id}', [CapacitacionController::class, 'edit'])
    ->name('editar');

Route::delete('/eliminar/{id}', [CapacitacionController::class, 'destroy'])
    ->name('eliminar');

Route::delete('/eliminar-inscripciones/{id}', [InscripcionCapacitacionController::class, 'destroy'])
    ->name('eliminar-inscripciones');

Route::put('/actualizar/{id}', [CapacitacionController::class, 'update'])
    ->name('actualizar');

Route::post('iniciar-sesion', [LoginController::class, 'login'])
->name('loginSubmit');


Route::post('/iniciar-admin', [LoginController::class, 'iniciarAdmin'])
->name('iniciar-admin');



Route::post('/crear-registro', [LoginController::class, 'crearRegistro'])
->name('crear-registro');

Route::get('/registro', [LoginController::class, 'registro'])
    ->name('registro');


Route::post('/inscripciones-capacitaciones', [InscripcionCapacitacionController::class, 'store'])
    ->name('inscripciones-capacitaciones');

