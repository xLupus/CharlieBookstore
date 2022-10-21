<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutoController;
//use App\Http\Controllers\CategoriaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::get('/', [ProdutoController::class, 'home'])->name('home');
Route::resource('/produto', ProdutoController::class);
Route::get('/categoria/{categoria}', [ProdutoController::class, 'categoria'])->name('categoria.show');
Route::get('/catalogo', [ProdutoController::class, 'index'])->name('catalogo');

require __DIR__.'/auth.php';

