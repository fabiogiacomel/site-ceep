<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    //use Illuminate\Database\Eloquent\SoftDeletes;

    class Usuarios_internet extends Model
    {
        protected $connection = 'another';

        //use SoftDeletes;

        protected $table = "usuarios_internet";
        protected $fillable = array('nome', 'senha', 'email', 'situacao', 'cgm_md5', 'data_cadastro', 'cgm');
        protected $guarded = ["id"];

        public $timestamps = false;

        //protected $dates = ["deleted_at"];
    }
?>
