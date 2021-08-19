<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConselhoCategoria extends Model
{
    protected $table = 'conselho_categorias';

    protected $fillable = [
        'nome'
    ];

    public static function rules()
    {
        return [
            'nome' => 'required|min:3|max:255',
        ];
    }

    public function informacoesTodas(){
        return $this->hasMany(ConselhoInformacao::class)->whereIn('situacao', [1,2]);
    }

    public function informacoes(){
        return $this->hasMany(ConselhoInformacao::class)->where('situacao', 1);
    }
}
