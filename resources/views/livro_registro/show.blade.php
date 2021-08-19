
@extends('layouts.app')
@section('content')
    <h1>Detalhes: </h1>
    <ul>
        <li><b>id:</b>{{$livro_registro->id}}</li>
        <li><b>descricao:</b>{{$livro_registro->descricao}}</li>
        <li><b>arquivo:</b>{{$livro_registro->arquivo}}</li>
        <li><b>data:</b>{{$livro_registro->data}}</li>
        <li><b>user_id:</b>{{$livro_registro->user_id}}</li>
        <li><b>modalidade:</b>{{$livro_registro->modalidade}}</li>
    </ul>@stop