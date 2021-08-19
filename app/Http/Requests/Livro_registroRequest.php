<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Livro_registroRequest extends FormRequest
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
            //'descricao' => 'required|min:3|max:255',
            //'arquivo' => 'required|min:3|max:255',
            //'data' => 'required|min:3|max:255',
            //'user_id' => 'required|min:3|max:255',
            //'modalidade' => 'required|min:3|max:255',
        ];
    }   
}
?>