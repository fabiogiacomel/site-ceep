<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    //use Illuminate\Database\Eloquent\SoftDeletes;

    class Password_resets extends Model
    {

        //use SoftDeletes;

        protected $table = "password_resets";
        protected $fillable = array('token', 'created_at');
        protected $guarded = ["id"];

        public $timestamps = false;

        //protected $dates = ["deleted_at"];
    }
?>