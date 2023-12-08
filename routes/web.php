<?php

use App\Http\Controllers\CatalogoAutomovilesController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\NavegacionController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ReservacionController;
use Illuminate\Support\Facades\Route;
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

// Layout
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Ruta para ir al sitio web
Route::get('/ir-sitio-web', function () {
    return view('welcome');
})->name('ir-sitio-web');
// Ruta para obtener categorías y marcas
Route::get('/', [NavegacionController::class, 'obtenerCategoriasMarcasYAutos'])->name('inicio');
// Ruta para mostrar autos
Route::get('/detalle-auto/{id}', [NavegacionController::class, 'mostrarDetalleAuto'])->name('detalle-auto');
Route::get('/reservar/{id}', [ReservacionController::class, 'reservar'])->name('reservar');
Route::middleware(['auth'])->group(function () {


// Rutas para el catálogo de automóviles
Route::get('/catalogo-automoviles', [CatalogoAutomovilesController::class, 'index']);
Route::get('/catalogo-automoviles/create', [CatalogoAutomovilesController::class, 'create'])->name('crear-automovil');
Route::post('/catalogo-automoviles', [CatalogoAutomovilesController::class, 'store'])->name('guardar-automovil');
Route::get('/catalogo-automoviles/{id}/edit', [CatalogoAutomovilesController::class, 'edit'])->name('autos.edit');
Route::put('/catalogo-automoviles/{id}', [CatalogoAutomovilesController::class, 'update'])->name('actualizar-automovil');
Route::delete('/catalogo-automoviles/{id}', [CatalogoAutomovilesController::class, 'destroy'])->name('eliminar-automovil');
Route::get('/catalogo-automoviles/{id}/detalles', [CatalogoAutomovilesController::class, 'detalles'])->name('detalles-automovil');
// routes/web.php
Route::get('generate-pdf', [PDFController::class, 'index'])->name('generate-pdf');

});
// Rutas para las marcas
Route::middleware(['auth'])->group(function () {
Route::get('/buscar', 'MarcaController@buscar')->name('buscar-marca');
Route::get('/lista-marcas', [MarcaController::class, 'index'])->name('lista-marcas');
Route::get('/lista-marcas/crear', [MarcaController::class, 'create'])->name('crear-marca');
Route::post('/guardar-marca', [MarcaController::class, 'store'])->name('guardar-marca');
Route::get('/editar-marca/{id}', [MarcaController::class, 'edit'])->name('editar-marca');
Route::put('/actualizar-marca/{id}', [MarcaController::class, 'update'])->name('actualizar-marca');
Route::delete('/eliminar-marca/{id}', [MarcaController::class, 'destroy'])->name('eliminar-marca');
});
// Rutas para las categorías
Route::middleware(['auth'])->group(function () {
Route::get('/lista-categorias', [CategoriaController::class, 'index'])->name('lista-categorias');
Route::get('/lista-categorias/crear', [CategoriaController::class, 'create'])->name('crear-categoria');
Route::post('/guardar-categoria', [CategoriaController::class, 'store'])->name('guardar-categoria');
Route::get('/editar-categoria/{id}', [CategoriaController::class, 'edit'])->name('editar-categoria');
Route::put('/actualizar-categoria/{id}', [CategoriaController::class, 'update'])->name('actualizar-categoria');
Route::delete('/eliminar-categoria/{id}', [CategoriaController::class, 'destroy'])->name('eliminar-categoria');
});

// Rutas para las reservas
Route::middleware(['auth'])->group(function () {
Route::get('/lista-reservas', [ReservaController::class, 'index'])->name('reservas.index');
Route::get('/reservas/crear', [ReservaController::class, 'create'])->name('reservas.create');
Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
Route::get('/reservas/{id}', [ReservaController::class, 'show'])->name('reservas.show');
Route::get('/reservas/editar/{id}', [ReservaController::class, 'edit'])->name('reservas.edit');
Route::put('/reservas/{id}', [ReservaController::class, 'update'])->name('reservas.update');
Route::delete('/reservas/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
});
