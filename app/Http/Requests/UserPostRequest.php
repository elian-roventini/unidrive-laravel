<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'nome' => ['required'],
            'email' => ['required', 'unique:usuario', 'email'],
            'senha' => ['required', Password::min(7)],
            'cpf' => ['nullable', 'cpf', 'unique:usuario'],
            'cnh' => ['nullable', 'string', 'unique:usuario'],
            'telefone' => ['nullable', 'celular_com_ddd'],
            'endereço' => ['nullable', 'string'],
            'numero' => ['nullable', 'integer'],
            'complemento' => ['nullable', 'string'],
            'cep' => ['nullable', 'formato_cep'],
        ];
    }

    /**
     * Get the validation error messages
     */
    public function messages()
    {
        return [
            'required' => 'O campo :attribute é necessário.',
            'email' => 'O campo :attribute deve ser um e-mail válido.',
            'unique' => 'O :attribute já está cadastrado na nossa base de dados.',
            'string' => 'O :attribute deve ser apenas letras e números.',
            'integer' => 'O :attribute deve ser apenas números inteiros.',
            'min' => 'O campo :attribute deve conter ao menos 7 caracteres.',
        ];
    }
}
