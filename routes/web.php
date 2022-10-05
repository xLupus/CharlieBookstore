<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;

Route::get('/', [ProdutoController::class, 'index'])->name('home');
Route::resource('/produto', ProdutoController::class);
Route::get('/categoria/{categoria}', [CategoriaController::class, 'show']);
