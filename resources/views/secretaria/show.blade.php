
@extends('layouts.app')
@section('content')
    <h1>Detalhes: </h1>
    <ul>
        <li><b>id:</b> {{$noticia->id}}</li>
        <li><b>titulo:</b> {{$noticia->titulo}}</li>
        <li><b>mensagem:</b> {{$noticia->mensagem}}</li>
        <li><b>imagem:</b> {{$noticia->imagem}}</li>
        <li><b>user_id:</b> {{$noticia->user->name}}</li>
        <li><b>data:</b> {{$d->data)}}</li>
        <li><b>situacao:</b> {{$noticia->situacao}}</li>
        <li><b>tipo:</b> {{$noticia->tipo}}</li>
    </ul>@stop