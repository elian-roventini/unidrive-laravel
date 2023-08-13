<?php

namespace App\Services\Unidrive;

use Carbon\CarbonImmutable;
use Exception;
use Illuminate\Support\Facades\Http;

class ScheduleService extends UnidriveService
{
    public function store(array $carro, string $date, string $initial_time, string $final_time): void
    {
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

        if ($this->api(true)->post('/agendamento', [
            'carro' => $carro,
            'dt_agendamento' => $carbonDate->format('Y-m-d\TH:m:s.u'),
            'hr_inicial' => $initialTime,
            'hr_final' => $finalTime,
        ])->failed()) {
            throw new \Exception('Agendamento não pode ser realizado!');
        }
    }

    public function delete(int $id): void
    {
        if ($this->api()->delete("/agendamento/deletar/$id")->failed()) {
            throw new \Exception('Agendamento não pode ser apagado!');
        }
    }

    public function scheduleDealership(): array
    {
        $response = $this->api(true)->get('/agendamento/concessionaria');
        if ($response->failed()) {
            throw new \Exception('Erro ao buscar agendamentos da concessionária!');
        }

        return $response->json();
    }

    public function scheduleUser(): array|null
    {
        $response = $this->api(true)->get('/agendamento/usuario');
        if ($response->failed()) {
            throw new \Exception('Erro ao buscar os agendamentos do usuário!');
        }

        return $response->json();
    }
}
