<?php

namespace App\Http\Controllers;

use App\Services\Unidrive\CarService;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    public function index(CarService $carService): Response
    {
        return response()->view('pages.home.index', [
            'carros' => collect($carService->getCars())
                            ->slice(0, 10)
                            ->toArray()
        ]);
    }
}
