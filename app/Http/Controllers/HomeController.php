<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $cars = array_fill(1, 10, [
            'image' => 'https://motorshow.com.br/wp-content/uploads/sites/2/2019/07/1_ms430_renault-sandero2-747x420.jpg',
            'name' => 'Renault Sandero',
            'price' => 'R$ 61.890',
            'description' => '2.0 Mpfi Gls 16v 143cv 2wd Flex 4p',
            'date' => '2017/2017',
            'place' => 'Santos',
            'distance' => '29km',
        ]);

        return view('pages.home.index', compact('cars'));
    }
}