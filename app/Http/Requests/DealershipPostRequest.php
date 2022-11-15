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
            'nome' => ['required', 'string', 'unique:concessionaria'],
            'cnpj' => ['required', 'string', 'unique:concessionaria', 'formato_cnpj'],
            'email' => ['nullable', 'email', 'unique:concessionaria'],
            'telefone' => ['nullable', 'telefone_com_ddd'],
            'cep' => ['nullable', 'string'],
            'cidade' => ['nullable', 'string'],
            'estado' => ['nullable', 'string'],
            'endereço' => ['nullable', 'string'],
            'numero' => ['nullable', 'integer'],
            'complemento' => ['nullable', 'string'],
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
        ];
    }
}
