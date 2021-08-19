@extends('layouts.app')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
<style>
    table{
        width: 100%;
    }
    .table td,
    .table th {
        padding: 5px !important;
        border-right: solid 1px #fde;
    }

    .col-striped {
        background-color: #EdEdEd !important;
        color: #444 !important;
    }

    /* .col-striped-light{
    background-color: #def !important;
    color: #444 !important;
} */
    td {
        text-align: center;
        font-size: 0.8em;
        /* background-color: #ded !important;
    color: #444 !important; */
    }

    td.checkbox{
        width: 25px !important;
    }
</style>
@endsection

@section('content')

@php
$turmas = array(
1 => "Turma A",
2 => "Turma B",
3 => "Turma C",
4 => "Turma B (Tarde)",
5 => "Turma (Noturno)"
);
@endphp

<h5>Registro de: {{ $disciplina['professor'] }} para: {{ $curso->nome }} - {{ $disciplina['serie'] }} Série/Semestre -
    {{ $turmas[$disciplina['turma']] }} - {{ $disciplina['disciplina_nome'] }}</h5>
@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (isset($categoria))
<form method="post" action="{{route('conselho-registro.update', ['id'=> $registro ->id])}}"
    enctype="multipart/form-data">
    {!! method_field('PUT')!!}

    @else
    <form action="{{route('conselho-registro.store')}}" method='post'>
        @endif
        {{ csrf_field() }}
        <input type="hidden" name="curso" value="{{ $disciplina['curso'] }}">
        <input type="hidden" name="serie" value="{{ $disciplina['serie'] }}">
        <input type="hidden" name="turma" value="{{ $disciplina['turma'] }}">
        <input type="hidden" name="disciplina" value="{{ $disciplina['disciplina'] }}">
        <input type="hidden" name="professor" value="{{ $disciplina['professor'] }}">
        <input type="hidden" name="user_id" value="{{ $disciplina['user_id'] }}">
        <input type="hidden" name="periodo" value="{{ $disciplina['periodo'] }}">

        <table>
        @foreach($categorias as $cat)
        @php
            $count = 0;
        @endphp
            <tr>
                <td colspan="51">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="51" class="col-striped text-left">{{$cat->nome}}</td>
            </tr>
            <tr>
                <td>Aluno n°</td>
                @for ($i = 1; $i <= 50; $i++) 
                    @if($i % 2==0) 
                        <td>
                    @else
                        <td class="col-striped">
                    @endif
                    <label>{{ $i }} </label></td>
                @endfor
            </tr>

            @php 
                if(isset($tipo) && $tipo='completo'){
                    $informacoes = $cat->informacoesTodas;
                }else{
                    $informacoes = $cat->informacoes;
                }
                //dd($informacoes);
            @endphp
            @foreach($informacoes as $info)
            @php
                $count++;
                if($count > 7){
                    $count =0;
                    echo '<tr>
                        <td>Aluno n°</td>';
                        for ($i = 1; $i <= 50; $i++){
                            if($i % 2==0) {
                                echo '<td>';
                            }else{
                                echo '<td class="col-striped">';
                            }
                            echo '<label>'.$i.'</label></td>';
                        }
                    echo '</tr>';
                }
            @endphp
            <tr>
                <td>{{$info->nome}}
                    @if($info->nome !== $info->descricao)
                    <i class="far fa-question-circle" data-toggle="tooltip" data-placement="top"
                    title="{{$info->descricao}}"></i>


                    {{-- <button type="button" class="btn btn-secondary m0 p0" data-toggle="tooltip" data-placement="top"
                        title="{{$info->descricao}}">
                        ?
                    </button> --}}
                    @endif
                </td>
                @for ($i = 1; $i <= 50; $i++) @if($i % 2==0) 
                    <td class="col-striped-light checkbox">
                    @else
                    <td class="col-striped checkbox">
                        @endif
                        <input name="info[{{$info->id}}][]" type="checkbox" value="{{$i}}" /></td>
                    @endfor
            </tr>
            @endforeach
        @endforeach
    </table>

        <button type="submit" class="btn btn-primary btn-block">SALVAR</button>
    </form>
    @stop