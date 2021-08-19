
@extends('layouts.app')
@section('content')
    <h1>Listagem de Livro_registro
<a class='btn btn-success' href='{{action("Livro_registroController@create")}}'>
Novo
</a></h1>
<table class='table table-striped table-bordered table-hover'>
    <tr><th>id</th><th>descricao</th><th>arquivo</th><th>data</th><th>user_id</th><th>modalidade</th><th>Exibir</th><th>Excluir</th><th>Alterar</th></tr>
        @foreach ($livro_registro as $d)
            <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->descricao}}</td>
            <td>{{$d->arquivo}}</td>
            <td>{{$d->data}}</td>
            <td>{{$d->user_id}}</td>
            <td>{{$d->modalidade}}</td>
        <td>
            <a class='btn btn-success' href='{{action('Livro_registroController@show', $d->id)}}'>
                <i class='material-icons'>info</i>
            </a>
        </td>
        <td>
        <form action='/livro_registro/{{$d->id}}' method='post'>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class='btn btn-danger'>
                <i class='material-icons'>delete</i>
            </button>
        </form>
    </td>
    <td>
        <a class='btn btn-warning' href='{{action('Livro_registroController@edit', $d->id)}}'>
            <i class='material-icons'>edit</i>
        </a>
    </td>
    </tr>
@endforeach
</table>
@stop