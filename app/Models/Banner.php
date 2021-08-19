<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{

    //use SoftDeletes;

    protected $table = "banner";
    public function user()
    {
        return $this->belongsTo("user");
    }
    protected $fillable = array('titulo', 'imagem', 'data', 'link', 'user_id');
    protected $guarded = ["id"];

    public $timestamps = false;

    //protected $dates = ["deleted_at"];
}
