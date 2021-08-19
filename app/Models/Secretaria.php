<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    protected $table = "noticia";

    protected $fillable = array('titulo', 'mensagem', 'mensagem_alternativa', 'imagem', 'user_id', 'data', 'situacao', 'tipo');

    public function user()
    {
        return $this->belongsTo("App\Models\Users");
    }
    public $timestamps = false;
}
