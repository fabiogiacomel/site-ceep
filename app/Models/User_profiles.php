<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\SoftDeletes;

class User_profiles extends Model
{

    //use SoftDeletes;

    protected $table = "user_profiles";
    public function profiles()
    {
        return $this->belongsTo("profiles");
    }
    protected $fillable = array('profiles_id', 'created_at', 'updated_at');
    protected $guarded = ["id"];

    public $timestamps = false;

    //protected $dates = ["deleted_at"];
}
