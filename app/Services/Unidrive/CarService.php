<?php

namespace App\Services\Unidrive;

use Exception;
use Illuminate\Support\Facades\Http;

class CarService
{
    public function register(array $car): bool
    {
        try {
            $postCarroResponse = Http::unidrive(true)->post('/carro', [
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
                return false;
            }

            return true;
        }catch (Exception) {
            return false;
        }
    }

    public function delete(int $id): bool
    {
        try {
            $deleteCarroResponse = Http::unidrive(true)->delete("/carro/$id");

            if ($deleteCarroResponse->failed()) {
                return false;
            }

            return true;
        } catch (Exception) {
            return false;
        }
    }

    public function getCars(): array|null
    {
        try {
            $carrosGetResponse = Http::unidrive()->get('/carro');

            if ($carrosGetResponse->failed()) {
                return null;
            }

            return json_decode($carrosGetResponse->body(), false, 512, JSON_THROW_ON_ERROR);
        } catch (Exception) {
            return null;
        }
    }

    public function getCar(int $id): object|null
    {
        try {
            $getCarroResponse = Http::unidrive(true)->get("/carro/$id");

            if ($getCarroResponse->failed()) {
                return null;
            }

            return json_decode($getCarroResponse->body(), false, 512, JSON_THROW_ON_ERROR);
        } catch (Exception) {
            return null;
        }
    }

    public function getCarsDealership()
    {
        try {
            $carrosGetResponse = Http::unidrive(true)->get('/concessionaria/carros');

            if ($carrosGetResponse->failed()) {
                return null;
            }

            return json_decode($carrosGetResponse->body(), false, 512, JSON_THROW_ON_ERROR);
        } catch (Exception) {
            return null;
        }
    }
}
