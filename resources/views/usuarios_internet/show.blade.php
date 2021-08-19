
@extends('layouts.app')
@section('content')
    <h1>Detalhes: </h1>
    <ul>
        <li><b>cgm:</b>{{$usuarios_internet->cgm}}</li>
        <li><b>nome:</b>{{$usuarios_internet->nome}}</li>
        <li><b>senha:</b>{{$usuarios_internet->senha}}</li>
        <li><b>email:</b>{{$usuarios_internet->email}}</li>
        <li><b>situacao:</b>{{$usuarios_internet->situacao}}</li>
        <li><b>cgm_md5:</b>{{$usuarios_internet->cgm_md5}}</li>
        <li><b>data_cadastro:</b>{{$usuarios_internet->data_cadastro}}</li>
    </ul>@stop