<?php

namespace App\Services\Unidrive;

use Exception;
use Illuminate\Support\Facades\Http;

class CarService extends UnidriveService
{
    public function store(array $car): void
    {
        $postCarroResponse = $this->api(true)->post('/carro', [
            [
                'ano' => $car['ano'],
                'cor' => $car['cor'],
                'documentacao' => $car['documentacao'],
                'marca' => $car['marca'],
                'modelo' => $car['modelo'],
                'placa' => strtoupper($car['placa']),
                'quilometragem' => $car['quilometragem'],
                'renavam' => $car['renavam'],
                'valor' => $car['valor'],
            ]
        ]);

        if ($postCarroResponse->failed()) {
            throw new \Exception('Erro ao cadastrar o carro!');
        }
    }

    public function delete(int $id): void
    {
        $deleteCarroResponse = $this->api(true)->delete("/carro/$id");

        if ($deleteCarroResponse->failed()) {
            throw new \Exception('Erro ao deletar o carro!');
        }
    }

    public function all(): array
    {
        $carrosGetResponse = $this->api()->get('/carro');

        if ($carrosGetResponse->failed()) {
            throw new \Exception('Erro ao buscar os carros!');
        }

        return $carrosGetResponse->json();
    }

    public function get(int $id): object
    {
        $getCarroResponse = $this->api(true)->get("/carro/$id");

        if ($getCarroResponse->failed()) {
            throw new \Exception('Carro não encontrado!');
        }

        return $getCarroResponse->object();
    }

    public function carsDealership(): array
    {
        $carrosGetResponse = $this->api(true)->get('/concessionaria/carros');

        if ($carrosGetResponse->failed()) {
            throw new \Exception('Erro ao buscar os carros da concessionária!');
        }

        return $carrosGetResponse->json();
    }
}
