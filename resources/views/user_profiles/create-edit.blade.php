@extends('layouts.app')
@section('content')

<h1>{{!$user_profiles==null ? 'Editar User_profiles' : 'Cadastrar User_profiles'}}</h1>
@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (!$user_profiles==null)
<form method="post" action="{{route('user_profiles.update', ['id'=> $user_profiles ->id])}}" enctype="multipart/form-data">
    {!! method_field('PUT')!!}
    @else
    <form action="{{route('user_profiles.store')}}" method='post'>
    @endif

    {{ csrf_field() }}
    <div class="form-group">
        <label>user_id</label>
        <select name="user_id" class="form-control">
        @foreach ($fk as $f)
            <option value="{{$f->id}}">{{$f->social_name}}</option>"
        @endforeach
        </select>
        </div>
    <div class="form-group">
        <label>profiles_id</label>
        <select name="profiles_id" class="form-control">
        @foreach ($fk as $f)
            <option value="{{$f->id}}">{{$f->social_name}}</option>"
        @endforeach
        </select>
        </div>
    @if (isset($user_profiles))
        <button type="submit" class="btn btn-primary btn-block">Alterar</button>
    @else
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    @endif
    </form>
    @stop