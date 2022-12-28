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
        Schema::create('PEDIDO_ITEM', function (Blueprint $table) {
            $table->integer('ITEM_QTD');
            $table->decimal('ITEM_PRECO', $precision = 5, $scale = 2);

            $table->integer('PRODUTO_ID')->unsigned();
            $table->foreign('PRODUTO_ID')->references('id')->on('PRODUTO')->onDelete('cascade');

            $table->integer('PEDIDO_ID')->unsigned();
            $table->foreign('PEDIDO_ID')->references('id')->on('PEDIDO')->onDelete('cascade');
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
