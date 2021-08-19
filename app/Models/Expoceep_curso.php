<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpoceepCurso extends Model
{

    //use SoftDeletes;

    protected $table = "curso";
    protected $fillable = array('nome', 'situacao', 'created_at', 'updated_at');
    protected $guarded = ["id"];
    protected $dates = ["deleted_at"];
}
