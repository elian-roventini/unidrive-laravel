<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPostRequest;
use App\Models\User;
use App\Services\Unidrive\AuthService;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(
        public AuthService $authService
    )
    {
    }

    public function login(LoginPostRequest $request): Response
    {
        $token = $this->authService->login(
            $request->get('email'),
            $request->get('senha')
        );

        if ($token === null) {
            return back()
                ->with('error', 'Não foi possivel logar! Verifique as credenciais!')
                ->withInput($request->safe()->except(['password']));
        }

        $user = (new User())->where('email', $request->get('email'))->first();
        $logged = Auth::loginUsingId($user->id);

        if (!$logged) {
            return back()
                ->with('error', 'Não foi possivel logar!!')
                ->withInput($request->safe()->except(['password']));
        }

        return redirect()->route('dashboard.index');
    }

    public function logout(): Response
    {
        Auth::logout();

        return redirect()->route('home.index');
    }
}
