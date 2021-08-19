<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario_google extends Model
{

    //use SoftDeletes;

    protected $table = "usuario_google";
    public function empresa()
    {
        return $this->belongsTo("empresa");
    }
    protected $fillable = array('nome', 'sobrenome', 'email', 'senha', 'email_2', 'telefone1', 'telefone2', 'celular', 'endereco1', 'endereco2', 'empresa_id', 'empresa_tipo', 'empresa_nome', 'gerente', 'departamento', 'centro_custo');
    protected $guarded = ["id"];

    public $timestamps = false;

    //protected $dates = ["deleted_at"];
}
