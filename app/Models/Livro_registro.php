<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\SoftDeletes;

class Livro_registro extends Model
{

    //use SoftDeletes;

    protected $table = "livro_registro";
    public function user()
    {
        return $this->belongsTo("user");
    }
    protected $fillable = array('descricao', 'arquivo', 'data', 'user_id', 'modalidade');
    protected $guarded = ["id"];

    public $timestamps = false;

    //protected $dates = ["deleted_at"];
}
