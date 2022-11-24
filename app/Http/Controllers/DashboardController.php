<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    public function index(): Response
    {
        $getUsuarioResponse = Http::unidrive(true)->get('/usuario');
        $getCarrosResponse = Http::unidrive(true)->get('/carro');
        $getConcessionariaResponse = Http::unidrive(true)->get('/concessionaria');
        $getAgendamentosConcessionariaResponse = Http::unidrive(true)->get('/agendamento/concessionaria');
        $getAgendamentosUsuarioResponse = Http::unidrive(true)->get('/agendamento/usuario');

        if ($getUsuarioResponse->failed()) {
            return response()->redirectToRoute('home.index')->with([
                'error' => 'Não Autorizado'
            ]);
        }

        return response()->view('pages.dashboard.index', [
            'usuario' => json_decode($getUsuarioResponse->body()),
            'concessionaria' => json_decode($getConcessionariaResponse->body()),
            'agendamentosConcessionaria' => json_decode($getAgendamentosConcessionariaResponse->body()),
            'agendamentosUsuario' => json_decode($getAgendamentosUsuarioResponse->body()),
            'carros' => $this->paginate(json_decode($getCarrosResponse->body())),
        ]);
    }
}
