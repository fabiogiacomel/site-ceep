
@extends('layouts.app')
@section('content')
    <h1>Listagem de User_profiles
<a class='btn btn-success' href='{{action("User_profilesController@create")}}'>
Novo
</a></h1>
<table class='table table-striped table-bordered table-hover'>
    <tr><th>user_id</th><th>profiles_id</th><th>created_at</th><th>updated_at</th><th>Exibir</th><th>Excluir</th><th>Alterar</th></tr>
        @foreach ($user_profiles as $d)
            <tr>
            <td>{{$d->user_id}}</td>
            <td>{{$d->profiles_id}}</td>
            <td>{{$d->created_at}}</td>
            <td>{{$d->updated_at}}</td>
        <td>
            <a class='btn btn-success' href='{{action('User_profilesController@show', $d->id)}}'>
                <i class='material-icons'>info</i>
            </a>
        </td>
        <td>
        <form action='/user_profiles/{{$d->id}}' method='post'>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class='btn btn-danger'>
                <i class='material-icons'>delete</i>
            </button>
        </form>
    </td>
    <td>
        <a class='btn btn-warning' href='{{action('User_profilesController@edit', $d->id)}}'>
            <i class='material-icons'>edit</i>
        </a>
    </td>
    </tr>
@endforeach
</table>
@stop