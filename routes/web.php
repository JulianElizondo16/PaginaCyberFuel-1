<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComentariosController;
use App\Models\Comentario;

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



//ACA ESTAMOS LLAMANDO A TODOS LOS CONTROLADORES DE COMENTARIOS CONTROLLER

Route::controller(ComentariosController::class)->group(function(){

Route::get('Comentarios', 'index')->name('comentarios.home');

Route::post('Comentarios', 'GenerarComentario')->name('comentarios.generar');


});











Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
