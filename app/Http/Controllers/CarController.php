<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class CarController extends Controller
{
    public function index(Request $request): Response
    {
        $getCarrosResponse = Http::unidrive()->get('/carro');

        $carros = json_decode($getCarrosResponse->body());

        if ($getCarrosResponse->failed()) {
            return back()
                ->with([
                    'error' => 'Erro ao buscar os carros!'
                ]);
        }

        if ($request->filled(['marca', 'modelo'])) {
            $carros = array_filter($carros, static function ($carro) use ($request) {
                return
                    $carro->marca === strtoupper($request->get('marca')) &&
                    $carro->modelo === strtoupper($request->get('modelo'));
            });

            session()->flashInput([
                'marca' => $request->get('marca'),
                'modelo' => $request->get('modelo'),
            ]);
        }

        return response()->view('pages.car.index', [
            'carros' => $this->paginate($carros, $request->get('offset') ?? 0, $request->get('limit') ?? 10)
        ]);
    }

    public function show($modelo): Response
    {
        $getCarrosResponse = Http::unidrive()->get('/carro');
        $getCarroResponse = Http::unidrive(true)->get("/carro/$modelo");

        $carro = json_decode($getCarroResponse->body());
        $carros = json_decode($getCarrosResponse->body());

        $carrosFiltered = array_filter($carros, static function ($carroAtual) use ($carro) {
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

        return response()->view('pages.car.show', [
            'carro' => $carro[0] ?? [],
            'carros' => $this->paginate($carrosFiltered, 0, 3)
        ]);
    }

    public function store(CarPostRequest $request): Response
    {
        $postCarroResponse = Http::unidrive(true)->post('/carro', [
            [
                'ano' => $request->get('ano'),
                'cor' => $request->get('cor'),
                'documentacao' => $request->get('documentacao'),
                'marca' => $request->get('marca'),
                'modelo' => $request->get('modelo'),
                'placa' => strtoupper($request->get('placa')),
                'quilometragem' => $request->get('quilometragem'),
                'renavam' => $request->get('renavam'),
                'valor' => $request->get('valor'),
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

    public function delete(int $carroId): Response
    {
        $deleteCarroResponse = Http::unidrive(true)->delete("/carro/$carroId");

        if ($deleteCarroResponse->failed()) {
            return response()
                ->json(
                    [
                        'error' => 'Carro não pode ser apagado!',
                        'error-description' => $deleteCarroResponse->body()
                    ],
                    Response::HTTP_BAD_REQUEST
                );
        }

        return response()
            ->json([
                'success' => 'Carro deletado!'
            ]);
    }
}
