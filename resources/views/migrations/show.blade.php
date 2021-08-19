
@extends('layouts.app')
@section('content')
    <h1>Detalhes: </h1>
    <ul>
        <li><b>id:</b>{{$migrations->id}}</li>
        <li><b>migration:</b>{{$migrations->migration}}</li>
        <li><b>batch:</b>{{$migrations->batch}}</li>
    </ul>@stop