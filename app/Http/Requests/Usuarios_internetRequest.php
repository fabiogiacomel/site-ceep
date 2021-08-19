<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Usuarios_internetRequest extends FormRequest
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
            //'cgm' => 'required|min:3|max:255',
            //'nome' => 'required|min:3|max:255',
            //'senha' => 'required|min:3|max:255',
            //'email' => 'required|min:3|max:255',
            //'situacao' => 'required|min:3|max:255',
            //'cgm_md5' => 'required|min:3|max:255',
            //'data_cadastro' => 'required|min:3|max:255',
        ];
    }   
}
?>