
@extends('layouts.app')
@section('content')
    <h1>Informativos da secretaria
<a class='btn btn-primary' href='{{action("SecretariaController@create")}}'>
Novo
</a></h1>
<table class='table table-striped table-bordered table-hover'>
    <tr><th>#</th><th>Título</th><th>Mensagem</th><th>Criado por</th><th>Data</th><th>Exibir</th><th>Excluir</th><th>Alterar</th></tr>
        @foreach ($noticia as $d)
            <tr>
            <td>{{$d->id}}</td>
            <td>{!!$d->titulo!!}</td>
            <td>{!!$d->mensagem!!}</td>
            <!-- <td>{{$d->imagem}}</td> -->
            <td>{{$d->user->name}}</td>
            <td> {{ $d->data }}</td>
            <!-- <td>{{$d->situacao}}</td> -->
        <td>
            <a class='btn btn-success' href='{{action('SecretariaController@show', $d->id)}}'>
                <i class='material-icons'>info</i>
            </a>
        </td>
        <td>
        <form action='/secretaria/{{$d->id}}' method='post'>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class='btn btn-danger'>
                <i class='material-icons'>delete</i>
            </button>
        </form>
    </td>
    <td>
        <a class='btn btn-warning' href='{{action('SecretariaController@edit', $d->id)}}'>
            <i class='material-icons'>edit</i>
        </a>
    </td>
    </tr>
@endforeach
</table>
@stop
