@extends('layouts.app')
@section('css')
<style>
    body {
        background-image: url("{{ asset('img/bg.png') }}");
    }

    input[type='checkbox'] {
        width: 20px;
        height: 20px;
    }
    label.turma{
        position: relative;
        top: -1px;
        font-size: 1.3em;
        margin-bottom: 5px;
    }

</style>
@endsection

@section('content')
<div class='row justify-content-center'>
    <div class='col-xl-10 col-12'>
        <div class='card px-2'>
            <div class='card-header'>
                <h4 class='card-title'>{{isset($planejamento) ? 'Editar Planejamento' : 'Novo Planejamento' }}</h4>
                <a class='heading-elements-toggle'><i class='la la-ellipsis-v font-medium-3'></i></a>
            </div>
            <div class='card-content collapse show'>
                <div class='card-body'>
                    @if (isset($planejamento))
                    <form method='post' action="{{route('planejamento.update', ['id'=> $planejamento->id])}}"
                        enctype='multipart/form-data'>
                        {!! method_field('PUT')!!}
                        @else
                    <form action="{{ route('planejamento.store') }}" method='POST' class='form form-horizontal'
                        enctype='multipart/form-data'>
                        @endif
                        @csrf
                        <div class='form-body'>
                            <h4 class='form-section'><i class='icon-notebook'></i> Dados da Planejamento</h4>
                            <div class="row">
                                <div class='col-md-5'>
                                    <label for='curso'>curso</label>
                                    <select name="curso" class='form-control' required>
                                        <option value="">Selecione </option>
                                        @foreach ($curso as $c)
                                        <option value="{{$c->idcurso}}" @if(isset($planejamento) && ($planejamento->
                                            curso == $c->idcurso))
                                            selected
                                            @else
                                            {{ old('curso')==$c->idcurso ? 'selected' : '' }}
                                            @endif>{{$c->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class='col-md-5'>
                                    <label for='serie'>serie</label>
                                    <select name="serie" class="form-control" required>
                                        <option value="">Selecione a série</option>
                                        <option value="1">1° ANO</option>
                                        <option value="2">2° ANO</option>
                                        <option value="3">3° ANO</option>
                                        <option value="4">4° ANO</option>
                                        <option value="5">1° SEMESTRE</option>
                                        <option value="6">2° SEMESTRE</option>
                                        <option value="7">3° SEMESTRE</option>
                                        <option value="8">4° SEMESTRE</option>
                                    </select> </div>

                                <div class='col-md-2'>
                                    <label for='turma'>turma</label><br>
                                    <label class="turma">A</label> <input type="checkbox" name="turma"  value="A">
                                    <label class="turma">B</label> <input type="checkbox" name="turma"  value="B">
                                    <label class="turma">C</label> <input type="checkbox" name="turma"  value="C">
                                </div>
                            </div>
                            <div class='row'><br></div>

                            <div class='row'>
                                <div class='col-md-6'>
                                    <label for='disciplina'>disciplina</label>
                                    <input type='text' id='disciplina' class='form-control' placeholder=''
                                        name='disciplina'
                                        value="{{$planejamento->disciplina ?? old('disciplina')}}"  required>
                                </div>
                                <div class='col-md-6'>
                                    <label for='arquivo'>arquivo</label>
                                    <input type='file' id='arquivo' class='form-control' placeholder=''
                                        name='arquivo' value="{{$planejamento->arquivo ?? old('arquivo')}}"  required>
                                </div>
                            </div>
                            <hr />
                            <div class='form-actions'>

                                <button type='submit' class='btn btn-primary'>
                                    {{isset($planejamento) ? 'Salvar alteração' : 'Salvar' }} <i
                                        class='ft-play'></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
