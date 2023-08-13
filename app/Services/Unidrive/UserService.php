<?php

namespace App\Services\Unidrive;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Http;

class UserService extends UnidriveService
{
    public function store(array $user): object
    {
        $postUserResponse = $this->api()->post('/usuario', [
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
            throw new \Exception('Usuário não pode ser cadastrado!');
        }

        return (new User())->query()->where('email', $user['email'])->first();
    }

    public function get(): object
    {
        $getUserResponse = $this->api(true)->get('/usuario');

        if ($getUserResponse->failed()) {
            throw new \Exception('Não Autorizado');
        }

        return $getUserResponse->json();
    }
}
