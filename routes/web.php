<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogoController; 
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\LayoutController; 
use App\Http\Controllers\PruebasController; 
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\KardexController;
use App\Http\Controllers\ProductosController;

//estas rutas no tienen ninguna funcion, solo estan para las pruebas
//por eso no tienen ninguna funcion definida
Route::get('/', function () {
    return view('welcome');
});
Route::get('/hola', function () {
    return view('pruebas/pruebas');
});
Route::get('/pruebas/pruebaregistro', function () {
    return view('pruebaregistro');
});
Route::get('/pruebas/formulario', [CatalogoController::class, 'indexsofi'])->name('catalogo.indexsofi');
Route::get('/pruebas/tabla', function () {
    return view('tabla');
});
Route::get('/stock/welcome', function () {
    return view('welcome');
});
Route::get('/stock/inicio', function () {
    return view('inicio');
});
//bueno, tienes que empezar a ponerle comentarios a tu codigo...
//las rutas que estan agrepadas pertenecen a las rutas protegidas con el middleware
//o sea que solo podras acceder a ellas si iniciaste sesion con anterioridad
//https://laravel.com/docs/11.x/middleware#excluding-middleware
Route::middleware('auth')->group(function () {
    //catalogo
    Route::get('/inicio', [LayoutController::class, 'index'])->name('inicio');
    Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');
    Route::post('/catalogo', [CatalogoController::class, 'store'])->name('catalogo.store');

    //productos
    Route::delete('/productos/{id}', [CatalogoController::class, 'dba_delete'])->name('catalogo.delete');
    Route::get('/productos', [CatalogoController::class, 'productos'])->name('productos');
    Route::get('/productos/{id}/editar', [CatalogoController::class, 'editar'])->name('catalogo.editar');
    Route::put('/productos/{id}', [CatalogoController::class, 'update'])->name('catalogo.update'); 

    Route::get('/productos/detalles/{id}', [ProductosController::class, 'mostrarDetalles'])->name('productos.detalles');

    //modales
    Route::post('/entidades/{entidad}/agregar', [ModalController::class, 'storeGeneric'])->name('entidades.agregar');
    Route::put('/entidades/{entidad}/editar', [ModalController::class, 'updateGeneric'])->name('entidades.editar');

    //rutas del kardex
    Route::get('/kardex', [KardexController::class, 'index'])->name('kardex');
    Route::get('/kardex/movimientos', [KardexController::class, 'show_all'])->name('kardex.all');
    Route::get('/kardex/movimientos/{id}', [KardexController::class, 'detalles'])->name('kardex.detalles');
    Route::get('/kardex/movimientos/producto/{producto_id}', [KardexController::class, 'producto'])->name('kardex.producto');
    Route::get('/kardex/nuevo', [KardexController::class, 'create'])->name('kardex.create');
    Route::post('/kardex/nuevo', [KardexController::class, 'store'])->name('kardex.store');

    //pruebas
    Route::get('/pruebas', [PruebasController::class, 'index'])->name('pruebas');

    Route::get('/stock', [ProductosController::class, 'mostrarStock'])->name('stock.index');
});

//las rutas que no estan agrupadas estan disponibles para todos los usuarios
Route::get('/login', [AuthController::class, 'index'])->name('login.view'); //esta es la ruta de la vista del login
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

//ruta para cerrar sesion
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//rutas para el registro de usuarios
Route::get('/registro', [AuthController::class, 'registro'])->name('register.view');
Route::post('/registro', [AuthController::class, 'register'])->name('register.store');