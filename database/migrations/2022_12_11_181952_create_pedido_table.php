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
        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            $table->date('pedido_data');

            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuario')->onDelete('cascade');
            
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('pedido_status')->onDelete('cascade');
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
