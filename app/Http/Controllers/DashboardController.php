<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $getUsuarioResponse = Http::unidrive(true)->get('/usuario');
//        $getCarrosResponse = Http::unidrive(true)->get('/carro');
        $getAgendamentosResponse = Http::unidrive(true)->get('/agendamento/usuario');

        if (
            $getUsuarioResponse->failed() ||
//            $getCarrosResponse->failed() ||
            $getAgendamentosResponse->failed()
        ) {
            return response()->redirectToRoute('home.index')->with([
                'error' => 'Não Autorizado'
            ]);
        }

        return view('pages.dashboard.index', [
            'usuario' => json_decode($getUsuarioResponse->body()),
            'agendamentos' => json_decode($getAgendamentosResponse->body()),
//            'carros' => json_decode($getCarrosResponse->body()),
        ]);
    }
}
