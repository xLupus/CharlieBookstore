<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class PedidoItem extends Model
{
    use HasFactory;

    protected $table = 'PEDIDO_ITEM';

    public $timestamps = false;

    public function pedidoItens() {
        return $this->belongsTo(PRODUTO::class, 'PRODUTO_ID');
    }
}
