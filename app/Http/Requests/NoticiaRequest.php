<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
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
            'titulo' => 'required|min:3|max:255',
            'mensagem' => 'required|min:3',
            //'mensagem_alternativa' => 'required|min:3|max:255',
            'imagem' => 'required|file',
            //'user_id' => 'required|min:3|max:255',
            //'data' => 'required|min:3|max:255',
            //'situacao' => 'required|min:3|max:255',
            //'tipo' => 'required|min:3|max:255',
        ];
    }   
}
?>