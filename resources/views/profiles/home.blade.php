
@extends('layouts.app')
@section('content')
    <h1>Listagem de Profiles
<a class='btn btn-success' href='{{action("ProfilesController@create")}}'>
Novo
</a></h1>
<table class='table table-striped table-bordered table-hover'>
    <tr><th>id</th><th>name</th><th>created_at</th><th>updated_at</th><th>Exibir</th><th>Excluir</th><th>Alterar</th></tr>
        @foreach ($profiles as $d)
            <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->name}}</td>
            <td>{{$d->created_at}}</td>
            <td>{{$d->updated_at}}</td>
        <td>
            <a class='btn btn-success' href='{{action('ProfilesController@show', $d->id)}}'>
                <i class='material-icons'>info</i>
            </a>
        </td>
        <td>
        <form action='/profiles/{{$d->id}}' method='post'>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class='btn btn-danger'>
                <i class='material-icons'>delete</i>
            </button>
        </form>
    </td>
    <td>
        <a class='btn btn-warning' href='{{action('ProfilesController@edit', $d->id)}}'>
            <i class='material-icons'>edit</i>
        </a>
    </td>
    </tr>
@endforeach
</table>
@stop