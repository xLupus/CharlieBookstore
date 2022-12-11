<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'PRODUTO';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function produtoImagens() {
        return $this->hasMany(ProdutoImagem::class, 'id')->orderBy('IMAGEM_ORDEM', 'ASC');
    }

    public function produtoCategoria() {
        return $this->belongsTo(Categoria::class, 'id');
    }

    public function produtoEstoque() {
        return $this->belongsTo(ProdutoEstoque::class, 'id');
    }

    public static function ativo() {
        return Produto::where('PRODUTO_ATIVO', TRUE)
            ->whereRelation('produtoCategoria', 'CATEGORIA_ATIVO', TRUE)
            ->get();
    }
}
