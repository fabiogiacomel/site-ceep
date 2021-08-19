@extends('layouts.app')
@section('content')
<!-- @if(empty($dados)) -->
<div class='alert alert-danger'>
Erro dados nulos
</div>
<!-- @else -->
<h1>Editar Usuarios_internet</h1>
<form action='/usuarios_internet/{{$dados->id}}' method='post'>
{{ csrf_field() }}
{{ method_field('PUT') }} <div class='form-group'>
                   <label>cgm</label>
                   <input type='text' name='cgm' value='{{$dados->cgm}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>nome</label>
                   <input type='text' name='nome' value='{{$dados->nome}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>senha</label>
                   <input type='text' name='senha' value='{{$dados->senha}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>email</label>
                   <input type='text' name='email' value='{{$dados->email}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>situacao</label>
                   <input type='text' name='situacao' value='{{$dados->situacao}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>cgm_md5</label>
                   <input type='text' name='cgm_md5' value='{{$dados->cgm_md5}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>data_cadastro</label>
                   <input type='text' name='data_cadastro' value='{{$dados->data_cadastro}}' class='form-control'/>
                </div><button type='submit'
class='btn btn-primary btn-block'>Alterar</button>
</form>
@endif
@stop