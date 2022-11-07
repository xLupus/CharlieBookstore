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
        /*
        $produtos = Produto::where('PRODUTO_ATIVO', TRUE)
                            ->whereRelation('produtoCategoria', 'CATEGORIA_ATIVO', TRUE)
                            ->paginate(10);
        */

        $produtos = $categoria->produtos->count() != 0 ? $categoria->produtos : Produto::ativo();

        foreach($produtos as $produto)
            $valores[] = $produto->PRODUTO_PRECO - $produto->PRODUTO_DESCONTO;

        $minPreco = min($valores);
        $maxPreco = max($valores);

        $order_az = $order_za = $order_menor_preco = $order_maior_preco = false;

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
        $pesquisa = $request->search;
        $pesquisa = str_replace(['_', '%'], '', $pesquisa);

        if(!$pesquisa) return redirect()->route('catalogo');

        $campos   = explode(' ', $pesquisa);
        $campos   = implode('%', $campos);

        $produtos = Produto::where('PRODUTO_ATIVO', TRUE)
                                    ->where('PRODUTO_NOME', 'like', "%{$campos}%")
                                    ->orderBy('PRODUTO_NOME', 'ASC')
                                    ->paginate(10);

        $produtos->withPath("pesquisa?search={$request->search}");

        $resultados = $produtos->total();

        return view('produtos.search', compact(['produtos', 'resultados', 'pesquisa']));
    }

    public function filter(Request $request) {
        $resultado = Produto::whereBetween('PRODUTO_PRECO', [$request->precoMin, $request->precoMax])->get();
        dd($resultado);
        /*
        return view('produtos.index')->with(
            'url', "preco?price={$request->precoMin}&{$request->precoMax}",
            ['resultado' => $resultado]
        );
        */
    }
}
