
@extends('layouts.app')
@section('content')
    <h1>Detalhes: </h1>
    <ul>
        <li><b>id:</b>{{$profiles->id}}</li>
        <li><b>name:</b>{{$profiles->name}}</li>
        <li><b>created_at:</b>{{$profiles->created_at}}</li>
        <li><b>updated_at:</b>{{$profiles->updated_at}}</li>
    </ul>@stop