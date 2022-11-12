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
            'name' => ['required'],
            'email' => ['required', 'unique:usuario', 'email'],
            'password' => ['required', Password::min(7)],
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
            'name.required' => 'O campo nome é necessário.',
            'email.required' => 'O campo e-mail é necessário.',
            'email.unique' => 'O e-mail já está cadastrado na nossa base de dados.',
            'email.email' => 'O campo e-mail deve conter um e-mail válido.',
            'password.required' => 'O campo senha é necessário.',
            'password.min' => 'O campo senha deve conter ao menos 7 caracteres.',
        ];
    }
}
