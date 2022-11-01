<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [ProdutoController::class, 'home'])->name('home');
Route::resource('/produto', ProdutoController::class);
Route::get('/categoria/{categoria}', [ProdutoController::class, 'categoria'])->name('categoria.show');
Route::get('/catalogo', [ProdutoController::class, 'index'])->name('catalogo');
Route::get('/pesquisa', [ProdutoController::class, 'search'])->name('search');


Route::group( ['middleware' => ['auth'] ], function(){
    Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
    Route::post('/carrinho/{id}', [CarrinhoController::class, 'store'])->name('carrinho.store');
    Route::get('/pagamento', [PedidoController::class, 'pagamento'])->name('pagamento');
    Route::post('/endereco', [EnderecoController::class, 'store'])->name('endereco.store');
    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos');
    Route::get('/pedido/{id}', [PedidoController::class, 'show'])->name('pedido');
    Route::get('/confirmer', [PedidoController::class, 'create'])->name('confirmer');
});

require __DIR__.'/auth.php';
