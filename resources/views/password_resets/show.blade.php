
@extends('layouts.app')
@section('content')
    <h1>Detalhes: </h1>
    <ul>
        <li><b>email:</b>{{$password_resets->email}}</li>
        <li><b>token:</b>{{$password_resets->token}}</li>
        <li><b>created_at:</b>{{$password_resets->created_at}}</li>
    </ul>@stop