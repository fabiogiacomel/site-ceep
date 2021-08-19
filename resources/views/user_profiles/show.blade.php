
@extends('layouts.app')
@section('content')
    <h1>Detalhes: </h1>
    <ul>
        <li><b>user_id:</b>{{$user_profiles->user_id}}</li>
        <li><b>profiles_id:</b>{{$user_profiles->profiles_id}}</li>
        <li><b>created_at:</b>{{$user_profiles->created_at}}</li>
        <li><b>updated_at:</b>{{$user_profiles->updated_at}}</li>
    </ul>@stop