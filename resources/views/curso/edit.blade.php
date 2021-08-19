@extends('layouts.app')
@section('content')
<!-- @if(empty($dados)) -->
<div class='alert alert-danger'>
Erro dados nulos
</div>
<!-- @else -->
<h1>Editar Curso</h1>
<form action='/curso/{{$dados->id}}' method='post'>
{{ csrf_field() }}
{{ method_field('PUT') }} <div class='form-group'>
                   <label>id</label>
                   <input type='text' name='id' value='{{$dados->id}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>nome</label>
                   <input type='text' name='nome' value='{{$dados->nome}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>objetivo</label>
                   <input type='text' name='objetivo' value='{{$dados->objetivo}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>perfil</label>
                   <input type='text' name='perfil' value='{{$dados->perfil}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>logo</label>
                   <input type='text' name='logo' value='{{$dados->logo}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>user_id</label>
                   <input type='text' name='user_id' value='{{$dados->user_id}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>situacao</label>
                   <input type='text' name='situacao' value='{{$dados->situacao}}' class='form-control'/>
                </div><button type='submit'
class='btn btn-primary btn-block'>Alterar</button>
</form>
@endif
@stop