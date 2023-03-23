<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TblUsuarioController;
use App\Http\Controllers\TblCatalogoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ComparacionController;
use App\Http\Controllers\TblFacturaController;


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

Route::get('/', function(){return view('home.home');})
    ->middleware('auth')
    ->name('home.index');
//-----------------------------------------------------------//
Route::get('/login',[SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');
Route::post('/login',[SessionsController::class, 'store'])
    ->name('login.store');
//-----------------------------------------------------------//
Route::get('/register',[TblUsuarioController::class, 'create'])
    ->middleware('guest')
    ->name('register.index');
Route::post('/register',[TblUsuarioController::class, 'store'])
    ->name('register.store');
Route::get('/editar/{id}',[TblUsuarioController::class, 'edit'])
    ->name('register.edit');
Route::put('/editar/{id}',[TblUsuarioController::class, 'update'])
    ->name('register.update');
//-----------------------------------------------------------//
Route::resource('catalogo', TblCatalogoController::class);
//-----------------------------------------------------------//
Route::get('/comparar', [CartController::class, 'comparar'])
    ->name('comparar');
//-----------------------------------------------------------//
Route::get('/productos', [CartController::class, 'shop'])
    ->name('shop');
Route::get('/carrito', [CartController::class, 'cart'])
    ->name('cart.index');
Route::post('/add', [CartController::class, 'store'])
    ->name('cart.store');
Route::post('/update', [CartController::class, 'update'])
    ->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])
    ->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])
    ->name('cart.clear');
//-----------------------------------------------------------//
Route::get('tiendas', [TiendaController::class, 'index'])
    ->name('tiendas.index');
Route::get('tienda/{id}', [ProductoController::class, 'index'])
    ->name('tienda.index');
//-----------------------------------------------------------//
Route::get('comparacion/{id}/{id2}', [ComparacionController::class, 'index'])
    ->name('comparacion.index');
//-----------------------------------------------------------//
Route::get('/contacto', [ContactoController::class, 'index'])
    ->name('contacto.index');
//-----------------------------------------------------------//
Route::post('factura/',[TblFacturaController::class, 'store'] )
    ->name('factura.save');
Route::get('factura/pdf',[TblFacturaController::class, 'pdf'] )
    ->name('factura.pdf');
//-----------------------------------------------------------//
Route::get('estado/producto/{id}',[TblCatalogoController::class, 'cambiarestado'])
    ->name('change.status');
//-----------------------------------------------------------//
Route::get('grafica/producto/{id}',[CartController::class, 'grafica'])
    ->name('grafica.producto');
//-----------------------------------------------------------//
Route::get('/logout',[SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');
//----------------------------------------------------------//