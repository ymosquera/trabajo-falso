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
    ->middleware('auth')
    ->name('register.store');
Route::get('/editar/{id}',[TblUsuarioController::class, 'edit'])
->middleware('auth')
    ->name('register.edit');
Route::put('/editar/{id}',[TblUsuarioController::class, 'update'])
    ->name('register.update');
//-----------------------------------------------------------//
Route::resource('catalogo', TblCatalogoController::class)->middleware('auth');
//-----------------------------------------------------------//
Route::get('/comparar', [CartController::class, 'comparar'])
->middleware('auth')
    ->name('comparar');
//-----------------------------------------------------------//
Route::get('/productos', [CartController::class, 'shop'])
->middleware('auth')    
    ->name('shop');
Route::get('/carrito', [CartController::class, 'cart'])
->middleware('auth')
    ->name('cart.index');
Route::post('/add', [CartController::class, 'store'])
    ->middleware('auth')
    ->name('cart.store');
Route::post('/update', [CartController::class, 'update'])
    ->middleware('auth')
    ->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])
    ->middleware('auth')
    ->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])
    ->middleware('auth')
    ->name('cart.clear');
//-----------------------------------------------------------//
Route::get('tiendas', [TiendaController::class, 'index'])
    ->middleware('auth')
    ->name('tiendas.index');
Route::get('tienda/{id}', [ProductoController::class, 'index'])
    ->name('tienda.index');
//-----------------------------------------------------------//
Route::get('comparacion/{id}/{id2}', [ComparacionController::class, 'index'])
->middleware('auth')
    ->name('comparacion.index');
//-----------------------------------------------------------//
Route::get('/contacto', [ContactoController::class, 'index'])
->middleware('auth')
    ->name('contacto.index');
//-----------------------------------------------------------//
Route::post('factura/',[TblFacturaController::class, 'store'] )
->middleware('auth')
    ->name('factura.save');
Route::get('factura/pdf',[TblFacturaController::class, 'pdf'] )
->middleware('auth')
    ->name('factura.pdf');
//-----------------------------------------------------------//
Route::get('estado/producto/{id}',[TblCatalogoController::class, 'cambiarestado'])
->middleware('auth')
    ->name('change.status');
//-----------------------------------------------------------//
Route::get('grafica/producto/{id}',[CartController::class, 'grafica'])
->middleware('auth')
    ->name('grafica.producto');
//-----------------------------------------------------------//
Route::get('/logout',[SessionsController::class, 'destroy'])
->middleware('auth')
   
    ->name('login.destroy');
//----------------------------------------------------------//