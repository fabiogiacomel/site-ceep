<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Usuario_googleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'nome' => 'required|min:3|max:255',
            //'sobrenome' => 'required|min:3|max:255',
            //'email' => 'required|min:3|max:255',
            //'senha' => 'required|min:3|max:255',
            //'email_2' => 'required|min:3|max:255',
            //'telefone1' => 'required|min:3|max:255',
            //'telefone2' => 'required|min:3|max:255',
            //'celular' => 'required|min:3|max:255',
            //'endereco1' => 'required|min:3|max:255',
            //'endereco2' => 'required|min:3|max:255',
            //'empresa_id' => 'required|min:3|max:255',
            //'empresa_tipo' => 'required|min:3|max:255',
            //'empresa_nome' => 'required|min:3|max:255',
            //'gerente' => 'required|min:3|max:255',
            //'departamento' => 'required|min:3|max:255',
            //'centro_custo' => 'required|min:3|max:255',
        ];
    }   
}
?>