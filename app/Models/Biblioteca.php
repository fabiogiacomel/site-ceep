<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    protected $fillable = array('curso', 'serie', 'turma', 'titulo', 'arquivo', 'user_id', 'situacao','imagem');

    public function curso2(){
        return $this->belongsTo(Curso::class, 'curso', 'idcurso');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}