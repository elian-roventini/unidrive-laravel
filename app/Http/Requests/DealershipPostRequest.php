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
            'nome' => ['required', 'string', 'unique:concessionaria,nome_fantasia'],
            'cnpj' => ['required', 'string', 'unique:concessionaria', 'formato_cnpj'],
            'email' => ['required', 'email', 'unique:concessionaria'],
            'telefone' => ['required', 'telefone_com_ddd'],
            'cep' => ['required', 'string'],
            'cidade' => ['required', 'string'],
            'estado' => ['required', 'string'],
            'endereco' => ['required', 'string'],
            'numero' => ['required', 'integer'],
            'complemento' => ['required', 'string']
        ];
    }
}
