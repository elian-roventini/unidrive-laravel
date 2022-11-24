<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        $carrosGetResponse = Http::unidrive()->get('/carro');

        if ($carrosGetResponse->ok()) {
            $carros = json_decode($carrosGetResponse->body());
        }

        return response()->view('pages.home.index', [
            'carros' => $this->paginate($carros ?? [])
        ]);
    }
}
