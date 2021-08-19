
@extends('layouts.app')
@section('content')
    <h1>Listagem de Usuario_google
<a class='btn btn-success' href='{{action("Usuario_googleController@create")}}'>
Novo
</a></h1>
<table class='table table-striped table-bordered table-hover'>
    <tr><th>id</th><th>nome</th><th>sobrenome</th><th>email</th><th>senha</th><th>email_2</th><th>telefone1</th><th>telefone2</th><th>celular</th><th>endereco1</th><th>endereco2</th><th>empresa_id</th><th>empresa_tipo</th><th>empresa_nome</th><th>gerente</th><th>departamento</th><th>centro_custo</th><th>Exibir</th><th>Excluir</th><th>Alterar</th></tr>
        @foreach ($usuario_google as $d)
            <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->nome}}</td>
            <td>{{$d->sobrenome}}</td>
            <td>{{$d->email}}</td>
            <td>{{$d->senha}}</td>
            <td>{{$d->email_2}}</td>
            <td>{{$d->telefone1}}</td>
            <td>{{$d->telefone2}}</td>
            <td>{{$d->celular}}</td>
            <td>{{$d->endereco1}}</td>
            <td>{{$d->endereco2}}</td>
            <td>{{$d->empresa_id}}</td>
            <td>{{$d->empresa_tipo}}</td>
            <td>{{$d->empresa_nome}}</td>
            <td>{{$d->gerente}}</td>
            <td>{{$d->departamento}}</td>
            <td>{{$d->centro_custo}}</td>
        <td>
            <a class='btn btn-success' href='{{action('Usuario_googleController@show', $d->id)}}'>
                <i class='material-icons'>info</i>
            </a>
        </td>
        <td>
        <form action='/usuario_google/{{$d->id}}' method='post'>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class='btn btn-danger'>
                <i class='material-icons'>delete</i>
            </button>
        </form>
    </td>
    <td>
        <a class='btn btn-warning' href='{{action('Usuario_googleController@edit', $d->id)}}'>
            <i class='material-icons'>edit</i>
        </a>
    </td>
    </tr>
@endforeach
</table>
@stop