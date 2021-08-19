@extends('layouts.app')
@section('content')
<!-- @if(empty($dados)) -->
<div class='alert alert-danger'>
Erro dados nulos
</div>
<!-- @else -->
<h1>Editar Banner</h1>
<form action='/banner/{{$dados->id}}' method='post'>
{{ csrf_field() }}
{{ method_field('PUT') }} <div class='form-group'>
                   <label>id</label>
                   <input type='text' name='id' value='{{$dados->id}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>titulo</label>
                   <input type='text' name='titulo' value='{{$dados->titulo}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>imagem</label>
                   <input type='text' name='imagem' value='{{$dados->imagem}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>data</label>
                   <input type='text' name='data' value='{{$dados->data}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>link</label>
                   <input type='text' name='link' value='{{$dados->link}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>user_id</label>
                   <input type='text' name='user_id' value='{{$dados->user_id}}' class='form-control'/>
                </div><button type='submit'
class='btn btn-primary btn-block'>Alterar</button>
</form>
@endif
@stop