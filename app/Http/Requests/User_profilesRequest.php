<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class User_profilesRequest extends FormRequest
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
            //'user_id' => 'required|min:3|max:255',
            //'profiles_id' => 'required|min:3|max:255',
        ];
    }   
}
?>