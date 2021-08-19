@extends('layouts.app')
@section('content')

<h1>{{!$profiles==null ? 'Editar Profiles' : 'Cadastrar Profiles'}}</h1>
@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (!$profiles==null)
<form method="post" action="{{route('profiles.update', ['id'=> $profiles ->id])}}" enctype="multipart/form-data">
    {!! method_field('PUT')!!}
    @else
    <form action="{{route('profiles.store')}}" method='post'>
    @endif

    {{ csrf_field() }}
        <div class='form-group'>
            <label>name</label>       
            <input name='name' value='{{$profiles==null ? old("name") : $profiles->name }}' class='form-control'/>
        </div>
    @if (isset($profiles))
        <button type="submit" class="btn btn-primary btn-block">Alterar</button>
    @else
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    @endif
    </form>
    @stop