<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConselhoInformacao extends Model
{
    protected $table = 'conselho_informacaos';

    protected $fillable = [
        'nome',
        'descricao',
        'conselho_categoria_id',
    ];

    public static function rules()
    {
        return [
            'nome' => 'required|min:3|max:255',
            'descricao' => 'required|min:3|max:255',
            'conselho_categoria_id' => 'required|integer',
        ];
    }

    public function categoria(){
        return $this->belongsTo(ConselhoCategoria::class, 'conselho_categoria_id');
    }
}
