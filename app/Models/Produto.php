<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'PRODUTO';

    protected $primaryKey = 'PRODUTO_ID';

    public $timestamps = false;

    public function imagens() {
        return $this->hasMany(ProdutoImagem::class, 'PRODUTO_ID')->orderBy('IMAGEM_ORDEM', 'ASC');
    }

    public function categoria() {
        return $this->belongsTo(Categoria::class, 'PRODUTO_ID');
    }

    public function estoque() {
        return $this->belongsTo(ProdutoEstoque::class, 'PRODUTO_ID');
    }

    public static function ativo() {
        return Produto::where('PRODUTO_ATIVO', TRUE)
                            ->whereRelation('categoria', 'CATEGORIA_ATIVO', TRUE)
                            ->get();
    }
}
