<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $products = Produto::where('PRODUTO_ATIVO', TRUE)
            ->whereRelation('produtoCategoria', 'CATEGORIA_ATIVO', TRUE)
            ->whereRelation('produtoEstoque', 'PRODUTO_QTD', '>', 0)
            ->get();

        $categories = Categoria::where('CATEGORIA_ATIVO', TRUE)
            ->whereRelation('produtos', 'PRODUTO_ATIVO', TRUE)
            ->orderBy('CATEGORIA_NOME', 'ASC')
            ->get();


        return view('index')->with([
            'categorias' => $categories,
            'produtos'   => $products
        ]);
    }
}
