<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConselhoRegistro extends Model
{
    protected $table = 'conselho_registros';

    protected $fillable = [
        'aluno',
        'conselho_informacao_id',
        'conselho_disciplina_id',
    ];

    public static function rules()
    {
        return [
            'aluno' => 'required|integer',
            'conselho_informacao_id' => 'required|integer',
            'conselho_disciplina_id' => 'required|integer',
        ];
    }


    public function informacao(){
        return $this->belongsTo(ConselhoInformacao::class, 'conselho_informacao_id');
    }

    public function disciplina(){
        return $this->belongsTo(ConselhoDisciplina::class, 'conselho_disciplina_id');
    }

    public function disciplina2(){
        return $this->belongsTo(ConselhoDisciplina::class, 'conselho_disciplina_id');
    }
}
