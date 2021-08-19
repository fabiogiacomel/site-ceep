<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConselhoRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conselho_registros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('aluno');
            $table->bigInteger('conselho_informacao_id')->unsigned();
            $table->foreign('conselho_informacao_id')->references('id')->on('conselho_informacaos')->onDelete('cascade');
            $table->bigInteger('conselho_disciplina_id')->unsigned();
            $table->foreign('conselho_disciplina_id')->references('id')->on('conselho_disciplinas')->onDelete('cascade');
            $table->text('observacao')->nullable();
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
        Schema::dropIfExists('conselho_registros');
    }
}
