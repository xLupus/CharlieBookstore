<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoController;
//use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/catalogo', [ProdutoController::class, 'index'])->name('catalogo');
Route::get('/categoria/{categoria}', [ProdutoController::class, 'index'])->name('categoria.show');
Route::resource('/produto', ProdutoController::class);
Route::get('/pesquisa', [ProdutoController::class, 'search'])->name('search');

Route::group(['middleware' => 'preventBackHistory'],function() { //evita que o usuário volte para as páginas (de usuário logado) quando fazer o logout
    Route::group( ['middleware' => ['auth'] ], function() {
        Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
        Route::post('/carrinho/{id}', [CarrinhoController::class, 'store'])->name('carrinho.store');
        Route::get('/checkout', [PedidoController::class, 'create'])->name('checkout');
        Route::post('/checkout',[PedidoController::class, 'store'])->name('realizar-pedido');

        Route::post('/endereco', [EnderecoController::class, 'store'])->name('endereco.store');

        Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos');
        Route::get('/pedido/{id}', [PedidoController::class, 'show'])->name('pedido');
    });
});

require __DIR__.'/auth.php';
