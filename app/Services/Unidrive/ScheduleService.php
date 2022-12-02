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

            [$initialHour, $initialMinutes] = explode(':', $initial_time ?? '00:00');
            [$finalHour, $finalMinutes] = explode(':', $final_time ?? '00:00');

            $initialTime = $carbonDate
                ->hour($initialHour)
                ->minutes($initialMinutes)
                ->format('Y-m-d\TH:i:s.u');
            $finalTime = $carbonDate
                ->hour($finalHour)
                ->minutes($finalMinutes)
                ->format('Y-m-d\TH:i:s.u');

            $postScheduleResponse = Http::unidrive(true)->post('/agendamento', [
                'carro' => $carro,
                'dt_agendamento' => $carbonDate->format('Y-m-d\TH:m:s.u'),
                'hr_inicial' => $initialTime,
                'hr_final' => $finalTime,
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
