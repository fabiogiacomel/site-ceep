@extends('layouts.app')
@section('content')
<div class='content-header-left col-md-12 col-12 mb-2'>
    <h3 class='content-header-title'>Meus documentos da biblioteca <a class='btn btn-success text-bold-600'
            href="{{ route('biblioteca.create')}}">Inserir novo documento</a> </h3>
    <div class='row breadcrumbs-top'>
        <div class='breadcrumb-wrapper col-12'>
            <ol class='breadcrumb'>
                <li class='breadcrumb-item'><a href='{{ url("/home") }}'>Home</a>
                </li>
                <li class='breadcrumb-item active'>Meus documentos
                </li>
            </ol>
        </div>
    </div>
</div>

<div class='row justify-content-center'>
    <div class='col-xl-10 col-12'>


        <table class='table table-striped table-bordered ' style='' id='table_documentos'>
            <thead>
                <tr class=''>
                    <th>Capa</th>
                    <th>Curso</th>
                    <th>Título do documento</th>
                    <th>Data envio</th>
                    <th colspan="3">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documentos as $dados)
                <tr>
                        <td><img style='display:block; width:100px;height:100px;' id='base64image'                 
                            src='{{ $dados->imagem }}' /></td>

                    <td> {{ $dados->curso2->nome }} </td>
                   

                    <td> {{ $dados->titulo }} </td>
                    <td> {{ Date("d/m/Y", strtotime($dados->created_at)) }} </td>
                    <td><a href="{{ $dados->arquivo }}" class="btn btn-sm btn-primary">Download</a></td>
                    <td>
                        <a class='btn btn-warning' href="{{ route('biblioteca.edit', $dados->id) }}" >
                           <span>Alterar</span>
                        </a>
                    </td>
                    <td>
                        <a href='javascript:;' title='Remover' class='btn btn-sm btn-danger delete' data-id='{{ $dados->id}}' id='delete-2'>
                            <span>Remover</span>
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
                    documento?</h5><button type='button' class='close' data-dismiss='modal' aria-label='Fechar'><span
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
        $('.delete').on('click', function (e) {
            jQuery.noConflict();
            $('#delete_form')[0].action = '/biblioteca/__id'.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });


 });

</script>
@endsection
