@extends('layouts.app')
@section('content')
<!-- @if(empty($dados)) -->
<div class='alert alert-danger'>
Erro dados nulos
</div>
<!-- @else -->
<h1>Editar Noticia</h1>
<form action='/noticia/{{$dados->id}}' method='post'>
{{ csrf_field() }}
{{ method_field('PUT') }} <div class='form-group'>
                   <label>id</label>
                   <input type='text' name='id' value='{{$dados->id}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>titulo</label>
                   <input type='text' name='titulo' value='{{$dados->titulo}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>mensagem</label>
                   <input type='text' name='mensagem' value='{{$dados->mensagem}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>mensagem_alternativa</label>
                   <input type='text' name='mensagem_alternativa' value='{{$dados->mensagem_alternativa}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>imagem</label>
                   <input type='text' name='imagem' value='{{$dados->imagem}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>user_id</label>
                   <input type='text' name='user_id' value='{{$dados->user_id}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>data</label>
                   <input type='text' name='data' value='{{$dados->data}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>situacao</label>
                   <input type='text' name='situacao' value='{{$dados->situacao}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>tipo</label>
                   <input type='text' name='tipo' value='{{$dados->tipo}}' class='form-control'/>
                </div><button type='submit'
class='btn btn-primary btn-block'>Alterar</button>
</form>
@endif
@stop