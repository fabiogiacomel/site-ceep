
@extends('layouts.app')
@section('content')
    <h1>Listagem de Migrations
<a class='btn btn-success' href='{{action("MigrationsController@create")}}'>
Novo
</a></h1>
<table class='table table-striped table-bordered table-hover'>
    <tr><th>id</th><th>migration</th><th>batch</th><th>Exibir</th><th>Excluir</th><th>Alterar</th></tr>
        @foreach ($migrations as $d)
            <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->migration}}</td>
            <td>{{$d->batch}}</td>
        <td>
            <a class='btn btn-success' href='{{action('MigrationsController@show', $d->id)}}'>
                <i class='material-icons'>info</i>
            </a>
        </td>
        <td>
        <form action='/migrations/{{$d->id}}' method='post'>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class='btn btn-danger'>
                <i class='material-icons'>delete</i>
            </button>
        </form>
    </td>
    <td>
        <a class='btn btn-warning' href='{{action('MigrationsController@edit', $d->id)}}'>
            <i class='material-icons'>edit</i>
        </a>
    </td>
    </tr>
@endforeach
</table>
@stop