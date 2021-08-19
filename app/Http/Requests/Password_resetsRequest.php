<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Password_resetsRequest extends FormRequest
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
            //'email' => 'required|min:3|max:255',
            //'token' => 'required|min:3|max:255',
        ];
    }   
}
?>