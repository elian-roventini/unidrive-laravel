<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchedulePostRequest;
use App\Services\Unidrive\CarService;
use App\Services\Unidrive\ScheduleService;
use Symfony\Component\HttpFoundation\Response;

class ScheduleController extends Controller
{
    public function __construct(
        public CarService $carService,
        public ScheduleService $scheduleService
    )
    {
    }

    public function store(SchedulePostRequest $request): Response
    {
        $car = $this->carService->getCar($request->get('carro'));

        if ($car === null) {
            return back()
                ->with('error', 'Erro ao buscar os carros!');
        }

        $scheduleCreated = $this->scheduleService->register((array) $car, $request->get('date'), $request->get('initial_time'), $request->get('final_time'));
        if (!$scheduleCreated) {
            return back()
                ->with('error', 'Agendamento não pode ser realizado!')
                ->withInput($request->only(['date', 'initial_time', 'final_time']));
        }

        return back()->with('success', 'Agendamento cadastrado!');
    }

    public function delete(int $agendamentoId): Response
    {
        $scheduleDeleted = $this->scheduleService->delete($agendamentoId);

        if (!$scheduleDeleted) {
            return back()
                ->with('error', 'Agendamento não pode ser apagado!');
        }

        return back()->with('success', 'Agendamento deletado!');
    }
}
