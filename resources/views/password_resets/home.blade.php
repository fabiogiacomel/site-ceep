
@extends('layouts.app')
@section('content')
    <h1>Listagem de Password_resets
<a class='btn btn-success' href='{{action("Password_resetsController@create")}}'>
Novo
</a></h1>
<table class='table table-striped table-bordered table-hover'>
    <tr><th>email</th><th>token</th><th>created_at</th><th>Exibir</th><th>Excluir</th><th>Alterar</th></tr>
        @foreach ($password_resets as $d)
            <tr>
            <td>{{$d->email}}</td>
            <td>{{$d->token}}</td>
            <td>{{$d->created_at}}</td>
        <td>
            <a class='btn btn-success' href='{{action('Password_resetsController@show', $d->id)}}'>
                <i class='material-icons'>info</i>
            </a>
        </td>
        <td>
        <form action='/password_resets/{{$d->id}}' method='post'>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class='btn btn-danger'>
                <i class='material-icons'>delete</i>
            </button>
        </form>
    </td>
    <td>
        <a class='btn btn-warning' href='{{action('Password_resetsController@edit', $d->id)}}'>
            <i class='material-icons'>edit</i>
        </a>
    </td>
    </tr>
@endforeach
</table>
@stop