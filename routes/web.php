<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//vistas del login

Route::view('/login', "login")->name('login');
Route::view('/register', "register")->name('register');
Route::view('/private', "private")->name('private')->middleware('auth');

Route::post('/validar_registro', [LoginController::class, 'register'])->name('validar_registro');
Route::post('/Inicia_sesion', [LoginController::class, 'login'])->name('Inicia_sesion');
Route::get('/Cerrar_sesion', [LoginController::class, 'logout'])->name('Cerrar_sesion');