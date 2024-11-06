<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\RemedioController;
use Illuminate\Support\Facades\Route;
/* Produtos */
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos');
Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
Route::get('/produtos/{produto}', [ProdutoController::class, 'show'])->name('produtos.show');
Route::get('/produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');
Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');

/* Remédios Controlados */
Route::get('/remedios', [RemedioController::class, 'index'])->name('remedios');
Route::get('/remedios/create', [RemedioController::class, 'create'])->name('remedios.create');
Route::post('/remedios', [RemedioController::class, 'store'])->name('remedios.store');
Route::get('/remedios/{remedio}', [RemedioController::class, 'show'])->name('remedios.show');
Route::get('/remedios/{remedio}/edit', [RemedioController::class, 'edit'])->name('remedios.edit');
Route::put('/remedios/{remedio}', [RemedioController::class, 'update'])->name('remediosupdate');
Route::delete('/remedios/{remedio}', [RemedioController::class, 'destroy'])->name('remedios.destroy');


Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
