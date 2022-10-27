<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CarrinhoController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [ProdutoController::class, 'home'])->name('home');
Route::resource('/produto', ProdutoController::class);
Route::get('/categoria/{categoria}', [ProdutoController::class, 'categoria'])->name('categoria.show');
Route::get('/catalogo', [ProdutoController::class, 'index'])->name('catalogo');


Route::group( ['middleware' => ['auth'] ], function(){
    Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
    Route::post('/carrinho/{id}', [CarrinhoController::class, 'store'])->name('carrinho.store');

});

require __DIR__.'/auth.php';
