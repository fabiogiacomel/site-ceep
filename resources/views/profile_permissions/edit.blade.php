@extends('layouts.app')
@section('content')
<!-- @if(empty($dados)) -->
<div class='alert alert-danger'>
Erro dados nulos
</div>
<!-- @else -->
<h1>Editar Profile_permissions</h1>
<form action='/profile_permissions/{{$dados->id}}' method='post'>
{{ csrf_field() }}
{{ method_field('PUT') }} <div class='form-group'>
                   <label>permissions_id</label>
                   <input type='text' name='permissions_id' value='{{$dados->permissions_id}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>profiles_id</label>
                   <input type='text' name='profiles_id' value='{{$dados->profiles_id}}' class='form-control'/>
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