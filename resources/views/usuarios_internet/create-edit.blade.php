@extends('layouts.app')
@section('content')

<h1>{{!$usuarios_internet==null ? 'Editar Usuarios_internet' : 'Cadastrar Usuarios_internet'}}</h1>
@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (!$usuarios_internet==null)
<form method="post" action="{{route('usuarios_internet.update', ['id'=> $usuarios_internet ->id])}}" enctype="multipart/form-data">
    {!! method_field('PUT')!!}
    @else
    <form action="{{route('usuarios_internet.store')}}" method='post'>
    @endif

    {{ csrf_field() }}
        <div class='form-group'>
            <label>cgm</label>       
            <input name='cgm' value='{{$usuarios_internet==null ? old("cgm") : $usuarios_internet->cgm }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>nome</label>       
            <input name='nome' value='{{$usuarios_internet==null ? old("nome") : $usuarios_internet->nome }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>senha</label>       
            <input name='senha' value='{{$usuarios_internet==null ? old("senha") : $usuarios_internet->senha }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>email</label>       
            <input name='email' value='{{$usuarios_internet==null ? old("email") : $usuarios_internet->email }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>situacao</label>       
            <input name='situacao' value='{{$usuarios_internet==null ? old("situacao") : $usuarios_internet->situacao }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>cgm_md5</label>       
            <input name='cgm_md5' value='{{$usuarios_internet==null ? old("cgm_md5") : $usuarios_internet->cgm_md5 }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>data_cadastro</label>       
            <input name='data_cadastro' value='{{$usuarios_internet==null ? old("data_cadastro") : $usuarios_internet->data_cadastro }}' class='form-control'/>
        </div>
    @if (isset($usuarios_internet))
        <button type="submit" class="btn btn-primary btn-block">Alterar</button>
    @else
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    @endif
    </form>
    @stop