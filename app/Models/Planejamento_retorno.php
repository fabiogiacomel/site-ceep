<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Planejamento_retorno extends Model
    {
        protected $table = 'planejamento_retorno';

        protected $fillable = [
           'IDPLANEJAMENTO_RETORNO',
           'IDPLANEJAMENTO',
           'IDUSUARIO',
           'DATA',
           'OBSERVACAO',
           'ARQUIVO',
           'SITUACAO',
        ];
    }