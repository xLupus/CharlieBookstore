<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_item', function (Blueprint $table) {
            $table->integer('item_qtd');
            $table->decimal('item_preco', $precision = 5, $scale = 2);

            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produto')->onDelete('cascade');
            
            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('pedido')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_item');
    }
};
