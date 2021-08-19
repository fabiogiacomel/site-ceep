<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConselhoDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conselho_disciplinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('curso');
            $table->string('serie');
            $table->string('turma');
            $table->string('disciplina');
            $table->string('professor');
            $table->integer('user_id');
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
        Schema::dropIfExists('conselho_disciplinas');
    }
}
