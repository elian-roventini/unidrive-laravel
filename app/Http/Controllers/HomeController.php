<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $carrosGetResponse = Http::unidrive()->get('/carro');

        if ($carrosGetResponse->ok()) {
            $carros = json_decode($carrosGetResponse->body());
        }

        return view('pages.home.index', [
            'carros' => $carros ?? []
        ]);
    }
}
