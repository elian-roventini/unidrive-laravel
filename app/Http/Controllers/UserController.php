<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use App\Services\Unidrive\UserService;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function __construct(public UserService $userService){}

    public function store(UserPostRequest $request): RedirectResponse
    {
        try {
            $this->userService->store($request->validated());

            return response()
                ->redirectToRoute('auth.login')
                ->with('success', 'Usuário cadastrado!');
        } catch (\Exception $exception) {
            return back()
                ->with('error', $exception->getMessage())
                ->withInput($request->safe()->except(['password']));
        }
    }
}
