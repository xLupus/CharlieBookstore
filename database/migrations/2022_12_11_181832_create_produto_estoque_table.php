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
        Schema::create('produto_estoque', function (Blueprint $table) {
            $table->integer('produto_qtd');

            $table->bigInteger('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_estoque');
    }
};
