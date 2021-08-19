
@extends('layouts.app')
@section('content')
    <h1>Listagem de Usuarios_internet
<a class='btn btn-success' href='{{action("Usuarios_internetController@create")}}'>
Novo
</a></h1>
<table class='table table-striped table-bordered table-hover'>
    <tr><th>cgm</th><th>nome</th><th>senha</th><th>email</th><th>situacao</th><th>cgm_md5</th><th>data_cadastro</th><th>Exibir</th><th>Excluir</th><th>Alterar</th></tr>
        @foreach ($usuarios_internet as $d)
            <tr>
            <td>{{$d->cgm}}</td>
            <td>{{$d->nome}}</td>
            <td>{{$d->senha}}</td>
            <td>{{$d->email}}</td>
            <td>{{$d->situacao}}</td>
            <td>{{$d->cgm_md5}}</td>
            <td>{{$d->data_cadastro}}</td>
        <td>
            <a class='btn btn-success' href='{{action('Usuarios_internetController@show', $d->id)}}'>
                <i class='material-icons'>info</i>
            </a>
        </td>
        <td>
        <form action='/usuarios_internet/{{$d->id}}' method='post'>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class='btn btn-danger'>
                <i class='material-icons'>delete</i>
            </button>
        </form>
    </td>
    <td>
        <a class='btn btn-warning' href='{{action('Usuarios_internetController@edit', $d->id)}}'>
            <i class='material-icons'>edit</i>
        </a>
    </td>
    </tr>
@endforeach
</table>
@stop