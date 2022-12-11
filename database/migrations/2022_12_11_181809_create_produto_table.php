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
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('produto_nome', 100);
            $table->string('produto_desc', 8000);
            $table->decimal('produto_preco', $precision = 5, $scale = 2);
            $table->decimal('produto_desconto', $precision = 5, $scale = 2);
            $table->boolean('produto_ativo');

            $table->bigInteger('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categoria')->onDelete('cascade');
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
