<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Planejamento_old extends Model
    {
        //Alguns PTD foram salvos no banco antigo (another) e a maioria no banco novo.
        //Ver como corrigir o B.O.
        protected $connection = 'another'; 


        protected $table = 'planejamento';

        protected $fillable = [
           'curso',
           'serie',
           'turma',
           'disciplina',
           'arquivo',
           'idusuario',
           'situacao',
        ];
        public $timestamps = false;
        protected $primaryKey = 'idplanejamento';


        public function curso2(){
            return $this->belongsTo(Curso::class, 'curso', 'idcurso');
        }

        public function usuario()
        {
            return $this->belongsTo('App\Models\User', 'idusuario', 'id');
        }
    }
