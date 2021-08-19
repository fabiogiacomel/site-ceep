<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{

    //use SoftDeletes;
    protected $connection = 'another';
    protected $primaryKey = 'idcurso';


    protected $table = "curso";
    public function user()
    {
        return $this->belongsTo("user");
    }
    protected $fillable = array('nome', 'objetivo', 'perfil', 'logo', 'user_id', 'situacao');
    protected $guarded = ["id"];

    public $timestamps = false;

    //protected $dates = ["deleted_at"];
}
