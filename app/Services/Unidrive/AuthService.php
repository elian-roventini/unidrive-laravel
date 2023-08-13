<?php

namespace App\Services\Unidrive;

use Exception;
use Illuminate\Support\Facades\Http;

class AuthService extends UnidriveService
{
    public function login(string $email, string $senha): string|null
    {
        $postAuthResponse = $this->api()->post('/auth', compact('email', 'senha'));

        if ($postAuthResponse->failed()) {
            throw new \Exception('Erro ao tentar conectar com a API');
        }

        $responseJson = $postAuthResponse->json();

        if (!array_key_exists('tipo', $responseJson) || !array_key_exists('token', $responseJson)) {
            throw new \Exception('Token inválido!');
        }

        session(['token' => sprintf("%s %s", $responseJson['tipo'], $responseJson['token'])]);

        return $responseJson['token'];
    }
}
