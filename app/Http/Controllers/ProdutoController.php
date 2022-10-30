<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    /**
     * Return the Main Page of the application
     * @return void
     */
    public function home()
    {
        return view('index')->with([
            'categorias' => Categoria::where('CATEGORIA_ATIVO', TRUE)
                                       ->whereRelation('produtos', 'PRODUTO_ATIVO', TRUE)
                                       ->orderBy('CATEGORIA_NOME', 'ASC')
                                       ->get(),
            'produtos' => Produto::all()->take(10),
        ]); //Index (recebe categorias)
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::ativo();

        if ($request->order) {
            if ($request->order == 'a-z')
                $produtos = Produto::ativo()->sortby(function($produto) {
                    return $produto->PRODUTO_NOME;
                });

            if ($request->order == 'z-a')
                $produtos = Produto::ativo()->sortbyDesc(function($produto) {
                    return $produto->PRODUTO_NOME;
                });

            if ($request->order == 'menores-precos')
                $produtos = Produto::ativo()->sortby(function($produto) {
                    return $produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO;
                });

            if ($request->order == 'maiores-precos')
                $produtos = Produto::ativo()->sortbyDesc(function($produto) {
                    return $produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO;
                });
        }

        return view('produtos.index', compact('produtos'));
    }


    /**
     * Return the page of Books from a specific category
     * @param  Categoria $categoria  [description]
     * @return [type] [description]
     */
    public function categoria(Categoria $categoria){
        return view('produtos.index')->with([
            'produtos' => $categoria->produtos,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);

        if (!$produto) return redirect()->route('catalogo');

        return view('produtos.show', compact('produto'));
    }


    public function search(Request $request)
    {
        $pesquisa = $request->search;

        if(!$pesquisa) return redirect()->route('catalogo');

        $campos   = explode(' ', $pesquisa);
        $campos   = implode('%', $campos);

        $produtos = Produto::where('PRODUTO_ATIVO', TRUE)
                                ->where('PRODUTO_NOME', 'like', "%{$campos}%")
                                ->orderBy('PRODUTO_NOME', 'ASC')
                                ->get();

        $resultados = $produtos->count();

        return view( 'produtos.search', compact(['produtos', 'resultados', 'pesquisa']) );
    }
}
