@extends('layouts.app')
@section('content')

<h1>{{!$curso==null ? 'Editar Curso' : 'Cadastrar Curso'}}</h1>
@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (!$curso==null)
<form method="post" action="{{route('curso.update', ['id'=> $curso ->id])}}" enctype="multipart/form-data">
    {!! method_field('PUT')!!}
    @else
    <form action="{{route('curso.store')}}" method='post'>
    @endif

    {{ csrf_field() }}
        <div class='form-group'>
            <label>Nome</label>
            <input type="text" name='nome' value='{{$curso==null ? old("nome") : $curso->nome }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>Objetivo</label>
            <textarea  name='objetivo' class='form-control'>{{$curso==null ? old("objetivo") : $curso->objetivo }}</textarea>
        </div>
        <div class='form-group'>
            <label>perfil</label>
            <textarea name='perfil'  class='form-control'>{{$curso==null ? old("perfil") : $curso->perfil }}</textarea>
        </div>
        <div class='form-group'>
            <label>logo</label>
            <input type="file" name='logo' value='{{$curso==null ? old("logo") : $curso->logo }}' class='form-control'/>
        </div>
    @if (isset($curso))
        <button type="submit" class="btn btn-primary btn-block">Alterar</button>
    @else
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    @endif
    </form>
    @stop
