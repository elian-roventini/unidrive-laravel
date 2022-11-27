<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use App\Services\Unidrive\UserService;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function __construct(
        public UserService $userService
    )
    {
    }

    public function store(UserPostRequest $request): RedirectResponse
    {
        $user = $this->userService->register($request->validated());

        if ($user === null) {
            return back()
                ->with('error', 'Usuário não pode ser cadastrado!')
                ->withInput($request->safe()->except(['password']));
        }

        return response()
            ->redirectToRoute('auth.login')
            ->with('success', 'Usuário cadastrado!');
    }
}
