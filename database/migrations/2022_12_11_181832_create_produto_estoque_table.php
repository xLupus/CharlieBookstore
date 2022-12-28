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
        Schema::create('PRODUTO_ESTOQUE', function (Blueprint $table) {
            $table->integer('PRODUTO_QTD');

            $table->bigInteger('PRODUTO_ID')->unsigned();
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
        Schema::dropIfExists('produto_estoque');
    }
};
