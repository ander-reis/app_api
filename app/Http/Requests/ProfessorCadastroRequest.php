<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorCadastroRequest extends FormRequest
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
            'name' => 'required',
//            'email' => 'required|unique:tb_professor_cadastro|email',
//            'password' => 'required|required|min:6|max:16|confirmed',
//            'ds_cpf' => 'max:14',
//            'ds_rg' => 'max:15',
//            'dt_nascimento' => 'max:8',
//            'ds_ddd_residencial' => 'min:2|max:2',
//            'ds_fone_residencial' => 'min:8|max:9',
//            'ds_ddd_fone_celular' => 'min:2|max:2',
//            'ds_fone_celular' => 'min:8|max:9',
        ];
    }
}
