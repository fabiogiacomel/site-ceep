
@extends('layouts.app')
@section('content')
    <h3>Disciplinas
        <a class='btn btn-success' href='{{action("ConselhoDisciplinaController@create")}}'>
            Adicionar disciplina
        </a>
    </h3>
    <table class='table table-striped table-bordered table-hover'>
        <tr><th>#</th><th>Nome</th><th>Descrição</th></tr>
            @foreach ($disciplinas as $m)
                <tr>
                <td>{{$m->id}}</td>
                <td>{{$m->nome}}</td>
        </tr>
    @endforeach
    </table>
@stop