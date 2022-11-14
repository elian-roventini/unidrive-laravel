<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function store(UserPostRequest $request): RedirectResponse
    {
        $postUserResponse = Http::unidrive()->post('/usuario', [
            'nome' => $request->validated()['nome'],
            'email' => $request->validated()['email'],
            'senha' => $request->validated()['senha'],
        ]);

        if ($postUserResponse->failed()) {
            return back()
                ->with([
                    'error' => 'Usuário não pode ser cadastrado!'
                ])
                ->withInput($request->safe()->except(['password']));
        }

        return back()->with([
            'success' => 'Usuário cadastrado!'
        ]);
    }
}
