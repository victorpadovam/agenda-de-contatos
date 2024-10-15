<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContatosController;
use App\Http\Controllers\UsuariosController;

use Illuminate\Support\Facades\Route;

//Rotas De Contato
Route::get('/contatos', [ContatosController::class, 'index'])->name('contatos.index');
//Rotas De Contato - Delete
Route::delete('/contatos/{contatoID}', [ContatosController::class, 'delete'])->name('contatos.delete');
//Rotas De Contato - Create
Route::get('/contatos/create', [ContatosController::class, 'create'])->name('contatos.create.get');
Route::post('/contatos/create', [ContatosController::class, 'create'])->name('contatos.create.post');
//Rotas De Contato - Update
Route::get('/contatos/update/{contatoID}', [ContatosController::class, 'update'])->name('contatos.update.get');
Route::put('/contatos/update/{contatoID}', [ContatosController::class, 'update'])->name('contatos.update.put');


//Rotas De Usuarios
Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
//Rotas De Contato - Delete
Route::delete('/usuarios/{userID}', [UsuariosController::class, 'delete'])->name('usuarios.delete');
//Rotas De Contato - Create
Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create.get');
Route::post('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create.post');
//Rotas De Contato - Update
Route::get('/usuarios/update/{userID}', [UsuariosController::class, 'update'])->name('usuarios.update.get');
Route::put('/usuarios/update/{userID}', [UsuariosController::class, 'update'])->name('usuarios.update.put');



Route::get('/', function () {
    return view('welcome');
});

// Route::get('/index', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
