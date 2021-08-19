
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css">
@endsection
@section('content')
    <h3>Meus registros
        <a class='btn btn-success' href='{{action("ConselhoDisciplinaController@createSimplificado")}}'>
            Novo registro simplificado
        </a>
        <a class='btn btn-info' href='{{action("ConselhoDisciplinaController@createCompleto")}}'>
            Novo registro completo (Fim do trimestre)
        </a>
    </h3>
    @php
        $turmas = array(
            1 => "Turma A",
            2 => "Turma B",
            3 => "Turma C",
            4 => "Turma B (Tarde)",
            5 => "Turma (Noturno)"
        );
    @endphp
    <table class='table table-striped table-bordered table-hover'>
   <!--     <tr>
            <th>Criado em</th>
            <th>Informação</th>
             <th>Ações</th>
    </tr> -->    
        
        @php 
            $disciplina = 0; 
            $aluno = 0;
            $count = 0;
        @endphp
        @foreach($registros as $r)
            @php $count++; @endphp
            @if($disciplina != $r->conselho_disciplina_id)
                <tr>
                    <th colspan="3">{{ $r->conselho_disciplina_id }} - Registro de: {{ $r->disciplina->professor }} para: {{ $r->disciplina->curso2->nome }} - {{ $r->disciplina->serie }} Série/Semestre - {{ $turmas[$r->disciplina->turma] }} - {{ $r->disciplina->disciplina }}</th>
                </tr>
                @php $disciplina = $r->conselho_disciplina_id @endphp
            @endif

            @if($aluno != $r->aluno)
                <tr class="mt-3">
                    <th colspan="3">Aluno: {{ $r->aluno}}</th>
                </tr>
                @php $aluno = $r->aluno @endphp
            @endif
            <tr>
                <td>{{ $r->created_at->format('d/m/Y') }}</td>
                <td>{{ $r->informacao->nome}}</td>

               <td>
                    
                    <form action='/conselho-registro/{{$r->id}}' method='post'>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class='btn btn-danger'>
                            <i class='fa fa-trash'></i>
                            
                        </button>
                    </form>
                    {{--<a class='btn btn-success' href='{{action('ConselhoCategoriaController@show', $d->id)}}'>
                        <i class='material-icons'>info</i>
                    </a><a class='btn btn-warning' href='{{action('ConselhoCategoriaController@edit', $d->id)}}'>
                        <i class='material-icons'>edit</i>
                    </a>--}}
                </td>
        </tr>
        @endforeach
        
    </table>
    Total de registros: {{ $count}} 
@stop
