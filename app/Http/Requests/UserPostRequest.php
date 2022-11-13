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
//            'cpf' => ['required'],
//            'cnh' => ['required'],
//            'telefone' => ['required'],
//            'endereço' => ['required'],
//            'numero' => ['required'],
//            'complemento' => ['required'],
//            'cep' => ['required'],
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
            'int' => 'O :attribute deve ser apenas números inteiros.',
            'min' => 'O campo :attribute deve conter ao menos 7 caracteres.',
        ];
    }
}
