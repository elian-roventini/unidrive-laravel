<?php

namespace App\Services\Unidrive;

use Exception;
use Illuminate\Support\Facades\Http;

class DealershipService
{
    public function register(array $dealership): bool
    {
        try {
            $postDealershipResponse = Http::unidrive(true)->post('/concessionaria', [
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
            ]);

            if ($postDealershipResponse->failed()) {
                return false;
            }

            return true;
        } catch (Exception) {
            return false;
        }
    }

    public function getDealership(): object|null
    {
        try {
            $getDealershipRequest = Http::unidrive(true)->get('/concessionaria');

            if ($getDealershipRequest->failed()) {
                return null;
            }

            return json_decode($getDealershipRequest->body(), false, 512, JSON_THROW_ON_ERROR);
        } catch (Exception) {
            return null;
        }
    }
}
