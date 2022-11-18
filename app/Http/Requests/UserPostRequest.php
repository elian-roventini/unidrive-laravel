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
            'cpf' => ['required', 'cpf', 'unique:usuario'],
            'cnh' => ['required', 'string', 'unique:usuario'],
            'telefone' => ['required', 'celular_com_ddd', 'unique:usuario'],
            'endereco' => ['required', 'string'],
            'numero' => ['required', 'integer'],
            'complemento' => ['required', 'string'],
            'cep' => ['required', 'formato_cep'],
        ];
    }
}
