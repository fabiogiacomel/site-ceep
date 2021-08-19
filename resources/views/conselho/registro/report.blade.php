@extends('layouts.app')

@section('css')

@endsection

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

<form action="{{route('conselho.report')}}" method='post'>
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-3">
            <label>Data inicial</label>
            <input type="date" class="form-control" name="data_ini" value="{{ old('data_ini') }}">
        </div>
        <div class="col-md-3">
            <label>Data final</label>
            <input type="date" class="form-control" name="data_fim" value="{{ old('data_fim') }}">
        </div>
        <div class="col-md-3">
            <label for='curso'>curso</label>
            <select name="curso" class='form-control' required>
                <option value="0">Todos</option>
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
        <div class="col-md-3">
            <label>Tipo de relatório</label><br>
            <input type='checkbox' name='tipo' value='1'><label for='tipo'>Um Aluno por página</label> <br />
            <input type='checkbox' name='modelo' value='1'><label for='modelo'>Modelo fechamento trimestral</label> 
        </div>
    </div>
    <div class="row  mt-2">
        <div class="col">
            <label> Série: </label>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label> </label>
            <input type='radio' name='serie' value='0' required><label for='curso'>Todos</label>
        </div>
        <div class='col'>
            <label></label>
            <input type='radio' name='serie' value='1' required><label for='curso'>1ª Série/Semestre</label>
        </div>
        <div class='col'>
            <label></label>
            <input type='radio' name='serie' value='2' required><label for='curso'>2ª Série/Semestre</label>
        </div>
        <div class='col'>
            <label></label>
            <input type='radio' name='serie' value='3' required><label for='curso'>3ª Série/Semestre</label>
        </div>
        <div class='col'>
            <label></label>
            <input type='radio' name='serie' value='4' required><label for='curso'>4ª Série/Semestre</label>
        </div>      
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <label> Turma: </label>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label> </label>
            <input type='radio' name='turma' value='0' required><label for='curso'> Todos</label>
        </div> 
        <div class='col'>
                <label></label>
            <input type='radio' name='turma' value='1' required><label for='curso'> Turma A</label>
        </div> 
        <div class='col'>
                <label></label>
            <input type='radio' name='turma' value='2' required><label for='curso'> Turma B (Manhã) </label>
        </div> 
        <div class='col'>
                <label></label>
            <input type='radio' name='turma' value='4' required><label for='curso'> Turma B (Tarde) </label>
        </div> 
        <div class='col'>
                <label></label>
            <input type='radio' name='turma' value='3' required><label for='curso'> Turma C</label>
        </div> 
        <div class='col'>
            <label></label>
        <input type='radio' name='turma' value='5' required><label for='curso'>Turmas Noturno</label>
    </div> 
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <label></label>
            <button type="submit" class="btn btn-primary btn-block">Gerar relatório</button>
        </div>
    </div>
</form>
@stop
