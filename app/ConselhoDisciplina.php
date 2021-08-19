<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConselhoDisciplina extends Model
{
    protected $table = 'conselho_disciplinas';

    protected $fillable = [
        'curso',
        'serie',
        'turma',
        'disciplina',
        'professor',
        'user_id',
        'periodo',
    ];

    public static function rules()
    {
        return [
            'curso' => 'required|integer',
            'serie' => 'required|integer',
            'turma' => 'required|integer',
            'disciplina' => 'required',
            'professor' => 'required|min:3|max:255',
            'periodo' => 'required',
        ];
    }

    public function curso2(){
        return $this->belongsTo(Models\Curso::class, 'curso','idcurso');
    }

    public function registros(){
        return $this->hasMany(ConselhoRegistro::class);
    }

    public function disciplina_curso(){
        return $this->belongsTo(DisciplinaCurso::class, 'disciplina');
    }
    
}
