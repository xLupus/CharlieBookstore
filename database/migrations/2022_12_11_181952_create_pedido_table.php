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
        Schema::create('PEDIDO', function (Blueprint $table) {
            $table->id();
            $table->date('PEDIDO_DATA');

            $table->integer('USUARIO_ID')->unsigned();
            $table->foreign('USUARIO_ID')->references('id')->on('USUARIO')->onDelete('cascade');

            $table->integer('STATUS_ID')->unsigned();
            $table->foreign('STATUS_ID')->references('id')->on('PEDIDO_STATUS')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido');
    }
};
