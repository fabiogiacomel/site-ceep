<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use phpDocumentor\Reflection\Types\Nullable;

class CreateBibliotecasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibliotecas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('curso');
            $table->integer('serie')->nullable();
            $table->string('turma')->nullable();
            $table->string('titulo');
            $table->string('arquivo');
            $table->integer('user_id');
            $table->string('situacao')->default('1'); //1-Ativo 2-Inativo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bibliotecas');
    }
}
