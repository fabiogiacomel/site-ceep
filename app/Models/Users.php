<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    //use Illuminate\Database\Eloquent\SoftDeletes;

    class Users extends Model
    {
        protected $connection = 'mysql';


        //use SoftDeletes;

        protected $table = "users";
        protected $fillable = array('name', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at');
        protected $guarded = ["id"];

        public $timestamps = false;

        //protected $dates = ["deleted_at"];
    }
?>
