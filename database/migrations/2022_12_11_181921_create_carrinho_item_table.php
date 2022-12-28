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
        Schema::create('CARRINHO_ITEM', function (Blueprint $table) {
            $table->integer('ITEM_QTD');

            $table->integer('USUARIO_ID')->unsigned();
            $table->foreign('USUARIO_ID')->references('id')->on('USUARIO')->onDelete('cascade');

            $table->integer('PRODUTO_ID')->unsigned();
            $table->foreign('PRODUTO_ID')->references('id')->on('PRODUTO')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrinho_item');
    }
};
