<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Expoceep_projeto extends Model
    {

        //use SoftDeletes;

        protected $table = "expoceep_projeto";
        protected $fillable = array('nome', 'idcurso', 'idusuario', 'box', 'turma', 'integrantes', 'orientadores', 'email', 'arquivo', 'data_hora', 'created_at', 'updated_at');
        protected $guarded = ["id"];
        protected $dates = ["deleted_at"];
    }
?>