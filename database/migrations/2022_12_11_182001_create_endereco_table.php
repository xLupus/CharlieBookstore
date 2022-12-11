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
        Schema::create('endereco', function (Blueprint $table) {
            $table->id();
            $table->string('endereco_nome', 30);
            $table->string('endereco_logradouro', 500);
            $table->string('endereco_numero', 10);
            $table->string('endereco_complemento', 100)->nullable();
            $table->char('endereco_cep', 8);
            $table->string('endereco_cidade', 100);
            $table->char('endereco_nome', 2);

            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('endereco');
    }
};
