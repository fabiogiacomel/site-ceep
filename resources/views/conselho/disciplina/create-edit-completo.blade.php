@extends('layouts.app')
@section('content')

@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (isset($disciplina))
<form method="post" action="{{route('conselho-disciplina.update', ['id'=> $disciplina ->id])}}" enctype="multipart/form-data">
    {!! method_field('PUT')!!}
    @else
    <form action="{{route('conselho-disciplina.store')}}" method='post'>
    @endif

    {{ csrf_field() }}
        <input type='hidden' name='completo' value='true' />

        <div class='form-group'>
            <div class="row">
                <div class='col-md-8'>
                    <label for='curso'>Curso</label>
                    <select name="curso" id="idcurso" onchange="getval(this);" class='form-control' required>
                        <option value="">Selecione </option>
                        @foreach ($cursos as $c)
                        <option value="{{$c->idcurso}}" @if(isset($disciplina) && ($disciplina->
                            curso == $c->idcurso))
                            selected
                            @else
                            {{ old('curso')==$c->idcurso ? 'selected' : '' }}
                            @endif>{{$c->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class='col-md-4'>
                    <label for='periodo'>Periodo</label>
                    <select name="periodo" class='form-control' required>
                        <option value="">Selecione </option>
                        <option value="M" {{ old('periodo')=='M' ? 'selected' : '' }}>Manhã</option>
                        <option value="T" {{ old('periodo')=='T' ? 'selected' : '' }}>Tarde</option>
                        <option value="N" {{ old('periodo')=='N' ? 'selected' : '' }}>Noite</option>
                    </select>
                </div>
            </div>
        </div>

        <div class='form-group'>
            <label> Série: </label>
            <div class="row">
                <div class='col-md-3'>
                    <input type='radio' onchange="getval(this);" class="serie" name='serie' value='1' required><label for='curso'>1ª Série/Semestre</label>
                </div>
                <div class='col-md-3'>
                    <input type='radio' onchange="getval(this);" class="serie" name='serie' value='2' required><label for='curso'>2ª Série/Semestre</label>
                </div>
                <div class='col-md-3'>
                    <input type='radio' onchange="getval(this);" class="serie" name='serie' value='3' required><label for='curso'>3ª Série/Semestre</label>
                </div>
                <div class='col-md-3'>
                    <input type='radio' onchange="getval(this);" class="serie" name='serie' value='4' required><label for='curso'>4ª Série/Semestre</label>
                </div>      
            </div>
        </div>
        <div class="col-md-12">
            <label> Turma: </label>
        </div>
        <div class="row">
           <div class='col'>
               <input type='radio' name='turma' value='1' required><label for='curso'> Turma A</label>
            </div> 
            <div class='col'>
                <input type='radio' name='turma' value='2' required><label for='curso'> Turma B</label>
            </div> 
           {{--  <div class='col'>
                <input type='radio' name='turma' value='4' required><label for='curso'> Turma B (Tarde) </label>
            </div>  --}}
            <div class='col'>
                <input type='radio' name='turma' value='3' required><label for='curso'> Turma C</label>
            </div> 
            {{-- <div class='col'>
                <input type='radio' name='turma' value='5' required><label for='curso'> Turma B (Noite)</label>
            </div> 
            <div class='col'>
                <input type='radio' name='turma' value='5' required><label for='curso'> Turma C (Noite)</label>
            </div>  --}}
        </div>
        <div id="msg_estagio" style="display:none" class="alert alert-info"><strong>Atenção: </strong>Para as disciplinas de estágio informe o período relativo ao curso (manhã ou noite) e adicione a palavra "estagio" antes do nome da disciplina. </div>
        <div class='form-group'>
            <label>Disciplina</label>
            <select name="disciplina" id="disciplina" class="form-control" required>
                <option value=""> Selecione o curso e a turma primeiro</option>
            </select>
        </div>
        <div class='form-group'>
            <label>Professor</label>
            <input type="text" name='professor' value='{{Auth::user()->name }}' class='form-control'/>
        </div>
    @if (isset($disciplina))
        <button type="submit" class="btn btn-primary btn-block">Alterar</button>
    @else
        <button type="submit" class="btn btn-primary btn-block">Próximo</button>
    @endif
    </form>



    <script>

        function getval(sel)
        {
            var curso = $('#idcurso').val();
            var serie = $( 'input[name=serie]:checked' ).val();
         
            $.getJSON('/api/conselho-disciplina-curso/?curso='+curso+'&serie='+serie, 
            function (dados){
                console.log(dados.message);
                if (dados.message.length > 0){   
                    var option = '<option value="">Selecione a disciplina</option>';
                    $.each(dados.message, function(i, obj){
                        option += '<option value="'+obj.id+'">'+obj.nome+'</option>';
                    })
                   console.log(option)
                    $('#disciplina').html(option);
                }else{
                    console.log('nenhuma disciplina')
                }
            })
        }

    </script>
    @stop
