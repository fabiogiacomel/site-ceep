@extends('layouts.app')
@section('content')

<h1>{{isset($categoria) ? 'Editar categoria' : 'Cadastrar categoria'}}</h1>
@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (isset($categoria))
<form method="post" action="{{route('conselho-categoria.update', ['id'=> $categoria ->id])}}" enctype="multipart/form-data">
    {!! method_field('PUT')!!}
    @else
    <form action="{{route('conselho-categoria.store')}}" method='post'>
    @endif

    {{ csrf_field() }}
        <div class='form-group'>
            <label>Titulo</label>
            <input type="text" name='nome' value='{{$categoria->titulo ?? old("titulo") }}' class='form-control'/>
        </div>
    @if (isset($categoria))
        <button type="submit" class="btn btn-primary btn-block">Alterar</button>
    @else
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    @endif
    </form>
    @stop
