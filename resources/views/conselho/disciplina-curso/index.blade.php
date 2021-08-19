
@extends('layouts.app')
@section('content')
    <h3>Disciplinas
        <a class='btn btn-success' href='{{action("DisciplinaCursoController@create")}}'>
            Adicionar disciplina
        </a>
    </h3>
    <table class='table table-striped table-bordered table-hover'>
        <tr><th>#</th><th>Curso</th><th>Serie</th><th>Nome</th></tr>
            @foreach ($disciplinas as $m)
                <tr>
                <td>{{$m->id}}</td>
                <td>{{$m->curso}}</td>
                <td>{{$m->serie}}</td>
                <td>{{$m->nome}}</td>
        </tr>
    @endforeach
    </table>
@stop