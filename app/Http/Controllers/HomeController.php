<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        if (!Cache::has('carros')) {
            $carrosGetResponse = Http::unidrive()->get('/carro');

            if ($carrosGetResponse->ok()) {
                Cache::add('carros', json_decode($carrosGetResponse->body()));
            }
        }

        $carros = Cache::get('carros', []);

        return view('pages.home.index', compact('carros'));
    }
}
