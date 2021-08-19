@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')

<h1>Listagem de Usuários
    <a href="/usuario_novo" class="btn btn-success"> Criar usuário</a>

</h1>
<table id="table_users" style="width:100%" class='display table table-striped table-bordered table-hover'>
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Criado</th>
            <th>Alterar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>@if(isset($user->created_at)) {{$user->created_at->format('d/m/Y')}} @endif</td>
            {{--<td>
                <form action='/users/{{$user->id}}' method='post'>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class='btn btn-danger'>
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
            </td>--}}
            <td>
                <a class='btn btn-info white' href="{{ route('users.edit', $user->id) }}" >
                    <i class="fa fa-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('js')
<script src='//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>

<script>
    $(document).ready(function () {
        $('#table_users').DataTable();
    });

    /*$('.delete').on('click', function (e) {
        console.log('oi');
        $('#delete_form')[0].action = 'planejamento/__id'.replace('__id', $(this).data('id'));
        $('#delete_modal').modal('show');
    });*/

</script>
@endsection

