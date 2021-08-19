
@extends('layouts.app')
@section('content')
    <h1>Detalhes: </h1>
    <ul>
        <li><b>id:</b>{{$usuario_google->id}}</li>
        <li><b>nome:</b>{{$usuario_google->nome}}</li>
        <li><b>sobrenome:</b>{{$usuario_google->sobrenome}}</li>
        <li><b>email:</b>{{$usuario_google->email}}</li>
        <li><b>senha:</b>{{$usuario_google->senha}}</li>
        <li><b>email_2:</b>{{$usuario_google->email_2}}</li>
        <li><b>telefone1:</b>{{$usuario_google->telefone1}}</li>
        <li><b>telefone2:</b>{{$usuario_google->telefone2}}</li>
        <li><b>celular:</b>{{$usuario_google->celular}}</li>
        <li><b>endereco1:</b>{{$usuario_google->endereco1}}</li>
        <li><b>endereco2:</b>{{$usuario_google->endereco2}}</li>
        <li><b>empresa_id:</b>{{$usuario_google->empresa_id}}</li>
        <li><b>empresa_tipo:</b>{{$usuario_google->empresa_tipo}}</li>
        <li><b>empresa_nome:</b>{{$usuario_google->empresa_nome}}</li>
        <li><b>gerente:</b>{{$usuario_google->gerente}}</li>
        <li><b>departamento:</b>{{$usuario_google->departamento}}</li>
        <li><b>centro_custo:</b>{{$usuario_google->centro_custo}}</li>
    </ul>@stop