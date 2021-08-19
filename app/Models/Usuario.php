<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $connection = 'another';
    protected $table = 'usuario';
    protected $primaryKey = 'idusuario';
    //
}
