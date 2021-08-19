<?php
    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class PlanejamentoRequest extends FormRequest
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
            switch ($this->method()) {
                case 'GET':
                case 'DELETE':
                    {
                        return [];
                    }
                case 'POST':
                    {
                        return [
                                'curso'=> 'required',
                                'serie'=> 'required',
                                'turma'=> 'required',
                                'disciplina'=> 'required',
                                'arquivo'=> 'required',
                                ];
                    }
                case 'PUT':
                case 'PATCH':
                    {
                        return [];
                    }
                default:break;
            }
        }
    }
