
@extends('layouts.app')
@section('content')
    <h1>Listagem de Banner
<a class='btn btn-success' href='{{action("BannerController@create")}}'>
Novo
</a></h1>
<table class='table table-striped table-bordered table-hover'>
    <tr><th>id</th><th>titulo</th><th>imagem</th><th>data</th><th>link</th><th>user_id</th><th>Exibir</th><th>Excluir</th><th>Alterar</th></tr>
        @foreach ($banner as $d)
            <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->titulo}}</td>
            <td>{{$d->imagem}}</td>
            <td>{{$d->data}}</td>
            <td>{{$d->link}}</td>
            <td>{{$d->user_id}}</td>
        <td>
            <a class='btn btn-success' href='{{action('BannerController@show', $d->id)}}'>
                <i class='material-icons'>info</i>
            </a>
        </td>
        <td>
        <form action='/banner/{{$d->id}}' method='post'>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class='btn btn-danger'>
                <i class='material-icons'>delete</i>
            </button>
        </form>
    </td>
    <td>
        <a class='btn btn-warning' href='{{action('BannerController@edit', $d->id)}}'>
            <i class='material-icons'>edit</i>
        </a>
    </td>
    </tr>
@endforeach
</table>
@stop