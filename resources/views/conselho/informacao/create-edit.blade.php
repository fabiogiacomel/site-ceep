@extends('layouts.app')
@section('content')

<h1>{{isset($informacao) ? 'Editar informação' : 'Cadastrar informação'}}</h1>
@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (isset($informacao))
<form method="post" action="{{route('conselho-informacao.update', ['id'=> $informacao ->id])}}" enctype="multipart/form-data">
    {!! method_field('PUT')!!}
    @else
    <form action="{{route('conselho-informacao.store')}}" method='post'>
    @endif

    {{ csrf_field() }}
        <div class='form-group'>
            <label>Titulo</label>
            <input type="text" name='nome' value='{{$informacao->nome ?? old("nome") }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>Descrição</label>
            <input type="text" name='descricao' value='{{$informacao->descricao ?? old("descricao") }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label for='curso'>curso</label>
            <select name="conselho_categoria_id" class='form-control'>
                <option value="0">Selecione </option>
                @foreach ($categorias as $c)
                <option value="{{$c->id}}" @if(isset($informacao) && ($informacao->
                    categoria_id == $c->id))
                    selected
                    @else
                    {{ old('categoria_id')==$c->id ? 'selected' : '' }}
                    @endif>{{$c->nome}}</option>
                @endforeach
            </select>
        </div>
    @if (isset($informacao))
        <button type="submit" class="btn btn-primary btn-block">Alterar</button>
    @else
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    @endif
    </form>
    @stop
