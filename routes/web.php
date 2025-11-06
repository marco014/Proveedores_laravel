<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('proveedores.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Rutas del recurso Proveedor
    /*
    Se especifica que el parámetro de la ruta debe ser '{proveedor}' (singular).
    Esto soluciona un problema de Route-Model Binding, asegurando que Laravel
    inyecte correctamente el modelo Proveedor en el controlador.
    */
    Route::resource('proveedores', ProveedorController::class)->parameters(['proveedores' => 'proveedor']);
});


require __DIR__.'/auth.php';
