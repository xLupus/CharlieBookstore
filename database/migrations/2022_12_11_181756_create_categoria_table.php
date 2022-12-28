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
        Schema::create('CATEGORIA', function (Blueprint $table) {
            $table->id();
            $table->string('CATEGORIA_NOME', 100);
            $table->string('CATEGORIA_DESC', 8000);
            $table->boolean('CATEGORIA_ATIVO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria');
    }
};
