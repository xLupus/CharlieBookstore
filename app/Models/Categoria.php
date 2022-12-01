<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'CATEGORIA';

    protected $primaryKey = 'CATEGORIA_ID';

    public $timestamps = false;

    public function produtos() {
        return $this->hasMany(Produto::class, 'CATEGORIA_ID')
                            ->where('PRODUTO_ATIVO', TRUE)
                            ->whereRelation('produtoEstoque', 'PRODUTO_QTD', '>', 0);
    }

    public static function ativo() {
        $return = [];

        foreach (Categoria::where('CATEGORIA_ATIVO', TRUE)->whereRelation('produtos', 'PRODUTO_ATIVO', TRUE)->get() as $categoria) {
            array_push($return, [
                'nome' => $categoria->CATEGORIA_NOME,
                'quantidade' => $categoria->produtos()->count(),
                'id' => $categoria->CATEGORIA_ID
            ]);
        }

        uasort ($return , function ($a, $b) {
            return $a['quantidade'] < $b['quantidade'];
        });

        return $return;
    }
}
