
@extends('layouts.app')
@section('content')
    <h1>Detalhes: </h1>
    <ul>
        <li><b>id:</b>{{$banner->id}}</li>
        <li><b>titulo:</b>{{$banner->titulo}}</li>
        <li><b>imagem:</b>{{$banner->imagem}}</li>
        <li><b>data:</b>{{$banner->data}}</li>
        <li><b>link:</b>{{$banner->link}}</li>
        <li><b>user_id:</b>{{$banner->user_id}}</li>
    </ul>@stop