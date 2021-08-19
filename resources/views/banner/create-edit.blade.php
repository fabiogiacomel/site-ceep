@extends('layouts.app')
@section('content')

<h1>{{!$banner==null ? 'Editar Banner' : 'Cadastrar Banner'}}</h1>
@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (!$banner==null)
<form method="post" action="{{route('banner.update', ['id'=> $banner ->id])}}" enctype="multipart/form-data">
    {!! method_field('PUT')!!}
    @else
    <form action="{{route('banner.store')}}" method='post'>
    @endif

    {{ csrf_field() }}
        <div class='form-group'>
            <label>Titulo</label>
            <input type="text" name='titulo' value='{{$banner==null ? old("titulo") : $banner->titulo }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>Imagem</label>
            <input type="file" name='imagem' value='{{$banner==null ? old("imagem") : $banner->imagem }}' class='form-control'/>
        </div>
<!--         <div class='form-group'>
            <label>Data</label>
            <input type="date" name='data' value='{{$banner==null ? old("data") : $banner->data }}' class='form-control'/>
        </div> -->
        <div class='form-group'>
            <label>Link</label>
            <input type="text" name='link' value='{{$banner==null ? old("link") : $banner->link }}' class='form-control'/>
        </div>

    @if (isset($banner))
        <button type="submit" class="btn btn-primary btn-block">Alterar</button>
    @else
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    @endif
    </form>
    @stop
