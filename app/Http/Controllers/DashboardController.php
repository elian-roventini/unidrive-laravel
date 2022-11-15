<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $getUsuarioResponse = Http::unidrive(true)->get('/usuario');
        $getCarrosResponse = Http::unidrive(true)->get('/carro');
        $getConcessionariaResponse = Http::unidrive(true)->get('/concessionaria');
        $getAgendamentosResponse = Http::unidrive(true)->get('/agendamento/concessionaria');

        if ($getUsuarioResponse->failed()) {
            return response()->redirectToRoute('home.index')->with([
                'error' => 'Não Autorizado'
            ]);
        }

        return view('pages.dashboard.index', [
            'usuario' => json_decode($getUsuarioResponse->body()),
            'concessionaria' => json_decode($getConcessionariaResponse->body()),
            'agendamentos' => json_decode($getAgendamentosResponse->body()),
            'carros' => json_decode($getCarrosResponse->body()),
        ]);
    }
}
