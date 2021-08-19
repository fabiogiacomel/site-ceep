
@extends('layouts.app')
@section('content')
    <h1>Listagem de Users
<a class='btn btn-success' href='{{action("UsersController@create")}}'>
Novo
</a></h1>
<table class='table table-striped table-bordered table-hover'>
    <tr><th>id</th><th>name</th><th>email</th><th>email_verified_at</th><th>password</th><th>remember_token</th><th>created_at</th><th>updated_at</th><th>Exibir</th><th>Excluir</th><th>Alterar</th></tr>
        @foreach ($users as $d)
            <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->name}}</td>
            <td>{{$d->email}}</td>
            <td>{{$d->email_verified_at}}</td>
            <td>{{$d->password}}</td>
            <td>{{$d->remember_token}}</td>
            <td>{{$d->created_at}}</td>
            <td>{{$d->updated_at}}</td>
        <td>
            <a class='btn btn-success' href='{{action('UsersController@show', $d->id)}}'>
                <i class='material-icons'>info</i>
            </a>
        </td>
        <td>
        <form action='/users/{{$d->id}}' method='post'>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class='btn btn-danger'>
                <i class='material-icons'>delete</i>
            </button>
        </form>
    </td>
    <td>
        <a class='btn btn-warning' href='{{action('UsersController@edit', $d->id)}}'>
            <i class='material-icons'>edit</i>
        </a>
    </td>
    </tr>
@endforeach
</table>
@stop