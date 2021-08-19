@extends('layouts.app')
@section('content')

<h1>{{!$livro_registro==null ? 'Editar Livro_registro' : 'Cadastrar Livro_registro'}}</h1>
@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (!$livro_registro==null)
<form method="post" action="{{route('livro_registro.update', ['id'=> $livro_registro ->id])}}" enctype="multipart/form-data">
    {!! method_field('PUT')!!}
    @else
    <form action="{{route('livro_registro.store')}}" method='post'>
    @endif

    {{ csrf_field() }}
        <div class='form-group'>
            <label>Descricao</label>
            <input name='descricao' value='{{$livro_registro==null ? old("descricao") : $livro_registro->descricao }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>Arquivo</label>
            <input type="file" name='arquivo' value='{{$livro_registro==null ? old("arquivo") : $livro_registro->arquivo }}' class='form-control'/>
        </div>
    @if (isset($livro_registro))
        <button type="submit" class="btn btn-primary btn-block">Alterar</button>
    @else
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    @endif
    </form>
    @stop
