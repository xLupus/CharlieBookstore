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
        Schema::create('ADMINISTRADOR', function (Blueprint $table) {
            $table->id();
            $table->string('ADM_NOME', 100);
            $table->string('ADM_EMAIL', 100)->unique();;
            $table->string('ADM_SENHA', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrador');
    }
};
