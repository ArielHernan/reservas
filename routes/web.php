<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\reservaController;
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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


//RESERVA
Route::get('/nuevaReserva/{id?}',[reservaController::class,'crear'])->middleware('auth'); 
Route::post('/reservaUpdate',[reservaController::class,'update'])->middleware('auth')->name('reservaUpdate'); 
Route::get('/adminVerReservas/{filtro?}',[reservaController::class,'mostrar'])->middleware('auth'); 



require __DIR__.'/auth.php';
