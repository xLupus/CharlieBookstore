<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PedidoItem;
use App\Models\PedidoStatus;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'PEDIDO';

    protected $primaryKey = 'PEDIDO_ID';

    public $timestamps = false;

}
