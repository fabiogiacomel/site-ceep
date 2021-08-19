@extends('layouts.app')
@section('content')
<!-- @if(empty($dados)) -->
<div class='alert alert-danger'>
Erro dados nulos
</div>
<!-- @else -->
<h1>Editar Usuario_google</h1>
<form action='/usuario_google/{{$dados->id}}' method='post'>
{{ csrf_field() }}
{{ method_field('PUT') }} <div class='form-group'>
                   <label>id</label>
                   <input type='text' name='id' value='{{$dados->id}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>nome</label>
                   <input type='text' name='nome' value='{{$dados->nome}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>sobrenome</label>
                   <input type='text' name='sobrenome' value='{{$dados->sobrenome}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>email</label>
                   <input type='text' name='email' value='{{$dados->email}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>senha</label>
                   <input type='text' name='senha' value='{{$dados->senha}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>email_2</label>
                   <input type='text' name='email_2' value='{{$dados->email_2}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>telefone1</label>
                   <input type='text' name='telefone1' value='{{$dados->telefone1}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>telefone2</label>
                   <input type='text' name='telefone2' value='{{$dados->telefone2}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>celular</label>
                   <input type='text' name='celular' value='{{$dados->celular}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>endereco1</label>
                   <input type='text' name='endereco1' value='{{$dados->endereco1}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>endereco2</label>
                   <input type='text' name='endereco2' value='{{$dados->endereco2}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>empresa_id</label>
                   <input type='text' name='empresa_id' value='{{$dados->empresa_id}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>empresa_tipo</label>
                   <input type='text' name='empresa_tipo' value='{{$dados->empresa_tipo}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>empresa_nome</label>
                   <input type='text' name='empresa_nome' value='{{$dados->empresa_nome}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>gerente</label>
                   <input type='text' name='gerente' value='{{$dados->gerente}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>departamento</label>
                   <input type='text' name='departamento' value='{{$dados->departamento}}' class='form-control'/>
                </div> <div class='form-group'>
                   <label>centro_custo</label>
                   <input type='text' name='centro_custo' value='{{$dados->centro_custo}}' class='form-control'/>
                </div><button type='submit'
class='btn btn-primary btn-block'>Alterar</button>
</form>
@endif
@stop