<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarPostRequest;
use App\Services\Unidrive\CarService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarController extends Controller
{
    public function index(CarService $carService, Request $request): Response
    {
        $cars = collect($carService->getCars());

        if ($cars === null) {
            return back()
                ->with('error', 'Erro ao buscar os carros!');
        }

        if ($request->filled(['marca'])) {
            $cars = $cars->filter(static fn ($carro) => $carro->marca === strtoupper($request->get('marca')));
        }

        if ($request->filled(['modelo'])) {
            $cars = $cars->filter(static fn ($carro) => $carro->modelo === strtoupper($request->get('modelo')));
        }

        session()->flashInput([
            'marca' => $request->get('marca'),
            'modelo' => $request->get('modelo'),
        ]);

        return response()->view('pages.car.index', [
            'carros' => $cars
                            ->slice($request->get('offset') ?? 0, $request->get('limit') ?? 10)
                            ->toArray()
        ]);
    }

    public function show(CarService $carService, int $id): Response
    {
        $cars = collect($carService->getCars());

        if ($cars === null) {
            return back()
                ->with('error', 'Erro ao buscar os carros!');
        }

        $car = $cars->filter(static fn($car) => $car->id === $id)->first();
        if ($car === []) {
            return response()
                ->redirectToRoute('car.index')
                ->with('error', 'Não foi possivel localizar o carro!');
        }

        return response()->view('pages.car.show', [
            'carro' => $car,
            'carros' => $cars
                            ->reject(static fn ($carroAtual) => $carroAtual->id === $car->id)
                            ->slice(0,3)
                            ->toArray()
        ]);
    }

    public function store(CarService $carService, CarPostRequest $request): Response
    {
        $carCreated = $carService->register($request->validated());

        if (!$carCreated) {
            return back()
                ->with('error', 'Carro não pode ser cadastrado!')
                ->withInput($request->validated());
        }

        return back()->with([
            'success' => 'Carro cadastrado!'
        ]);
    }

    public function delete(CarService $carService, int $id): Response
    {
        $carDeleted = $carService->delete($id);

        if (!$carDeleted) {
            return response()
                ->json([ 'error' => 'Carro não pode ser apagado!' ],Response::HTTP_BAD_REQUEST);
        }

        return response()
            ->json([ 'success' => 'Carro deletado!' ]);
    }
}
