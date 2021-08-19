
@extends('layouts.app')
@section('content')
    <h1>Detalhes: </h1>
    <ul>
        <li><b>id:</b>{{$curso->id}}</li>
        <li><b>nome:</b>{{$curso->nome}}</li>
        <li><b>objetivo:</b>{{$curso->objetivo}}</li>
        <li><b>perfil:</b>{{$curso->perfil}}</li>
        <li><b>logo:</b>{{$curso->logo}}</li>
        <li><b>user_id:</b>{{$curso->user_id}}</li>
        <li><b>situacao:</b>{{$curso->situacao}}</li>
    </ul>@stop