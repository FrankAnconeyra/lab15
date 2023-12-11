<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/fotos', [App\Http\Controllers\FotoController::class, 'index'])->name('fotos');
Route::post('/subirFoto', [App\Http\Controllers\FotoController::class, 'subirFoto'])->name('subirFoto');
Route::get('/foto/{ruta}', [App\Http\Controllers\FotoController::class, 'mostrarFoto']);
Route::post('/eliminarFoto', [App\Http\Controllers\FotoController::class, 'eliminarFoto'])->name('eliminarFoto');
Route::post('/subirComentario', [App\Http\Controllers\FotoController::class, 'subirComentario'])->name('subirComentario');
Route::post('/eliminarComentario', [App\Http\Controllers\FotoController::class, 'eliminarComentario'])->name('eliminarComentario');
Route::post('/comentario/{id}/like', [LikeController::class, 'likeComentario'])->name('comentario.like');
Route::get('/enviarApi', [App\Http\Controllers\FotoController::class, 'enviarApi'])->name('enviarApi');




// routes/web.php

Route::get('/about', function () {
    return view('static.about');
});


use App\Http\Controllers\AboutController;

Route::get('/about', [AboutController::class, 'about'])->name('about');

// routes/web.php

use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'index'])->name('contact');



