<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanejamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planejamento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('curso');
            $table->integer('serie');
            $table->string('turma');
            $table->string('disciplina');
            $table->string('arquivo');
            $table->integer('user_id');
            $table->string('situacao')->default('1');
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
        Schema::dropIfExists('planejamentos');
    }
}
