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
        try {
            $cars = collect($carService->all());

            if ($request->filled(['marca'])) {
                $cars = $cars->filter(static fn ($car) => $car->marca === strtoupper($request->get('marca')));
            }

            if ($request->filled(['modelo'])) {
                $cars = $cars->filter(static fn ($car) => $car->modelo === strtoupper($request->get('modelo')));
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
        } catch (\Exception $exception) {
            return back()
                ->with('error', $exception->getMessage());
        }
    }

    public function show(CarService $carService, int $id): Response
    {
        try {
            $cars = collect($carService->all());

            $car = $cars->filter(static fn($car) => $car['id'] === $id)->first();
            if (empty($car)) {
                return response()
                    ->redirectToRoute('car.index')
                    ->with('error', 'Nenhum carro localizado!');
            }

            return response()->view('pages.car.show', [
                'carro' => $car,
                'carros' => $cars
                                ->reject(static fn ($actualCar) => $actualCar['id'] === $car['id'])
                                ->slice(0,3)
                                ->toArray()
            ]);
        } catch (\Exception $exception) {
            return back()
                ->with('error', $exception->getMessage());
        }
    }

    public function store(CarService $carService, CarPostRequest $request): Response
    {
        try {
            $carService->store($request->validated());

            return back()->with([
                'success' => 'Carro cadastrado!'
            ]);
        } catch (\Exception $exception) {
            return back()
                ->with('error', $exception->getMessage())
                ->withInput($request->validated());
        }
    }

    public function delete(CarService $carService, int $id): Response
    {
        try {
            $carService->delete($id);

            return response()
                ->json([ 'success' => 'Carro deletado!' ]);
        } catch (\Exception $exception) {
            return response()
                ->json([ 'error' => $exception->getMessage() ], Response::HTTP_BAD_REQUEST);
        }
    }
}
