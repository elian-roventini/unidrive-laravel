<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class ScheduleController extends Controller
{
    public function store(Request $request): Response
    {
        $request->validate([
            'date' => ['required', 'date', 'after:today'],
            'initial_time' => ['required', 'date_format:H:i'],
            'final_time' => ['required', 'date_format:H:i', 'after:initial_time'],
        ], [
            'date' => 'O campo :attribute deve conter uma data válida.',
            'date.required' => 'O campo data é necessário.',
            'date.after' => 'A data deve ser um dia após hoje.',
            'date_format' => 'O horário deve estar no formato válido (HH:mm).',
            'final_time.after' => 'O horário final deve ser maior que o horário inicial.',
        ]);

        $getCarroResponse = Http::unidrive(true)->get('/carro/' . $request->get('id'));
        $carro = json_decode($getCarroResponse->body());

        if ($getCarroResponse->failed()) {
            return back()
                ->with([
                    'error' => 'Erro ao buscar os carros!',
                    'error-description' => $getCarroResponse->body()
                ]);
        }

        $initialTime = explode(':', $request->get('initial_time') ?? '00:00');
        $finalTime = explode(':', $request->get('final_time') ?? '00:01');

        $schedule = [
            'carro' => $carro[0],
            'dt_agendamento' => Carbon::create($request->get('date'))->format('Y-m-d\TH:m:s.u'),
            'hr_inicial' => Carbon::create($request->get('date'))
                ->addHours($initialTime[0])
                ->addMinutes($initialTime[1])
                ->format('Y-m-d\TH:m:s.u'),
            'hr_final' => Carbon::create($request->get('date'))
                ->addHours($finalTime[0])
                ->addMinutes($finalTime[1])
                ->format('Y-m-d\TH:m:s.u'),
        ];

        $postScheduleResponse = Http::unidrive(true)->post('/agendamento', $schedule);
        if ($postScheduleResponse->failed()) {
            return back()
                ->with([
                    'error' => 'Agendamento não pode ser realizado!',
                    'error-description' => $postScheduleResponse->body()
                ])
                ->withInput($request->only(['date', 'initial_time', 'final_time']));
        }

        return back()->with([
            'success' => 'Agendamento cadastrado!'
        ]);
    }

    public function delete(int $agendamentoId): Response
    {
        $deleteAgendamentoResponse = Http::unidrive(true)->delete("/agendamento/deletar/$agendamentoId");

        if ($deleteAgendamentoResponse->failed()) {
            return back()
                ->with([
                    'error' => 'Agendamento não pode ser apagado!',
                    'error-description' => $deleteAgendamentoResponse->body()
                ]);
        }

        return back()->with([
            'success' => 'Agendamento deletado!'
        ]);
    }
}
