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
<form method="post" action="{{route('conselho-disciplina-curso.update', ['id'=> $disciplina ->id])}}" enctype="multipart/form-data">
    {!! method_field('PUT')!!}
    @else
    <form action="{{route('conselho-disciplina-curso.store')}}" method='post'>
    @endif

    {{ csrf_field() }}
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
            </div>
        </div>
        <div class='form-group'>
            <label> Série: </label>
            <div class="row">
                <div class='col-md-3'>
                    <input type='radio' name='serie' value='1' required><label for='curso'>1ª Série/Semestre</label>
                </div>
                <div class='col-md-3'>
                    <input type='radio' name='serie' value='2' required><label for='curso'>2ª Série/Semestre</label>
                </div>
                <div class='col-md-3'>
                    <input type='radio' name='serie' value='3' required><label for='curso'>3ª Série/Semestre</label>
                </div>
                <div class='col-md-3'>
                    <input type='radio' name='serie' value='4' required><label for='curso'>4ª Série/Semestre</label>
                </div>      
            </div>
        </div>
        <div class='form-group'>
            <label>Disciplina</label>
            <input type="text" name='nome' value='{{$disciplina->nome ?? old("nome") }}' class='form-control'/>
        </div>
        @if (isset($disciplina))
            <button type="submit" class="btn btn-primary btn-block">Alterar</button>
        @else
            <button type="submit" class="btn btn-primary btn-block">Salvar</button>
        @endif
    </form>

    <script>
        function getval(sel)
        {
            if(sel.value == 17){
                document.getElementById('msg_estagio').style.display = 'block';
            }else{
                document.getElementById('msg_estagio').style.display = 'none';
            }
        }
    </script>
    @stop
