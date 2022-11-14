<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ScheduleController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'date' => ['required', 'date'],
            'carro' => ['required']
        ], [
            'carro.required' => 'O campo data é necessário.',
            'date.required' => 'O campo data é necessário.',
            'date' => 'O campo :attribute deve conter uma data válida.',
        ]);

        $getCarroResponse = Http::unidrive(true)->get("/carro/$request->carro");
        $carro = json_decode($getCarroResponse->body());

        if ($getCarroResponse->failed()) {
            return back()
                ->with([
                    'error' => 'Erro ao buscar os carros!'
                ]);
        }

        $postScheduleResponse = Http::unidrive(true)->post('/agendamento', [
                'carro' => $carro[0],
                'dt_agendamento' => Carbon::create($request->date)->format('Y-m-d\TH:m:s.u'),
                'hr_final' => Carbon::create($request->date)->addHours(12)->format('Y-m-d\TH:m:s.u'),
                'hr_inicial' => Carbon::create($request->date)->addHours(15)->format('Y-m-d\TH:m:s.u'),
        ]);

//        dd([
//                'carro' => $carro[0] ?? [],
//                'dt_agendamento' => Carbon::create($request->date)->format('Y-m-d\TH:m:s.u'),
//                'hr_final' => Carbon::create($request->date)->addHours(12)->format('Y-m-d\TH:m:s.u'),
//                'hr_inicial' => Carbon::create($request->date)->addHours(15)->format('Y-m-d\TH:m:s.u'),
//        ], $postScheduleResponse, $postScheduleResponse->body());

        if ($postScheduleResponse->failed()) {
            return back()
                ->with([
                    'error' => 'Agendamento não pode ser realizado!',
                    'error-description' => $postScheduleResponse->body()
                ])
                ->withInput([
                    'date' => $request->date
                ]);
        }

        return back()->with([
            'success' => 'Usuário cadastrado!'
        ]);
    }
}
