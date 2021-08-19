<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
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
            //'objetivo' => 'required|min:3|max:255',
            //'perfil' => 'required|min:3|max:255',
            //'logo' => 'required|min:3|max:255',
            //'user_id' => 'required|min:3|max:255',
            //'situacao' => 'required|min:3|max:255',
        ];
    }   
}
?>