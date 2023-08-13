<?php

namespace App\Services\Unidrive;

use Exception;
use Illuminate\Support\Facades\Http;

class DealershipService extends UnidriveService
{
    public function store(array $dealership): void
    {
        if ($this->api(true)->post('/concessionaria', [
            'cnpj' => $dealership['cnpj'],
            'email' => $dealership['email'],
            'enderecoForm' => [
                'cep' => $dealership['cep'],
                'complemento' => $dealership['complemento'],
                'endereco' => $dealership['endereco'],
                'numero' => $dealership['numero']
            ],
            'nomeFantasia' => $dealership['nome'],
            'telefone' => $dealership['telefone']
        ])->failed()) {
            throw new \Exception('Erro ao cadastrar a concessionária!');
        }
    }

    public function get(): object
    {
        $getDealershipRequest = $this->api(true)->get('/concessionaria');

        return $getDealershipRequest->failed()
            ? throw new \Exception('Erro ao buscar a concessionária!')
            : $getDealershipRequest->json();
    }
}
