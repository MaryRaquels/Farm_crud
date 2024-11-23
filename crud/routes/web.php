<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\RemedioController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/* Produtos */
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos');
    Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
    Route::get('/produtos/{produto}', [ProdutoController::class, 'show'])->name('produtos.show');
    Route::get('/produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');
    Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
});

/* Remédios Controlados */
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/remedios', [RemedioController::class, 'index'])->name('remedios');
    Route::get('/remedios/create', [RemedioController::class, 'create'])->name('remedios.create');
    Route::post('/remedios', [RemedioController::class, 'store'])->name('remedios.store');
    Route::get('/remedios/{remedio}', [RemedioController::class, 'show'])->name('remedios.show');
    Route::get('/remedios/{remedio}/edit', [RemedioController::class, 'edit'])->name('remedios.edit');
    Route::put('/remedios/{remedio}', [RemedioController::class, 'update'])->name('remedios.update');
    Route::delete('/remedios/{remedio}', [RemedioController::class, 'destroy'])->name('remedios.destroy');
});

/* Fornecedores */
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/fornecedors', [FornecedorController::class, 'index'])->name('fornecedors');
    Route::get('/fornecedors/create', [FornecedorController::class, 'create'])->name('fornecedors.create');
    Route::post('/fornecedors', [FornecedorController::class, 'store'])->name('fornecedors.store');
    Route::get('/fornecedors/{fornecedor}', [FornecedorController::class, 'show'])->name('fornecedors.show');
    Route::get('/fornecedors/{fornecedor}/edit', [FornecedorController::class, 'edit'])->name('fornecedors.edit');
    Route::put('/fornecedors/{fornecedor}', [FornecedorController::class, 'update'])->name('fornecedors.update');
    Route::delete('/fornecedors/{fornecedor}', [FornecedorController::class, 'destroy'])->name('fornecedors.destroy');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
