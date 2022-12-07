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
        $user = $userService->getUser();
        $car = $carService->getCarsDealership();
        $dealership = $dealershipService->getDealership();
        $scheduleDealership = $scheduleService->getScheduleDealership();
        $scheduleUser = $scheduleService->getScheduleUser();

        if ($user === null) {
            return response()
                    ->redirectToRoute('home.index')
                    ->with('error', 'Não Autorizado');
        }

        return response()->view('pages.dashboard.index', [
            'usuario' => $user,
            'concessionaria' => $dealership,
            'agendamentosConcessionaria' => $scheduleDealership,
            'agendamentosUsuario' => $scheduleUser,
            'carros' => collect($car)->slice(0, 10)->toArray(),
        ]);
    }
}
