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
            'cnh' => $request->validated()['cnh'],
            'cpf' => $request->validated()['cpf'],
            'email' => $request->validated()['email'],
            'endereco' => [
                'cep' => $request->validated()['cep'],
                'complemento' => $request->validated()['complemento'],
                'endereco' => $request->validated()['endereco'],
                'numero' => $request->validated()['numero']
            ],
            'nome' => $request->validated()['nome'],
            'senha' => $request->validated()['senha'],
            'telefone' => $request->validated()['telefone']
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
