
@extends('layouts.app')
@section('content')
    <h1>Detalhes: </h1>
    <ul>
        <li><b>id:</b>{{$permissions->id}}</li>
        <li><b>name:</b>{{$permissions->name}}</li>
        <li><b>description:</b>{{$permissions->description}}</li>
        <li><b>created_at:</b>{{$permissions->created_at}}</li>
        <li><b>updated_at:</b>{{$permissions->updated_at}}</li>
    </ul>@stop