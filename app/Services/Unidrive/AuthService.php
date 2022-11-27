<?php

namespace App\Services\Unidrive;

use Exception;
use Illuminate\Support\Facades\Http;

class AuthService
{
    public function login(string $email, string $senha): string|null
    {
        try {
            $postAuthResponse = Http::unidrive()->post('/auth', compact('email', 'senha'));

            if ($postAuthResponse->failed()) {
                return null;
            }

            $responseJson = json_decode($postAuthResponse->body(), false, 512, JSON_THROW_ON_ERROR);

            session(['token' => "$responseJson->tipo $responseJson->token"]);

            return $responseJson->token;
        } catch (Exception) {
            return null;
        }
    }
}
