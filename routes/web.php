<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogoController;

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
    return view('auth.login');
});
 
/*para mostrar las rutas  de sitio usamos "php artisan route:list 
en este caso se muestran todas las rutas de catalogoController
*/

Route::resource('catalogo',CatalogoController::class)->middleware('auth');
//se elimina el registro y la contraseña 
Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [CatalogoController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [CatalogoController::class, 'index'])->name('home');
});