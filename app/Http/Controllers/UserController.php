<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function store(UserPostRequest $request): RedirectResponse
    {
        $user = [
            'nome' => $request->validated()['name'],
            'email' => $request->validated()['email'],
            'senha' => $request->validated()['password'],
        ];
        $postUserResponse = Http::unidrive()->acceptJson()->asJson()->post('/usuario', $user);

        if ($postUserResponse->failed()) {
            return back()
                ->withInput($request->safe()->except(['password']));
        }

        return back()
            ->withCookies([
                'sucess' => 'Usuário Cadastrado!'
            ]);
    }
}
