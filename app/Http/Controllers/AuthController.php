<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(LoginPostRequest $request)
    {
        $postAuthResponse = Http::unidrive()->post('/auth', [
            'email' => $request->email,
            'senha' => $request->senha
        ]);

        if ($postAuthResponse->failed()) {
            return back()->with([
                'error' => 'Não foi possivel logar! Verifique as credenciais!'
            ]);
        }

        $token = json_decode($postAuthResponse->body());
        session(['token' => "$token->tipo $token->token"]);

        $user = (new User())->whereEmail($request->email)->first();

        if (!$user) {
            return back()->with($request);
        }

        Auth::login($user);
        return redirect()->route('dashboard.index');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home.index');
    }
}
