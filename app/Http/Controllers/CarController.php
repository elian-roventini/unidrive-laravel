<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarPostRequest;
use Illuminate\Support\Facades\Http;

class CarController extends Controller
{
    public function index()
    {
        $getCarrosResponse = Http::unidrive()->get('/carro');

        $carros = json_decode($getCarrosResponse->body());

        if ($getCarrosResponse->failed()) {
            return back()
                ->with([
                    'error' => 'Erro ao buscar os carros!'
                ]);
        }

        return view('pages.car.index', compact('carros'));
    }

    public function show($modelo)
    {
        $getCarrosResponse = Http::unidrive()->get('/carro');
        $getCarroResponse = Http::unidrive(true)->get("/carro/$modelo");

        $carro = json_decode($getCarroResponse->body());
        $carros = json_decode($getCarrosResponse->body());

        $carrosFiltered = array_filter($carros, function ($carroAtual) use ($carro) {
            return $carroAtual->id !== $carro[0]->id;
        });

        if ($getCarrosResponse->failed() || $getCarroResponse->failed()) {
            return back()
                ->with([
                    'error' => 'Erro ao buscar os carros!'
                ]);
        }

        if ($carro === []) {
            return response()
                ->redirectToRoute('car.index')
                ->with([
                    'error' => "Não foi possivel localizar o carro $modelo!"
                ]);
        }

        return view('pages.car.show', [
            'carro' => $carro[0] ?? [],
            'carros' => $carrosFiltered
        ]);
    }

    public function store(CarPostRequest $request)
    {
        $postCarroResponse = Http::unidrive(true)->post('/carro', [
            [
                'ano' => $request->ano,
                'cor' => $request->cor,
                'documentacao' => $request->documentacao,
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'placa' => strtoupper($request->placa),
                'quilometragem' => $request->quilometragem,
                'renavam' => $request->renavam,
                'valor' => $request->valor,
            ]
        ]);

        if ($postCarroResponse->failed()) {
            return back()
                ->with([
                    'error' => 'Carro não pode ser cadastrado!',
                    'error-description' => $postCarroResponse->body()
                ])
                ->withInput($request->validated());
        }

        return back()->with([
            'success' => 'Carro cadastrado!'
        ]);
    }
}
