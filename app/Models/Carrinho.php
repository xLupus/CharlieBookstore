<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Carrinho extends Model
{
    use HasFactory;

    protected $table = 'CARRINHO_ITEM';

    public $timestamps = false;

    protected $fillable = [
        'USUARIO_ID',
        'PRODUTO_ID',
        'ITEM_QTD',
    ];

    protected function setKeysForSaveQuery($query) //seleciona as foreign keys
    {
        $query->where('USUARIO_ID', '=', $this->getAttribute('USUARIO_ID'))
            ->where('PRODUTO_ID', '=', $this->getAttribute('PRODUTO_ID'));

        return $query;
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'PRODUTO_ID')->where('PRODUTO_ATIVO', TRUE);
    }

    public static function qtdCarrinho($id)
    {
        return count(Carrinho::where('USUARIO_ID', $id)->where('ITEM_QTD', '>', 0)->get());
    }
}
