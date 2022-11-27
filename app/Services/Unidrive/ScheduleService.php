<?php

namespace App\Services\Unidrive;

use Carbon\CarbonImmutable;
use Exception;
use Illuminate\Support\Facades\Http;

class ScheduleService
{
    public function register(array $carro, string $date, string $initial_time, string $final_time): bool
    {
        try {
            $carbonDate = CarbonImmutable::create($date);
            $initialTime = explode(':', $initial_time ?? '00:00');
            $finalTime = explode(':', $final_time ?? '00:01');

            $postScheduleResponse = Http::unidrive(true)->post('/agendamento', [
                'carro' => $carro,
                'dt_agendamento' => $carbonDate->format('Y-m-d\TH:m:s.u'),
                'hr_inicial' => $carbonDate
                    ->addHours($initialTime[0])
                    ->addMinutes($initialTime[1])
                    ->format('Y-m-d\TH:m:s.u'),
                'hr_final' => $carbonDate
                    ->addHours($finalTime[0])
                    ->addMinutes($finalTime[1])
                    ->format('Y-m-d\TH:m:s.u'),
            ]);

            if ($postScheduleResponse->failed()) {
                return false;
            }

            return true;
        } catch (Exception) {
            return false;
        }
    }

    public function delete(int $id): bool
    {
        try {
            $deleteAgendamentoResponse = Http::unidrive(true)->delete("/agendamento/deletar/$id");

            if ($deleteAgendamentoResponse->failed()) {
                return false;
            }

            return true;
        } catch (Exception) {
            return false;
        }
    }

    public function getScheduleDealership(): array|null
    {
        try {
            $getAgendamentosConcessionariaResponse = Http::unidrive(true)->get('/agendamento/concessionaria');

            if ($getAgendamentosConcessionariaResponse->failed()) {
                return null;
            }

            return json_decode($getAgendamentosConcessionariaResponse->body(), false, 512, JSON_THROW_ON_ERROR);
        } catch (Exception) {
            return null;
        }
    }

    public function getScheduleUser(): array|null
    {
        try {
            $getAgendamentosUsuarioResponse = Http::unidrive(true)->get('/agendamento/usuario');

            if ($getAgendamentosUsuarioResponse->failed()) {
                return null;
            }

            return json_decode($getAgendamentosUsuarioResponse->body(), false, 512, JSON_THROW_ON_ERROR);
        } catch (Exception) {
            return null;
        }
    }
}
