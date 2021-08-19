
@extends('layouts.app')
@section('content')
    <h1>Listagem de Curso
<a class='btn btn-success' href='{{action("CursoController@create")}}'>
Novo
</a></h1>
<table class='table table-striped table-bordered table-hover'>
    <tr><th>id</th><th>nome</th><th>objetivo</th><th>perfil</th><th>logo</th><th>user_id</th><th>situacao</th><th>Exibir</th><th>Excluir</th><th>Alterar</th></tr>
        @foreach ($curso as $d)
            <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->nome}}</td>
            <td>{{$d->objetivo}}</td>
            <td>{{$d->perfil}}</td>
            <td>{{$d->logo}}</td>
            <td>{{$d->user_id}}</td>
            <td>{{$d->situacao}}</td>
        <td>
            <a class='btn btn-success' href='{{action('CursoController@show', $d->id)}}'>
                <i class='material-icons'>info</i>
            </a>
        </td>
        <td>
        <form action='/curso/{{$d->id}}' method='post'>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class='btn btn-danger'>
                <i class='material-icons'>delete</i>
            </button>
        </form>
    </td>
    <td>
        <a class='btn btn-warning' href='{{action('CursoController@edit', $d->id)}}'>
            <i class='material-icons'>edit</i>
        </a>
    </td>
    </tr>
@endforeach
</table>
@stop