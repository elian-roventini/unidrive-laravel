<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPostRequest;
use App\Models\User;
use App\Services\Unidrive\AuthService;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService){}

    public function login(LoginPostRequest $request): Response
    {
        try {
            if (auth()->check()) redirect()->to('dashboard.index');

            $this->authService->login($request->get('email'), $request->get('senha'));

            $user = (new User())->where('email', $request->get('email'))->first();
            if (!$user) {
                throw new \Exception('Não foi possivel logar! Verifique as credenciais!');
            }
            auth()->loginUsingId($user->id);

            return redirect()->route('dashboard.index');
        } catch (\Exception $exception) {
            return back()
                ->with('error', $exception->getMessage())
                ->withInput($request->safe()->except(['password']));
        }
    }

    public function logout(): Response
    {
        auth()->logout();

        return redirect()->route('home.index');
    }
}
