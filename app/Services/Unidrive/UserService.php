<?php

namespace App\Services\Unidrive;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Http;

class UserService
{
    public function register(array $user): User|null
    {
        try {
            $postUserResponse = Http::unidrive()->post('/usuario', [
                'cnh' => $user['cnh'],
                'cpf' => $user['cpf'],
                'email' => $user['email'],
                'endereco' => [
                    'cep' => $user['cep'],
                    'complemento' => $user['complemento'],
                    'endereco' => $user['endereco'],
                    'numero' => $user['numero']
                ],
                'nome' => $user['nome'],
                'senha' => $user['senha'],
                'telefone' => $user['telefone']
            ]);

            if ($postUserResponse->failed()) {
                return null;
            }

            return (new User())->where('email', $user['email'])->first();
        } catch (Exception) {
            return null;
        }
    }

    public function getUser(): object|null
    {
        try {
            $getUserResponse = Http::unidrive(true)->get('/usuario');

            if ($getUserResponse->failed()) {
                return null;
            }

            return json_decode($getUserResponse->body(), false, 512, JSON_THROW_ON_ERROR);
        } catch (Exception) {
            return null;
        }
    }
}
