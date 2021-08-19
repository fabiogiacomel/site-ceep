<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    //use Illuminate\Database\Eloquent\SoftDeletes;

    class Profiles extends Model
    {

        //use SoftDeletes;

        protected $table = "profiles";
        protected $fillable = array('name', 'created_at', 'updated_at');
        protected $guarded = ["id"];

        public $timestamps = false;

        //protected $dates = ["deleted_at"];
    }
?>