@extends('layouts.app')
@section('content')
<!-- @if(empty($dados)) -->
<div class='alert alert-danger'>
Erro dados nulos
</div>
<!-- @else -->
<h1>Editar Password_resets</h1>
<form action='/password_resets/{{$dados->id}}' method='post'>
{{ csrf_field() }}
{{ method_field('PUT') }} <div class='form-group'>
                   <label>email</label>
                   <input type='text' name='email' value='{{$dados->email}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>token</label>
                   <input type='text' name='token' value='{{$dados->token}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>created_at</label>
                   <input type='text' name='created_at' value='{{$dados->created_at}}' class='form-control'/>
                </div><button type='submit'
class='btn btn-primary btn-block'>Alterar</button>
</form>
@endif
@stop