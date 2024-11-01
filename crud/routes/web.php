<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
Route::post('/produtos', [LProdutoontroller::class, 'store'])->name('produtos.store');
Route::get('/produtos/{Produto}', [ProdutoController::class, 'show'])->name('produtos.show');
Route::get('/produtos/{Produto/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
Route::put('/produtos/{Produto}', [ProdutoController::class, 'update'])->name('produtos.update');
Route::delete('/produtos/{Produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');


Route::get('/', function () {
    return view('index');
});
Route::get('/funcionarios', function () {
    return view('funcionarios');
})->middleware(['auth', 'verified'])->name('funcionarios');;

Route::get('/produtos', function () {
    return view('produtos');
})->middleware(['auth', 'verified'])->name('produtos');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
