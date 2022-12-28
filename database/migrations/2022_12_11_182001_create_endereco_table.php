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
        Schema::create('ENDERECO', function (Blueprint $table) {
            $table->id();
            $table->string('ENDERECO_NOME', 30);
            $table->string('ENDERECO_LOGRADOURO', 500);
            $table->string('ENDERECO_NUMERO', 10);
            $table->string('ENDERECO_COMPLEMENTO', 100)->nullable();
            $table->char('ENDERECO_CEP', 8);
            $table->string('ENDERECO_CIDADE', 100);

            $table->integer('USUARIO_ID')->unsigned();
            $table->foreign('USUARIO_ID')->references('id')->on('USUARIO')->onDelete('cascade');
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
