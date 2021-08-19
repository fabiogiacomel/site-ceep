<?php

namespace App;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Model;

class DisciplinaCurso extends Model
{
    protected $fillable = [
        'curso',
        'serie',
        'nome',
    ];

    public static function rules()
    {
        return [
            'curso' => 'required|integer',
            'serie' => 'required|integer',
            'nome' => 'required|string',
        ];
    }

    public function curso(){
        return $this->belongsTo(Curso::class, 'curso');
    }
}