<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchedulePostRequest;
use App\Services\Unidrive\CarService;
use App\Services\Unidrive\ScheduleService;
use Symfony\Component\HttpFoundation\Response;

class ScheduleController extends Controller
{
    public function __construct(public CarService $carService, public ScheduleService $scheduleService){}

    public function store(SchedulePostRequest $request): Response
    {
        try {
            $car = $this->carService->get($request->get('carro'));

            $this->scheduleService->store(
                (array) $car,
                ...$request->only('date, initial_time, final_time')
            );

            return back()->with('success', 'Agendamento cadastrado!');
        } catch (\Exception $exception) {
            return back()
                ->with('error', $exception->getMessage())
                ->withInput($request->only(['date', 'initial_time', 'final_time']));
        }

    }

    public function delete(int $agendamentoId): Response
    {
        try {
            $this->scheduleService->delete($agendamentoId);

            return back()->with('success', 'Agendamento deletado!');
        } catch (\Exception $exception) {
            return back()
                ->with('error', $exception->getMessage());
        }
    }
}
