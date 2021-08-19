@extends('layouts.app')

@section('css')

<style>
  .new-page{
    page-break-after: always;
  }


</style>
@endsection

@section('content')
<div class="container">
@php
  $curso = 0;
  $turma =0;
  $serie =0;
  $categoria = 0;
  $series = array(
                 '1' => "1_ANO",
                 '2' => "2_ANO",
                 '3' => "3_ANO",
                 '4' => "4_ANO",
                 '5' => "1_SEM",
                 '6' => "2_SEM",
                 '7' => "3_SEM",
                 '8' => "4_SEM"
            );
    $turmas = array(
      1 => "Turma A",
      2 => "Turma B (Manhã)",
      3 => "Turma C (Tarde)",
      4 => "Turma B (Tarde)",
      5 => "Turma (Noturno)"
    );
@endphp


@foreach ($registros as $reg)

  @if(($curso !== $reg->disciplina2->curso) || ($serie !== $reg->disciplina2->serie) || ($turma !== $reg->disciplina2->turma))
    @if($curso !== 0)
      </table>
    @endif  
  
    <table class="table table-responsive new-page">
      <tr><th>Curso: {{$reg->disciplina->curso2->nome}}</th><th>Série: {{$reg->disciplina2->serie}} Série/Semestre</th><th> {{$turmas[$reg->disciplina2->turma]}}</th></tr>
      <tr class="table-dark">
        <td colspan="2">Informação</td><td>Quantidade</td>
      </tr>
    @php
      $curso = $reg->disciplina2->curso;
      $turma = $reg->disciplina2->turma;
      $serie = $reg->disciplina2->serie;
    @endphp
  @endif  
  @if(($categoria !== $reg->informacao->categoria->id))
  <tr><td colspan="3"><b>{{$reg->informacao->categoria->nome}}</td> </tr>
    @php $categoria = $reg->informacao->categoria->id; @endphp
@endif
  <tr>
      
      <td colspan="2">{{$reg->informacao->nome}}</td><td class="col-striped-light">{{$reg->total}}</td>
  </tr>

  @endforeach
</table>
</div>
@endsection

@section('js')

@endsection