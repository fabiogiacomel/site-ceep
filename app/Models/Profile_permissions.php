<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    //use Illuminate\Database\Eloquent\SoftDeletes;

    class Profile_permissions extends Model
    {

        //use SoftDeletes;

        protected $table = "profile_permissions";
        public function profiles() {
            return $this->belongsTo("profiles");
        }
        protected $fillable = array('profiles_id', 'created_at', 'updated_at');
        protected $guarded = ["id"];

        public $timestamps = false;

        //protected $dates = ["deleted_at"];
    }
?>