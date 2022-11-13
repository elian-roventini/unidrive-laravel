<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DealershipPostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'string'],
            'cnpj' => ['required', 'int', 'unique:concessionaria'],
        ];
    }

    /**
     * Get the validation error messages
     */
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é necessário.',
            'unique' => 'O :attribute já está cadastrado na nossa base de dados.',
            'string' => 'O :attribute deve ser apenas letras e números.',
            'int' => 'O :attribute deve ser apenas números inteiros.',
        ];
    }
}
