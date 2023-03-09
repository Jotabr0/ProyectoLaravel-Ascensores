<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CuotaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

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

//Route::get('/', 'App\Http\Controllers\TareaController@index')->middleware(['auth']);

//Route::get('/', [App\Http\Controllers\TareaController::class, 'index'])->middleware('auth');

Route::get('/tarea/create', [TareaController::class, 'create'])->name('tarea.create');
Route::post('/tarea/store', [TareaController::class, 'store'])->name('tarea.store');
Route::post('/verificar-cliente', 'TareaController@verificarCliente')->name('verificar_cliente');



Route::middleware(['auth'])->group(function () {
Route::get('/', [TareaController::class, 'index'])->name('tarea.index');
Route::get('/tareas', [TareaController::class, 'index'])->name('tarea.index');
Route::get('/tareas/pendientes', [TareaController::class, 'verPendientes'])->name('tarea.verPendientes');


Route::get('tarea/{id}/edit', [TareaController::class, 'edit'])->name('tarea.edit');
Route::put('/tarea/{id}', [TareaController::class, 'update'])->name('tarea.update');
Route::delete('tarea/{id}', [TareaController::class, 'destroy'])->name('tarea.destroy');

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/cuotas', [CuotaController::class, 'index'])->name('cuota.index');
Route::get('/cuota/create', [CuotaController::class, 'generarCuotas'])->name('cuota.generarCuotas');
Route::get('/cuota/{id}/edit', [CuotaController::class, 'edit'])->name('cuota.edit');
Route::put('/cuota/{id}', [CuotaController::class, 'update'])->name('cuota.update');
Route::delete('/cuota/{id}', [CuotaController::class, 'destroy'])->name('cuota.destroy');



Route::get('/clientes', [ClienteController::class, 'index'])->name('cliente.index');
Route::get('/cliente/create', [ClienteController::class, 'create'])->name('cliente.create');
Route::post('/cliente/store', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit'])->name('cliente.edit');
Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('cliente.update');
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('cliente.destroy');


});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
