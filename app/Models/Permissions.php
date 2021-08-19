<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    //use Illuminate\Database\Eloquent\SoftDeletes;

    class Permissions extends Model
    {

        //use SoftDeletes;

        protected $table = "permissions";
        protected $fillable = array('name', 'description', 'created_at', 'updated_at');
        protected $guarded = ["id"];

        public $timestamps = false;

        //protected $dates = ["deleted_at"];
    }
?>