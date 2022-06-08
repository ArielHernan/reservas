<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\reservaController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/dashboard',[reservaController::class,'paginaLogueado'])->middleware(['auth'])->name('dashboard');

Route::get("out",function() {
    Auth::logout();
    return redirect()->route("/");
})->middleware(["auth"])->name("out");
//aqui 
// Route::get('inicio',[reservaController::class,'paginaLogueado'])->middleware(['auth'])->name('inicio');


//RESERVA
Route::get("actualizar",[reservaController::class,'actualizar'])->middleware(['auth'])->name('actualizar');
Route::get('crearModificarReserva',[reservaController::class,'modificaReserva'])->middleware('auth')->name("crearModificarReserva"); 
Route::get('/nuevaReserva/{id?}',[reservaController::class,'crear'])->middleware('auth'); 
Route::post('/reservaUpdate',[reservaController::class,'update'])->middleware('auth')->name('reservaUpdate'); 
Route::get('/adminVerReservas/{filtro?}',[reservaController::class,'mostrar'])->middleware('auth'); 
Route::get('/borrarReserva',[reservaController::class,'borrarReserva'])->middleware('auth')->name('borrarReserva');
Route::get('/reservaModificada',[reservaController::class,'reservaModificada'])->middleware('auth')->name('reservaModificada');

//ADMIN RESERVAS
Route::get("adminReservas",[reservaController::class,"accederAdmin"])->middleware(["auth"])->name("adminReservas");
Route::get("aceptarReserva",[reservaController::class,"aceptarReserva"])->middleware(["auth"])->name("aceptarReserva");
Route::get("rechazarReserva",[reservaController::class,"rechazarReserva"])->middleware(["auth"])->name("rechazarReserva");

require __DIR__.'/auth.php';