@extends('layouts.app')
@section('content')

<h1>{{!$profile_permissions==null ? 'Editar Profile_permissions' : 'Cadastrar Profile_permissions'}}</h1>
@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (!$profile_permissions==null)
<form method="post" action="{{route('profile_permissions.update', ['id'=> $profile_permissions ->id])}}" enctype="multipart/form-data">
    {!! method_field('PUT')!!}
    @else
    <form action="{{route('profile_permissions.store')}}" method='post'>
    @endif

    {{ csrf_field() }}
    <div class="form-group">
        <label>permissions_id</label>
        <select name="permissions_id" class="form-control">
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
    @if (isset($profile_permissions))
        <button type="submit" class="btn btn-primary btn-block">Alterar</button>
    @else
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    @endif
    </form>
    @stop