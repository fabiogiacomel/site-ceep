@extends('layouts.app')
@section('content')
<!-- @if(empty($dados)) -->
<div class='alert alert-danger'>
Erro dados nulos
</div>
<!-- @else -->
<h1>Editar Users</h1>
<form action='/users/{{$dados->id}}' method='post'>
{{ csrf_field() }}
{{ method_field('PUT') }} <div class='form-group'>
                   <label>id</label>
                   <input type='text' name='id' value='{{$dados->id}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>name</label>
                   <input type='text' name='name' value='{{$dados->name}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>email</label>
                   <input type='text' name='email' value='{{$dados->email}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>email_verified_at</label>
                   <input type='text' name='email_verified_at' value='{{$dados->email_verified_at}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>password</label>
                   <input type='text' name='password' value='{{$dados->password}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>remember_token</label>
                   <input type='text' name='remember_token' value='{{$dados->remember_token}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>created_at</label>
                   <input type='text' name='created_at' value='{{$dados->created_at}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>updated_at</label>
                   <input type='text' name='updated_at' value='{{$dados->updated_at}}' class='form-control'/>
                </div><button type='submit'
class='btn btn-primary btn-block'>Alterar</button>
</form>
@endif
@stop