@extends('layouts.app')
@section('content')

<h1>{{!$password_resets==null ? 'Editar Password_resets' : 'Cadastrar Password_resets'}}</h1>
@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (!$password_resets==null)
<form method="post" action="{{route('password_resets.update', ['id'=> $password_resets ->id])}}" enctype="multipart/form-data">
    {!! method_field('PUT')!!}
    @else
    <form action="{{route('password_resets.store')}}" method='post'>
    @endif

    {{ csrf_field() }}
        <div class='form-group'>
            <label>email</label>       
            <input name='email' value='{{$password_resets==null ? old("email") : $password_resets->email }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>token</label>       
            <input name='token' value='{{$password_resets==null ? old("token") : $password_resets->token }}' class='form-control'/>
        </div>
    @if (isset($password_resets))
        <button type="submit" class="btn btn-primary btn-block">Alterar</button>
    @else
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    @endif
    </form>
    @stop