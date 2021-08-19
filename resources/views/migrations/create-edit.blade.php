@extends('layouts.app')
@section('content')

<h1>{{!$migrations==null ? 'Editar Migrations' : 'Cadastrar Migrations'}}</h1>
@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (!$migrations==null)
<form method="post" action="{{route('migrations.update', ['id'=> $migrations ->id])}}" enctype="multipart/form-data">
    {!! method_field('PUT')!!}
    @else
    <form action="{{route('migrations.store')}}" method='post'>
    @endif

    {{ csrf_field() }}
        <div class='form-group'>
            <label>migration</label>       
            <input name='migration' value='{{$migrations==null ? old("migration") : $migrations->migration }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>batch</label>       
            <input name='batch' value='{{$migrations==null ? old("batch") : $migrations->batch }}' class='form-control'/>
        </div>
    @if (isset($migrations))
        <button type="submit" class="btn btn-primary btn-block">Alterar</button>
    @else
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    @endif
    </form>
    @stop