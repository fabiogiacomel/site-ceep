<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Expoceep_usuario extends Model
    {

        //use SoftDeletes;

        protected $table = "expoceep_usuario";
        protected $fillable = array('nome', 'email', 'senha', 'data_cadastro', 'remember_token', 'created_at', 'updated_at');
        protected $guarded = ["id"];
        protected $dates = ["deleted_at"];
    }
?>