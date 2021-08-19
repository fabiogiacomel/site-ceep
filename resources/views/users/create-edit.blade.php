@extends('layouts.app')
@section('content')

<h1>{{!$user==null ? 'Editar Usuário' : 'Cadastrar Usuário'}}</h1>
@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (!$user==null)
<form method="post" action="{{route('users.update', ['id'=> $user ->id])}}" enctype="multipart/form-data">
    {!! method_field('PUT')!!}
    @else
    <form action="{{route('users.store')}}" method='post'>
    @endif

    {{ csrf_field() }}
        <div class='form-group'>
            <label>Nome</label>       
            <input name='name' value='{{$user==null ? old("name") : $user->name }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>Usuário</label>       
            <input name='email' value='{{$user==null ? old("email") : $user->email }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>Senha</label>       
            <input name='password' type='password' value='{{$user==null ? old("password") : '' }}' class='form-control'/>
        </div>
    @if (isset($user))
        <button type="submit" class="btn btn-primary btn-block">Alterar</button>
    @else
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    @endif
    </form>
    @stop