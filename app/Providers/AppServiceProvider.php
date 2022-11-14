<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Http::macro('unidrive', function ($withAuthorization = false) {
            $url = env('API_URL', 'http://localhost:8080');

            return $withAuthorization
                ? Http::baseUrl($url)->acceptJson()->asJson()
                    ->withHeaders([
                        'Authorization' => session('token')
                    ])
                : Http::baseUrl($url)->acceptJson()->asJson();
        });
    }
}
