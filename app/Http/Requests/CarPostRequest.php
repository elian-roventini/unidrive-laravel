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
            'ano' => ['required', 'date_format:Y', 'min:2000', 'max:' . now()->format('Y') + 3],
            'cor' => ['required', 'string'],
            'marca' => ['required', 'string'],
            'modelo' => ['required', 'string'],
            'documentacao' => ['required', 'unique:carro', 'string'], // remover
            // Regex: '/[A-Z]{3}[0-9][0-9A-Z][0-9]{2}/' Ex: 'AAA0A00'
            'placa' => ['required', 'unique:carro', 'string', 'formato_placa_de_veiculo'], 
            'quilometragem' => ['required', 'integer', 'max:100000', 'min:0'],
            // Regex(com pontuação) '(\d{4})[.](\d{6})-(\d{1})' Ex 1234.123456-1
            // Regex(sem pontuação) '(\d{4})(\d{6})(\d{1})' Ex 12341234561
            'renovam' => ['required', 'unique:carro', 'string', 'regex:/(\d{4})(\d{6})(\d{1})/i'], 
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
