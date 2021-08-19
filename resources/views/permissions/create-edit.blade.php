@extends('layouts.app')
@section('content')

<h1>{{!$permissions==null ? 'Editar Permissions' : 'Cadastrar Permissions'}}</h1>
@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (!$permissions==null)
<form method="post" action="{{route('permissions.update', ['id'=> $permissions ->id])}}" enctype="multipart/form-data">
    {!! method_field('PUT')!!}
    @else
    <form action="{{route('permissions.store')}}" method='post'>
    @endif

    {{ csrf_field() }}
        <div class='form-group'>
            <label>name</label>       
            <input name='name' value='{{$permissions==null ? old("name") : $permissions->name }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>description</label>       
            <input name='description' value='{{$permissions==null ? old("description") : $permissions->description }}' class='form-control'/>
        </div>
    @if (isset($permissions))
        <button type="submit" class="btn btn-primary btn-block">Alterar</button>
    @else
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    @endif
    </form>
    @stop