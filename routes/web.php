<?php

use App\Http\Controllers\AuthController;
use App\Models\Souvenir;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SouvenirController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('souvenirs', SouvenirController::class);
});

Route::get('/souvenirs/{id}/edit',[
    SouvenirController::class, 'edit'
])->name('souvenirs.edit');

Route::get('/souvenirs/{id}', [
    SouvenirController::class, 'update'
])->name("souvenirs.update");

//* ruta formulario de registro
Route::get('/registro', [
    AuthController::class, 'registerForm'
])->name('registro');

//* ruta para ejecutar el formulario
Route::post('/registro', [
    AuthController::class, 'register'
])->name('registro.store');

//* Ruta para manejar la vista de inicio de sesión
Route::get('/acceso', [
    AuthController::class, 'loginForm'
])->name('acceso');

//* Ruta para manejar los datos de inicio de sesión
Route::post('/acceso', [
    AuthController::class, 'login'
])->name('acceso.store');

//* Ruta para cerrar sesión
Route::post('/cerrar', [
    AuthController::class, 'logout'
])->name('cerrar');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-dashboard', [
        AuthController::class, 'adminDashboard'
    ])->name('admin-dashboard');
    
    Route::get('/admin-registro', [
        AuthController::class, 'registrarAdmin'
    ])->name('admin-registro');
});