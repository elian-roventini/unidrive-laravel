<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarPostRequest extends FormRequest
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
            'ano' => ['required', 'integer'],
            'cor' => ['required', 'string'],
            'marca' => ['required', 'string'],
            'modelo' => ['required', 'string'],
            'documentacao' => ['required', 'unique:carro', 'string'],
            'placa' => ['required', 'unique:carro', 'string'],
            'quilometragem' => ['required', 'integer'],
            'renovam' => ['required', 'unique:carro', 'string'],
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
            'integer' => 'O :attribute deve ser apenas números inteiros.',
            'float' => 'O :attribute deve ser apenas números.',
        ];
    }
}
