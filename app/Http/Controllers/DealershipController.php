<?php

namespace App\Http\Controllers;

use App\Http\Requests\DealershipPostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;

class DealershipController extends Controller
{
    public function store(DealershipPostRequest $request): RedirectResponse
    {
        $postDealershipResponse = Http::unidrive(true)->post('/concessionaria', [
            'nome' => $request->validated()['nome'],
            'cnpj' => $request->validated()['cnpj'],
        ]);

        if ($postDealershipResponse->failed()) {
            return back()
                ->with([
                    'error' => 'Concessionária não pode ser cadastrado!'
                ])
                ->withInput($request->safe());
        }

        return back()->with([
            'success' => 'Concessionária cadastrado!'
        ]);
    }
}
