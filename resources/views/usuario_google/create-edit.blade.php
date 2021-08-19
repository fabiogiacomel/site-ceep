@extends('layouts.app')
@section('content')

<h1>{{!$usuario_google==null ? 'Editar Usuario_google' : 'Cadastrar Usuario_google'}}</h1>
@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (!$usuario_google==null)
<form method="post" action="{{route('usuario_google.update', ['id'=> $usuario_google ->id])}}" enctype="multipart/form-data">
    {!! method_field('PUT')!!}
    @else
    <form action="{{route('usuario_google.store')}}" method='post'>
    @endif

    {{ csrf_field() }}
        <div class='form-group'>
            <label>nome</label>       
            <input name='nome' value='{{$usuario_google==null ? old("nome") : $usuario_google->nome }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>sobrenome</label>       
            <input name='sobrenome' value='{{$usuario_google==null ? old("sobrenome") : $usuario_google->sobrenome }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>email</label>       
            <input name='email' value='{{$usuario_google==null ? old("email") : $usuario_google->email }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>senha</label>       
            <input name='senha' value='{{$usuario_google==null ? old("senha") : $usuario_google->senha }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>email_2</label>       
            <input name='email_2' value='{{$usuario_google==null ? old("email_2") : $usuario_google->email_2 }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>telefone1</label>       
            <input name='telefone1' value='{{$usuario_google==null ? old("telefone1") : $usuario_google->telefone1 }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>telefone2</label>       
            <input name='telefone2' value='{{$usuario_google==null ? old("telefone2") : $usuario_google->telefone2 }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>celular</label>       
            <input name='celular' value='{{$usuario_google==null ? old("celular") : $usuario_google->celular }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>endereco1</label>       
            <input name='endereco1' value='{{$usuario_google==null ? old("endereco1") : $usuario_google->endereco1 }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>endereco2</label>       
            <input name='endereco2' value='{{$usuario_google==null ? old("endereco2") : $usuario_google->endereco2 }}' class='form-control'/>
        </div>
    <div class="form-group">
        <label>empresa_id</label>
        <select name="empresa_id" class="form-control">
        @foreach ($fk as $f)
            <option value="{{$f->id}}">{{$f->social_name}}</option>"
        @endforeach
        </select>
        </div>
        <div class='form-group'>
            <label>empresa_tipo</label>       
            <input name='empresa_tipo' value='{{$usuario_google==null ? old("empresa_tipo") : $usuario_google->empresa_tipo }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>empresa_nome</label>       
            <input name='empresa_nome' value='{{$usuario_google==null ? old("empresa_nome") : $usuario_google->empresa_nome }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>gerente</label>       
            <input name='gerente' value='{{$usuario_google==null ? old("gerente") : $usuario_google->gerente }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>departamento</label>       
            <input name='departamento' value='{{$usuario_google==null ? old("departamento") : $usuario_google->departamento }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>centro_custo</label>       
            <input name='centro_custo' value='{{$usuario_google==null ? old("centro_custo") : $usuario_google->centro_custo }}' class='form-control'/>
        </div>
    @if (isset($usuario_google))
        <button type="submit" class="btn btn-primary btn-block">Alterar</button>
    @else
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    @endif
    </form>
    @stop