<?php

namespace App\Http\Requests;

use App\Rules\CarYearRule;
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
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ano' => ['required', new CarYearRule()],
            'cor' => ['required', 'string'],
            'documentacao' => ['required', 'unique:carro', 'max:12','string'],
            'marca' => ['required', 'string'],
            'modelo' => ['required', 'string'],
            // Regex: '/[A-Z]{3}[0-9][0-9A-Z][0-9]{2}/' Ex: 'AAA0A00'
            'placa' => ['required', 'unique:carro', 'string', 'formato_placa_de_veiculo'],
            'quilometragem' => ['required', 'integer', 'max:100000', 'min:0'],
            // Regex(com pontuação) '(\d{4})[.](\d{6})-(\d{1})' Ex 1234.123456-1
            // Regex(sem pontuação) '(\d{4})(\d{6})(\d{1})' Ex 12341234561
            'renavam' => ['required', 'unique:carro', 'string', 'regex:/(\d{4})(\d{6})(\d{1})/i'],
            'valor' => ['required', 'min:0', 'max:1000000'],
        ];
    }
}
