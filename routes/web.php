<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;

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
});


Route::resource('producto',ProductoController::class)->middleware('auth');
Route::resource('pedido',PedidoController::class)->middleware('auth');


Auth::routes(['register'=>true,'reset'=>true]);

Route::get('/home', [ProductoController::class, 'index'])->name('home');

Route::get('/pedido', [PedidoController::class, 'index'])->name('pedido');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [ProductoController::class, 'index'])->name('home');

    Route::get('/pedido', [PedidoController::class, 'index'])->name('pedido');
});

