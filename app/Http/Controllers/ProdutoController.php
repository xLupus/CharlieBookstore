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
    public function index()
    {
        return view('produtos.index')->with([
            'produtos' => Produto::ativo(),
        ]); //Index (recebe categorias)
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

        return view('produtos.show', compact('produto'));
    }


    public function search(Request $request)
    {
        dd($request);
    }
}
