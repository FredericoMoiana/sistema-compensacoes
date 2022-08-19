<?php

use App\Http\Controllers\FinanciadorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::delete('/financiadors/{id}', [FinanciadorController::class, 'delete'])->name('financiadors.delete');
Route::put('/financiadors/{id}', [FinanciadorController::class, 'update'])->name('financiadors.update');
Route::get('/financiadors/{id}/edit', [FinanciadorController::class, 'edit'])->name('financiadors.edit');
Route::get('/financiadors', [FinanciadorController::class, 'index'])->name('financiadors.index');
Route::get('/financiadors/create', [FinanciadorController::class, 'create'])->name('financiadors.create');
Route::post('/financiadors', [FinanciadorController::class, 'store'])->name('financiadors.store');
Route::get('/financiadors/{id}', [FinanciadorController::class, 'show'])->name('financiadors.show');

Route::delete('/entradas/{id}', [EntradaController::class, 'delete'])->name('entradas.delete');
Route::put('/entradas/{id}', [EntradaController::class, 'update'])->name('entradas.update');
Route::get('/entradas/{id}/edit', [EntradaController::class, 'edit'])->name('entradas.edit');
Route::get('/entradas', [EntradaController::class, 'index'])->name('entradas.index');
Route::get('/entradas/create', [EntradaController::class, 'create'])->name('entradas.create');
Route::post('/entradas', [EntradaController::class, 'store'])->name('entradas.store');
Route::get('/entradas/{id}', [EntradaController::class, 'show'])->name('entradas.show');

Route::delete('/projectos/{id}', [ProjectoController::class, 'delete'])->name('projectos.delete');
Route::put('/projectos/{id}', [ProjectoController::class, 'update'])->name('projectos.update');
Route::get('/projectos/{id}/edit', [ProjectoController::class, 'edit'])->name('projectos.edit');
Route::get('/projectos', [ProjectoController::class, 'index'])->name('projectos.index');
Route::get('/projectos/create', [ProjectoController::class, 'create'])->name('projectos.create');
Route::post('/projectos', [ProjectoController::class, 'store'])->name('projectos.store');
Route::get('/projectos/{id}', [ProjectoController::class, 'show'])->name('projectos.show');

Route::delete('/saidas/{id}', [SaidaController::class, 'delete'])->name('saidas.delete');
Route::put('/saidas/{id}', [SaidaController::class, 'update'])->name('saidas.update');
Route::get('/saidas/{id}/edit', [SaidaController::class, 'edit'])->name('saidas.edit');
Route::get('/saidas', [SaidaController::class, 'index'])->name('saidas.index');
Route::get('/saidas/create', [SaidaController::class, 'create'])->name('saidas.create');
Route::post('/saidas', [SaidaController::class, 'store'])->name('saidas.store');
Route::get('/saidas/{id}', [SaidaController::class, 'show'])->name('saidas.show');

Route::delete('/participantes/{id}', [ParticipanteController::class, 'delete'])->name('participantes.delete');
Route::put('/participantes/{id}', [ParticipanteController::class, 'update'])->name('participantes.update');
Route::get('/participantes/{id}/edit', [ParticipanteController::class, 'edit'])->name('participantes.edit');
Route::get('/participantes', [ParticipanteController::class, 'index'])->name('participantes.index');
Route::get('/participantes/create', [ParticipanteController::class, 'create'])->name('participantes.create');
Route::post('/participantes', [ParticipanteController::class, 'store'])->name('participantes.store');
Route::get('/participantes/{id}', [ParticipanteController::class, 'show'])->name('participantes.show');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
