<?php

use App\Http\Controllers\carrito_controller;
use App\Http\Controllers\cita_controller;
use App\Http\Controllers\cita_realizada;
use App\Http\Controllers\crear_administrador;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\servicios_cliente;
use App\Http\Controllers\servicios_controller;
use App\Mail\cita_mail;
use Illuminate\Support\Facades\Route;

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

Route::get('/',HomeController::class)->name('home');

Route::get('/dashboard', [servicios_controller::class, 'index'])->middleware(['auth','verified'])->name('servicios.index');

Route::get('/servicios/create', [servicios_controller::class, 'create'])->middleware(['auth','verified'])->name('servicios.create');

Route::get('/servicios/{servicios}/edit', [servicios_controller::class, 'edit'])->middleware(['auth','verified'])->name('servicios.edit');

Route::get('/servicios/{servicios}', [servicios_controller::class, 'show'])->name('servicios.show');

Route::get('/servicios_cliente', [servicios_cliente::class, 'index'])->name('servicios.cliente');

Route::get('/carrito', [carrito_controller::class, 'index'])->middleware(['auth','verified'])->name('servicios.carrito');

Route::get('/citas_realizadas', [cita_realizada::class, 'index'])->middleware(['auth','verified'])->name('cita_realizadas');

Route::get('/email', [cita_mail::class, 'build'])->middleware(['auth','verified'])->name('Mail.cita');

Route::delete('/citas_realizadas/{citas}', [cita_realizada::class, 'destroy'])->middleware(['auth','verified'])->name('cita_realizadas.destroy');

Route::post('/carrito', [carrito_controller::class, 'create'])->middleware(['auth','verified'])->name('carrito.create');

Route::get('/cita', [cita_controller::class, 'index'])->middleware(['auth','verified'])->name('cita.index');

Route::post('/cita', [cita_controller::class, 'store'])->middleware(['auth','verified'])->name('cita.store');

Route::delete('/carrito/{carrito}', [carrito_controller::class, 'destroy'])->middleware(['auth','verified'])->name('carrito.destroy');

Route::get('/crear_administrador', [crear_administrador::class, 'index'])->middleware(['auth','verified'])->name('administrador.create');

Route::post('/crear_administrador', [crear_administrador::class, 'store'])->middleware(['auth','verified'])->name('administrador.store');

require __DIR__.'/auth.php';
