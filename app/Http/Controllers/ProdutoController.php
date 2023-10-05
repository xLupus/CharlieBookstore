<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     * TODO - Consertar o problema do filtro
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Categoria $categoria)
    {
        $itemsPerPage = 16;

        $order_az = $order_za = $order_menor_preco = $order_maior_preco = false;

        $produtos = $categoria->produtos->count() != 0 
            ? $categoria->produtos()

            : Produto::where('PRODUTO_ATIVO', TRUE)
                    ->whereRelation('produtoCategoria', 'CATEGORIA_ATIVO', TRUE);

        if ($request->order == 'a-z') {
            $produtos = $produtos->orderBy('PRODUTO_NOME', "asc");
            $order_az = true;
            
        } elseif ($request->order == 'z-a') {
            $produtos = $produtos->orderBy('PRODUTO_NOME', "desc");
            $order_za = true;

        } elseif ($request->order == 'menores-precos') {
            $produtos = $produtos->orderByRaw("PRODUTO.PRODUTO_PRECO - PRODUTO.PRODUTO_DESCONTO asc");
            $order_menor_preco = true;

        } elseif ($request->order == 'maiores-precos') {
            $produtos = $produtos->orderByRaw("PRODUTO.PRODUTO_PRECO - PRODUTO.PRODUTO_DESCONTO desc");
            $order_maior_preco = true;
        }

        $produtos = $produtos->paginate($itemsPerPage)->withQueryString();

        return view('produtos.index')->with([
            'produtos'          => $produtos,
            "order_az"          => $order_az,
            "order_za"          => $order_za,
            "order_menor_preco" => $order_menor_preco,
            "order_maior_preco" => $order_maior_preco
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

    /**
     * 
     */
    public function search(Request $request)
    {
        $pesquisa = str_replace(['%', '_'], '', $request->search);

        if (!$pesquisa) 
            return redirect()->route('catalogo');

        $campos   = explode(' ', $pesquisa);
        $campos   = implode('%', $campos);

        $produtos = Produto::where('PRODUTO_ATIVO', TRUE)
            ->where('PRODUTO_NOME', 'like', "%{$campos}%")
            ->whereRelation('produtoEstoque', 'PRODUTO_QTD', '>', 0)
            ->whereRelation('produtoCategoria', 'CATEGORIA_ATIVO', TRUE)
            ->orderBy('PRODUTO_NOME', 'ASC')
            ->paginate(10);

        $produtos->withPath("pesquisa?search={$request->search}");

        $resultados = $produtos->total();

        return view('produtos.search', compact(['produtos', 'resultados', 'pesquisa']));
    }
}
