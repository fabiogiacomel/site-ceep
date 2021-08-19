@extends('layouts.app')
@section('css')
<style>

</style>

@endsection

@section('content')
    @php
        $turmas = array(
            1 => "Turma A",
            2 => "Turma B",
            3 => "Turma C",
        );
        $periodos = array(
            'M' => 'Manhã',
            'T' => 'Tarde',
            'N' => 'Noite'
        );
    @endphp

    @php
        $count = 0;
        $idaluno = 0;
        $idcurso = 0;
        $idserie = 0;
        $idturma = 0;
        $disciplina = "Não Informada";
    @endphp
    @for ($i = 1; $i < 50; $i++)
    @foreach ($registros as $disciplinas) 
    @foreach ($disciplinas as $d)
        @php $count++; @endphp


        {{--Cria o cabeçalho cada vez que mudar de curso --}
        @if($idcurso != $d->curso)
            @php
                $idcurso = $d->curso;
                $idserie = $d->serie;
                $idturma = $d->turma;
            @endphp
            @include('conselho.report.cabecalho')
        @endif--}}

        <table class="table table-bordered" style="width:100%;text-transform: uppercase">
            <tr>
                <td colspan="2">ALUNO (a):     __________________________________________________________________________________</td><td>  N° {{$i}} </td>
            </tr>
            <tr>  
                <td @if($count > 1) class="new-page" @endif >
                        CURSO TÉCNICO EM  {{$d->curso2->nome}}  </td><td>  SÉRIE: {{$d->serie}}ª SÉRIE {{$turmas[$d->turma]}}  </td><td>    PERÍODO {{$periodos[$d->periodo]}}
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <td class="small">DISCIPLINAS</td>
                @foreach ($disciplinasCurso as $di)
                    <td class="small" colspan="3">{{$di->nome}}</td>
                @endforeach
            </tr>
            <tr>
                <td class="small">TRIMESTRES</td>
                @foreach ($disciplinasCurso as $di)
                    <td class="small">1º</td>
                    <td class="small">2º</td>
                    <td class="small">3º</td>
                @endforeach
            </tr>

            {{--@php dd($d); @endphp--}}
            @foreach ($categorias as $cat)
                <tr>
                <td class="small bg-info" colspan="{{((count($disciplinasCurso)*3)+1)}}"> {{ $cat->nome }}</td>
                </tr>
                @foreach ($cat->informacoesTodas as $info)
                    <tr>
                        <td class="small">{{ $info->nome }}</td>
                        @foreach ($disciplinasCurso as $di)
                            @foreach ($d->registros as $r)
                                @php //dd($r); @endphp
                                @if (($r->conselho_informacao_id == $info->id) 
                                    && ($r->aluno == $i)
                                    && ($r->disciplina->disciplina == $di->id))
                                    <td>{{ 'X' }}</td> 
                                @else
                                    <td></td>
                                @endif
                            @endforeach
                        @endforeach
                    </tr>
                @endforeach
            @endforeach
        </table>
{{--
        @if ($idaluno != $r->aluno)
            @php
                $idaluno = $r->aluno;
                $disciplina = "Não informada";
                
            @endphp
            @if(isset($tipo) && $tipo==1)
                <h2  @if($count > 1) class="new-page" @endif>Curso: {{$r->disciplina2->curso2->nome}} - Série: {{$r->serie}} Série/Semestre - Turma: {{$turmas[$r->turma]}}</h2>
                 <div class="new-page"></div>
            @endif
            <h3>ALUNO N°: {{$r->aluno}} </h3>
        @endif

        @if ($disciplina !=$r->disciplina)
            @php
                $disciplina = $r->disciplina;
            @endphp
            <h5>DISCIPLINA: {{ strtoupper($r->disciplina) }} - PROFESSOR: {{ strtoupper($r->disciplina2->professor) }}</h5>
          
            
        @endif
            <p>{{ $r->created_at->format('d/m/Y') }} - {{$r->informacao->descricao}}</p>  --}}
            @endforeach
            @endforeach
            @endfor    
            

        {{--   <tr> 
                <th colspan='2'>Professor:</th>
                <th colspan='4'> {{$r->professor}}</th>
                <th colspan='2'>Disciplina:</th>
                <th colspan='4'> {{$r->disciplina}}</th>
            </tr>
        </table>


        <table border='1'><tr>
            <tr>
                <td>Aluno Nº:  {{ $r->aluno }} </td> 
                <td>{{$r->informacao->nome }}</td></tr>
            </tr>
        </table>
    @endforeach
   

   <!-- <table class='table table-striped table-bordered table-hover'>
        <tr>
            <th>Criado em</th>
            <th>Informação</th>
<!-             <th>Ações</th>
 --       </tr>
        

        {{--<td colspan="2">Registro de: {{ $registros[0]->disciplina->professor }}
         para: {{ $registros[0]->disciplina->curso2->nome }} - 
         {{ $registros[0]->disciplina->serie }} Série/Semestre - 
         {{ $turmas[$registros[0]->disciplina->turma] }} -
          {{ $registros[0]->disciplina->disciplina }}</td>--}

        <tr>
        </tr>
        @php 
            $aluno = 0;
        @endphp
        @foreach ($registros as $r)
            @if($aluno != $r->aluno)
                <tr>
                    <td colspan="2">Aluno: {{ $r->aluno}}</td>
                </tr>
                @php $aluno = $r->aluno @endphp
            @endif
            <tr>
            <!-- <td>{{ $r}}</td> -->
            
            <td>{{ $r->created_at->format('d/m/Y') }}</td>
            <td>{{ $r->informacao->nome}}</td>
            {{--<td>{{$c->informacao_id}}</td>
            <td>{{$c->created_at->format("d/m/Y")}}</td>
            <td>
                <a class='btn btn-success' href='{{action('ConselhoCategoriaController@show', $d->id)}}'>
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
                </a>
            </td>
        </tr>
        @endforeach
    </table>-->--}}
    {{-- Total de registros: {{ $count}} --}} 

@stop
