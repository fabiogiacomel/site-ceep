
@extends('layouts.app')
@section('content')
    <h1>Detalhes: </h1>
    <ul>
        <li><b>id:</b>{{$users->id}}</li>
        <li><b>name:</b>{{$users->name}}</li>
        <li><b>email:</b>{{$users->email}}</li>
        <li><b>email_verified_at:</b>{{$users->email_verified_at}}</li>
        <li><b>password:</b>{{$users->password}}</li>
        <li><b>remember_token:</b>{{$users->remember_token}}</li>
        <li><b>created_at:</b>{{$users->created_at}}</li>
        <li><b>updated_at:</b>{{$users->updated_at}}</li>
    </ul>@stop