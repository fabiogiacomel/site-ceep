<table class="table table-bordered" style="width:100%;text-transform: uppercase">
    <tr>
        <td colspan="2">ALUNO (a):     __________________________________________________________________________________</td><td>  N° _______</td>
    </tr>
    <tr>  
        <td @if($count > 1) class="new-page" @endif >
                CURSO TÉCNICO EM  {{$d->curso2->nome}}  </td><td>  SÉRIE: {{$d->serie}}ª SÉRIE {{$turmas[$d->turma]}}  </td><td>    PERÍODO {{$periodos[$d->periodo]}}
        </td>
    </tr>
</table>
