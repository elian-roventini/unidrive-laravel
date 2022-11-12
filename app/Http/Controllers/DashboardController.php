<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $getUsuarioResponse = Http::unidrive()->acceptJson()->asJson()->get('/usuario');
        $getCarrosResponse = Http::unidrive()->acceptJson()->asJson()->get('/carro');
        $getAgendamentosResponse = Http::unidrive()->acceptJson()->asJson()->get('/agendamento/usuario');

//        if ($getUsuarioResponse->failed()) {
//            return response()->redirectToRoute('home.index')->with([
//                'error' => 'Não Autorizado'
//            ]);
//        }
        return view('pages.dashboard.index', [
            'usuario' => $getUsuarioResponse->body(),
            'agendamentos' => array_fill(1, 5, [
                'nome' => 'Carlos Maia',
                'telefone' => '(13)98823-9454',
                'email' => 'carlinhos@gmial.com',
                'dt_agendamento' => '14/07/22',
                'modelo' => 'Renault Sandero',
            ]),
            'carros' => array_fill(1, 10, [
                    'image' => 'https://motorshow.com.br/wp-content/uploads/sites/2/2019/07/1_ms430_renault-sandero2-747x420.jpg',
                    'name' => 'Renault Sandero',
                    'price' => 'R$ 61.890',
                    'description' => '2.0 Mpfi Gls 16v 143cv 2wd Flex 4p',
                    'date' => '2017/2017',
                    'place' => 'Santos',
                    'distance' => '29km',
                ]),
        ]);
    }
}
