<?php

namespace App\Http\Controllers;

use App\Services\Unidrive\CarService;
use App\Services\Unidrive\DealershipService;
use App\Services\Unidrive\ScheduleService;
use App\Services\Unidrive\UserService;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    public function index(UserService $userService, CarService $carService, DealershipService $dealershipService, ScheduleService $scheduleService): Response
    {
        try {
            return response()->view('pages.dashboard.index', [
                'usuario' => $userService->get(),
                'concessionaria' => $dealershipService->get(),
                'agendamentosConcessionaria' => $scheduleService->scheduleDealership(),
                'agendamentosUsuario' => $scheduleService->scheduleUser(),
                'carros' => collect($carService->carsDealership())->slice(0, 10)->toArray(),
            ]);
        } catch (\Exception $exception) {
            return response()
                ->redirectToRoute('home.index')
                ->with('error', $exception->getMessage());
        }
    }
}
