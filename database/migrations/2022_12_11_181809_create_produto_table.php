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
        Schema::create('PRODUTO', function (Blueprint $table) {
            $table->id();
            $table->string('PRODUTO_NOME', 100);
            $table->string('PRODUTO_DESC', 8000);
            $table->decimal('PRODUTO_PRECO', $precision = 5, $scale = 2);
            $table->decimal('PRODUTO_DESCONTO', $precision = 5, $scale = 2);
            $table->boolean('PRODUTO_ATIVO');

            $table->bigInteger('CATEGORIA_ID')->unsigned();
            $table->foreign('CATEGORIA_ID')->references('id')->on('CATEGORIA')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto');
    }
};
