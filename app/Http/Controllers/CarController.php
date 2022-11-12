<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CarController extends Controller
{
    public function index()
    {
        $cars = array_fill(1, 3, [
            'image' => 'https://motorshow.com.br/wp-content/uploads/sites/2/2019/07/1_ms430_renault-sandero2-747x420.jpg',
            'name' => 'Renault Sandero',
            'price' => 'R$ 61.890',
            'description' => '2.0 Mpfi Gls 16v 143cv 2wd Flex 4p',
            'date' => '2017/2017',
            'place' => 'Santos',
            'distance' => '29km',
        ]);

        return view('pages.car.index', compact('cars'));
    }

    public function show()
    {
        $car = [
            'image' => 'https://motorshow.com.br/wp-content/uploads/sites/2/2019/07/1_ms430_renault-sandero2-747x420.jpg',
            'name' => 'Renault Sandero',
            'price' => 'R$ 61.890',
            'description' => '2.0 Mpfi Gls 16v 143cv 2wd Flex 4p',
            'date' => '2017/2017',
            'place' => 'Santos',
            'distance' => '29km',
        ];
        $cars = array_fill(1, 2, [
            'image' => 'https://motorshow.com.br/wp-content/uploads/sites/2/2019/07/1_ms430_renault-sandero2-747x420.jpg',
            'name' => 'Renault Sandero',
            'price' => 'R$ 61.890',
            'description' => '2.0 Mpfi Gls 16v 143cv 2wd Flex 4p',
            'date' => '2017/2017',
            'place' => 'Santos',
            'distance' => '29km',
        ]);

        return view('pages.car.show', compact('car', 'cars'));
    }

    public function store(CarPostRequest $request)
    {
        $carro = [
            'ano' => $request->ano ?? '',
            'cor' => $request->cor ?? '',
            "marca" => $request->marca ?? '',
            "modelo" => $request->modelo ?? '',
            'documentacao' => $request->documentacao ?? '',
            "placa" => $request->placa ?? '',
            "quilometragem" => $request->quilometragem ?? '',
            "renovam" => $request->renavam ?? '',
        ];
        $postCarroResponse = Http::unidrive()->acceptJson()->asJson()->post('/agendamento', $carro);

        if ($postCarroResponse->failed()) {
            return back()
                ->with([
                    'error' => 'Carro não pode ser cadastrado!'
                ])
                ->withInput($request->safe()->except(['password']));
        }

        return back()->with([
            'success' => 'Carro cadastrado!'
        ]);
    }
}
