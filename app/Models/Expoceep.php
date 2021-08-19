<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expoceep extends Model
{
    protected $connection = 'another';

    protected $primaryKey = 'idprojeto';

    protected $table = "expoceep_projeto";
    
    protected $fillable = array('nome', 'integrantes', 'orientadores', 
                                    'idcurso', 'modalidade', 'turma',  'email',  
                                    'data_hora', 'arquivo', 'idusuario', 'situacao', 
                                    'tipo', 'area_conhecimento');

    public $timestamps = false;
}
