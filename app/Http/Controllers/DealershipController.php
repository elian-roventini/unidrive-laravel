<?php

namespace App\Http\Controllers;

use App\Http\Requests\DealershipPostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;

class DealershipController extends Controller
{
    public function create()
    {
        if (auth()->user()->concessionaria_id !== null) {
            return back()->with([
                'error' => 'Concessionária já cadastrada!'
            ]);
        }

        return view('pages.dealership.create');
    }

    public function store(DealershipPostRequest $request): RedirectResponse
    {
        if(!$request->has('terms-and-conditions')) {
            return back()
                ->with([
                    'error' => 'Você deve aceitar os termos e condições!'
                ])
                ->withInput($request->validated());
        }

        $postDealershipResponse = Http::unidrive(true)->post('/concessionaria', [
            'cnpj' => $request->validated()['cnpj'],
            'email' => $request->validated()['email'],
            'enderecoForm' => [
              'cep' => $request->validated()['cep'],
              'complemento' => $request->validated()['complemento'],
              'endereco' => $request->validated()['endereco'],
              'numero' => $request->validated()['numero']
            ],
            'nomeFantasia' => $request->validated()['nome'],
            'telefone' => $request->validated()['telefone']
        ]);

        if ($postDealershipResponse->failed()) {
            return back()
                ->with([
                    'error' => 'Concessionária não pode ser cadastrado!',
                    'error-description' => $postDealershipResponse->body()
                ])
                ->withInput($request->validated());
        }

        return back()->with([
            'success' => 'Concessionária cadastrado!'
        ]);
    }
}
