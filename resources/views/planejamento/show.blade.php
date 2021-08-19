@extends('layouts.app')
@section('content')
<div class='content-header-left col-md-6 col-12 mb-2'>
    <h3 class='content-header-title'>Meus Planejamentos 
            <a class='btn btn-success text-bold-600' href="{{ route('planejamento.create')}}" >Criar Planejamento</a>  
            <!--<a class='btn btn-secondary text-bold-600' href="#" >Criar Planejamento</a>-->
        </h3>

    <div class='row breadcrumbs-top'>
        <div class='breadcrumb-wrapper col-12'>
            <ol class='breadcrumb'>
                <li class='breadcrumb-item'><a href='{{ url("/home") }}'>Home</a>
                </li>
                <li class='breadcrumb-item active'>planejamento
                </li>
            </ol>
        </div>
    </div>
</div>

<div class='row justify-content-center'>
    <div class='col-xl-10 col-12'>


        <table class='table table-striped table-bordered ' style='' id='table_Planejamento'>
            <thead>
                <tr class=''>
                    <th>curso</th>
                    <th>serie</th>
                    <th>turma</th>
                    <th>disciplina</th>
                    <th>arquivo</th>
                    <th>data</th>
                    {{-- <th>situacao</th> --}}
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($planejamentos as $dados)
                <tr>
                    <td> {{ $dados->curso2->nome }} </td>
                    @switch($dados->serie)
                        @case(1)
                             <td>1º Ano</td>
                            @break
                        @case(2)
                            <td>2º Ano</td>
                            @break
                        @case(3)
                            <td>3º Ano</td>
                            @break
                        @case(4)
                            <td>4º Ano</td>
                            @break
                        @case(5)
                            <td>1º Semestre</td>
                            @break
                        @case(6)
                            <td>2º Semestre</td>
                            @break
                        @case(7)
                            <td>3º Semestre</td>
                            @break
                        @case(8)
                            <td>4º Semestre</td>
                            @break
                        @default
                            <td>{{$dados->serie}}</td>
                            @break
                    @endswitch

                    <td> {{ $dados->turma }} </td>
                    <td> {{ $dados->disciplina }} </td>
                    <td><a href="{{ $dados->arquivo }}" class="btn btn-primary">Download</a></td>
                    <td> {{ Date("d/m/Y", strtotime($dados->DATA)) }} </td>
                    {{-- <td> {{ $dados->situacao }} </td> --}}
                     <td>
                        <a href='javascript:;' title='Remover' class='btn btn-sm btn-danger delete'
                                            data-id='{{ $dados->idplanejamento}}' id='delete-2'>
                                            <i class='icon-trash'></i> <span class='hidden-xs hidden-sm'>Remover</span>
                                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
<!--/ Zero configuration table -->

<div class='modal modal-danger fade' tabindex='-1' id='delete_modal' role='dialog'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>

                <h5 class='modal-title'><i class='voyager-trash'></i> Tem certeza de que deseja remover este
                    Planejamento?</h5><button type='button' class='close' data-dismiss='modal' aria-label='Fechar'><span
                        aria-hidden='true'>&times;</span></button>
            </div>
            <div class='modal-footer'>
                <form action='#' id='delete_form' method='POST'>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type='submit' class='btn btn-danger pull-right delete-confirm' value='Sim, Remover!'>
                </form>
                <button type='button' class='btn btn-default pull-right' data-dismiss='modal'>Cancelar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection

@section('js')

<script src='//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>

<script>
    $(document).ready(function () {
        // $('#table_anuncios').dynatable();
        //$('#table_Planejamento').DataTable();
        $('.delete').on('click', function (e) {
            jQuery.noConflict();
            $('#delete_form')[0].action = '/planejamento/__id'.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });


 });

</script>
@endsection
