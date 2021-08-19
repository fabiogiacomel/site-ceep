@extends('layouts.app')
@section('content')
<!-- @if(empty($dados)) -->
<div class='alert alert-danger'>
Erro dados nulos
</div>
<!-- @else -->
<h1>Editar Livro_registro</h1>
<form action='/livro_registro/{{$dados->id}}' method='post'>
{{ csrf_field() }}
{{ method_field('PUT') }} <div class='form-group'>
                   <label>id</label>
                   <input type='text' name='id' value='{{$dados->id}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>descricao</label>
                   <input type='text' name='descricao' value='{{$dados->descricao}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>arquivo</label>
                   <input type='text' name='arquivo' value='{{$dados->arquivo}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>data</label>
                   <input type='text' name='data' value='{{$dados->data}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>user_id</label>
                   <input type='text' name='user_id' value='{{$dados->user_id}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>modalidade</label>
                   <input type='text' name='modalidade' value='{{$dados->modalidade}}' class='form-control'/>
                </div><button type='submit'
class='btn btn-primary btn-block'>Alterar</button>
</form>
@endif
@stop