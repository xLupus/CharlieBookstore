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
    public function index(Request $request, Categoria $categoria)
    {
        $order_az = $order_za = $order_menor_preco = $order_maior_preco = false;

        $produtos = $categoria->produtos->count() != 0 ? $categoria->produtos : Produto::ativo();

        $produtosAtivos = Produto::ativo();

        foreach($produtosAtivos as $produto)
            $valores[] = $produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO;

        $maxPreco = max($valores);
        $minPreco = min($valores);

        if ($request->precoMin && $request->precoMax) {
            $produtos = Produto::whereRaw("(PRODUTO_PRECO - PRODUTO_DESCONTO) BETWEEN {$request->precoMin} AND {$request->precoMax}")->get();
        }

        switch ($request->order) {
            case 'a-z':
                $produtos = $produtos->sortby(fn($produto) => $produto->PRODUTO_NOME);
                $order_az = true;
                break;

            case 'z-a':
                $produtos = $produtos->sortbyDesc(fn($produto) => $produto->PRODUTO_NOME);
                $order_za = true;
                break;

            case 'menores-precos':
                $produtos = $produtos->sortby(fn($produto) => $produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO);
                $order_menor_preco = true;
                break;

            case 'maiores-precos':
                $produtos = $produtos->sortbyDesc(fn($produto) => $produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO);
                $order_maior_preco = true;
                break;

            default:
                break;
        }

        return view('produtos.index')->with([
            'produtos'          => $produtos,
            "order_az"          => $order_az,
            "order_za"          => $order_za,
            "order_menor_preco" => $order_menor_preco,
            "order_maior_preco" => $order_maior_preco,
            "preco_max"         => $maxPreco,
            "preco_min"         => $minPreco,
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
        $pesquisa = str_replace(['%', '_'], '', $request->search);

        if(!$pesquisa) return redirect()->route('catalogo');

        $campos   = explode(' ', $pesquisa);
        $campos   = implode('%', $campos);

        $produtos = Produto::where('PRODUTO_ATIVO', TRUE)
            ->where('PRODUTO_NOME', 'like', "%{$campos}%")
            ->whereRelation('produtoEstoque', 'PRODUTO_QTD', '>', 0)
            ->orderBy('PRODUTO_NOME', 'ASC')
            ->paginate(10);

        $produtos->withPath("pesquisa?search={$request->search}");

        $resultados = $produtos->total();

        return view('produtos.search', compact(['produtos', 'resultados', 'pesquisa']));
    }
}
