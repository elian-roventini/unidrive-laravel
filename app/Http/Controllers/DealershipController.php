<?php

namespace App\Http\Controllers;

use App\Http\Requests\DealershipPostRequest;
use App\Services\Unidrive\DealershipService;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class DealershipController extends Controller
{
    public function __construct(protected DealershipService $dealershipService){}

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

        try {
            $this->dealershipService->store($request->validated());

            return response()
                ->redirectToRoute('dashboard.index')
                ->with('success', 'Concessionária cadastrada!');
        } catch (\Exception $exception) {
            return back()
                    ->with('error', $exception->getMessage())
                    ->withInput($request->safe()->toArray());
        }

    }
}
