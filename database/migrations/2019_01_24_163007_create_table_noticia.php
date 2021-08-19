<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNoticia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //titulo', 'mensagem', 'imagem', 'user_id', 'situacao', 'tipo'
        Schema::create('noticia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('mensagem');
            $table->string('imagem')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('situacao');
            $table->integer('tipo');
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
        Schema::dropIfExists('noticia');
    }
}
