<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComentariosController;

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

//Aca lo que estamos haciendo es la llamada a las rutas

//el primer 'asd' es al URL aca lo que estamos haciedno es que con el ->name('') le estamos dando un nombre a esa ruta para llamarla
Route::get('/', HomeController::class)->name('home');
Route::get('Comentarios', ComentariosController::class)->name('comentarios');











Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
