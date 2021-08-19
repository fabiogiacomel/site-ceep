
    <div class='row justify-content-center'>
        <div class='col-xl-8 col-12'>
            <div class='card px-2'>
                <div class='card-header'>
                    <h4 class='card-title'>{{isset($planejamento_retorno) ? 'Editar Planejamento_retorno' : 'Nova Planejamento_retorno' }}</h4>
                    <a class='heading-elements-toggle'><i class='la la-ellipsis-v font-medium-3'></i></a>
                </div>
                <div class='card-content collapse show'>
                    <div class='card-body'>
                        @if (isset($planejamento_retorno))
                        <form method='post' action="{{route('planejamento_retorno.update', ['id'=>$planejamento_retorno->id])}}" enctype='multipart/form-data'>
                        {!! method_field('PUT')!!}
                        @else
                        <form action="{{ route('planejamento_retorno.store') }}" method='POST' class='form form-horizontal' enctype='multipart/form-data'>
                        @endif
                            @csrf
                            <div class='form-body'>
                                <h4 class='form-section'><i class='icon-notebook'></i> Dados da Planejamento_retorno</h4><div class='form-group row'>
                                    <div class='col-md-12'>
                                        <label for='idplanejamento_retorno'>idplanejamento_retorno</label>
                                        <input type='text' id='idplanejamento_retorno' class='form-control' placeholder='' name='IDPLANEJAMENTO_RETORNO' value="{{$planejamento_retorno->IDPLANEJAMENTO_RETORNO ?? old('IDPLANEJAMENTO_RETORNO')}}">
                                    </div>
                                </div><div class='form-group row'>
                                    <div class='col-md-12'>
                                        <label for='idplanejamento'>idplanejamento</label>
                                        <input type='text' id='idplanejamento' class='form-control' placeholder='' name='IDPLANEJAMENTO' value="{{$planejamento_retorno->IDPLANEJAMENTO ?? old('IDPLANEJAMENTO')}}">
                                    </div>
                                </div><div class='form-group row'>
                                    <div class='col-md-12'>
                                        <label for='idusuario'>idusuario</label>
                                        <input type='text' id='idusuario' class='form-control' placeholder='' name='IDUSUARIO' value="{{$planejamento_retorno->IDUSUARIO ?? old('IDUSUARIO')}}">
                                    </div>
                                </div><div class='form-group row'>
                                    <div class='col-md-12'>
                                        <label for='data'>data</label>
                                        <input type='text' id='data' class='form-control' placeholder='' name='DATA' value="{{$planejamento_retorno->DATA ?? old('DATA')}}">
                                    </div>
                                </div><div class='form-group row'>
                                    <div class='col-md-12'>
                                        <label for='observacao'>observacao</label>
                                        <input type='text' id='observacao' class='form-control' placeholder='' name='OBSERVACAO' value="{{$planejamento_retorno->OBSERVACAO ?? old('OBSERVACAO')}}">
                                    </div>
                                </div><div class='form-group row'>
                                    <div class='col-md-12'>
                                        <label for='arquivo'>arquivo</label>
                                        <input type='text' id='arquivo' class='form-control' placeholder='' name='ARQUIVO' value="{{$planejamento_retorno->ARQUIVO ?? old('ARQUIVO')}}">
                                    </div>
                                </div><div class='form-group row'>
                                    <div class='col-md-12'>
                                        <label for='situacao'>situacao</label>
                                        <input type='text' id='situacao' class='form-control' placeholder='' name='SITUACAO' value="{{$planejamento_retorno->SITUACAO ?? old('SITUACAO')}}">
                                    </div>
                                </div><div class='form-actions'>
                                <a href="{{ url('/dashboard/planejamento_retorno') }}"><button type='button'
                                        class='btn btn-uni-danger mr-1'>
                                        Cancelar <i class='ft-x'></i>
                                    </button></a>
                                <button type='submit' class='btn btn-uni-success'>
                                        {{isset($planejamento_retorno) ? 'Salvar alteração' : 'Salvar' }} <i class='ft-play'></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>