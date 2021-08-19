
@extends('layouts.app')
@section('content')
    <h1>Listagem de Profile_permissions
<a class='btn btn-success' href='{{action("Profile_permissionsController@create")}}'>
Novo
</a></h1>
<table class='table table-striped table-bordered table-hover'>
    <tr><th>permissions_id</th><th>profiles_id</th><th>created_at</th><th>updated_at</th><th>Exibir</th><th>Excluir</th><th>Alterar</th></tr>
        @foreach ($profile_permissions as $d)
            <tr>
            <td>{{$d->permissions_id}}</td>
            <td>{{$d->profiles_id}}</td>
            <td>{{$d->created_at}}</td>
            <td>{{$d->updated_at}}</td>
        <td>
            <a class='btn btn-success' href='{{action('Profile_permissionsController@show', $d->id)}}'>
                <i class='material-icons'>info</i>
            </a>
        </td>
        <td>
        <form action='/profile_permissions/{{$d->id}}' method='post'>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class='btn btn-danger'>
                <i class='material-icons'>delete</i>
            </button>
        </form>
    </td>
    <td>
        <a class='btn btn-warning' href='{{action('Profile_permissionsController@edit', $d->id)}}'>
            <i class='material-icons'>edit</i>
        </a>
    </td>
    </tr>
@endforeach
</table>
@stop