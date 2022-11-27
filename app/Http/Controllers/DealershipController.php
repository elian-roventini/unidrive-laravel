<?php

namespace App\Http\Controllers;

use App\Http\Requests\DealershipPostRequest;
use App\Services\Unidrive\DealershipService;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class DealershipController extends Controller
{
    public function __construct(
        public DealershipService $dealershipService
    )
    {
    }

    public function create(): Response
    {
        if (auth()->user()->concessionaria_id !== null) {
            return back()
                    ->with('error', 'Concessionária já cadastrada!');
        }

        return response()->view('pages.dealership.create');
    }

    public function store(DealershipPostRequest $request): RedirectResponse
    {
        if(!$request->has('terms-and-conditions')) {
            return back()
                    ->with('error', 'Você deve aceitar os termos e condições!')
                    ->withInput($request->safe()->toArray());
        }

        $dealarshipCreated = $this->dealershipService->register($request->validated());

        if (!$dealarshipCreated) {
            return back()
                    ->with('error', 'Concessionária não pode ser cadastrada!')
                    ->withInput($request->safe()->toArray());
        }

        return response()
                ->redirectToRoute('dashboard.index')
                ->with('success', 'Concessionária cadastrada!');
    }
}
