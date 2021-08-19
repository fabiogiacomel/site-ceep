
@extends('layouts.app')
@section('content')
    <h3>Informações para preencher ficha do conselho
        <a class='btn btn-success' href='{{action("ConselhoInformacaoController@create")}}'>
            Adicionar informação
        </a>
    </h3>
    <table class='table table-striped table-bordered table-hover'>
        <tr><th>#</th><th>Nome</th><th>Descrição</th><th>Categoria</th><th>Criado em</th><th>Ações</th></tr>
            @foreach ($informacoes as $m)
                <tr>
                <td>{{$m->id}}</td>
                <td>{{$m->nome}}</td>
                <td>{{$m->descricao}}</td>
                <td>{{$m->categoria->nome}}</td>
                <td>{{$m->created_at->format('d/m/Y')}}</td>
                <td>
                    {{--<a class='btn btn-success' href='{{action('ConselhoInformacaoController@show', $d->id)}}'>
                        <i class='material-icons'>info</i>
                    </a>
                    <form action='/conselho-informacao/{{$d->id}}' method='post'>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class='btn btn-danger'>
                            <i class='material-icons'>delete</i>
                        </button>
                    </form>
                    <a class='btn btn-warning' href='{{action('ConselhoInformacaoController@edit', $d->id)}}'>
                        <i class='material-icons'>edit</i>
                    </a>--}}
            </td>
        </tr>
    @endforeach
    </table>
@stop