<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    //use Illuminate\Database\Eloquent\SoftDeletes;

    class Migrations extends Model
    {

        //use SoftDeletes;

        protected $table = "migrations";
        protected $fillable = array('migration', 'batch');
        protected $guarded = ["id"];

        public $timestamps = false;

        //protected $dates = ["deleted_at"];
    }
?>