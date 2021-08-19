
@extends('layouts.app')
@section('content')
    <h3>Informações para preencher ficha do conselho
        <a class='btn btn-success' href='{{action("ConselhoCategoriaController@create")}}'>
            Adicionar Categoria de Informação'  
        </a>
    </h3>
    <table class='table table-striped table-bordered table-hover'>
        <tr><th>#</th><th>Nome</th><th>Criado em</th><th>Ações</th></tr>
            @foreach ($categorias as $c)
                <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->nome}}</td>
                <td>
                    @if(isset($c->created_at)){{$c->created_at->format("d/m/Y")}}@endif</td>
                <td>
                    {{--<a class='btn btn-success' href='{{action('ConselhoCategoriaController@show', $d->id)}}'>
                        <i class='material-icons'>info</i>
                    </a>
                    <form action='/conselho-categoria/{{$d->id}}' method='post'>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class='btn btn-danger'>
                            <i class='material-icons'>delete</i>
                        </button>
                    </form>
                    <a class='btn btn-warning' href='{{action('ConselhoCategoriaController@edit', $d->id)}}'>
                        <i class='material-icons'>edit</i>
                    </a>--}}
            </td>
        </tr>
    @endforeach
    </table>
@stop