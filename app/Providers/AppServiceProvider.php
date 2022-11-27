<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Http::macro('unidrive', function ($withAuthorization = false) {
            $url = config('unidrive.api_url');

            if ($withAuthorization) {
                return Http::baseUrl($url)->acceptJson()->asJson()
                    ->withHeaders([
                        'Authorization' => session('token')
                    ]);
            }

            return Http::baseUrl($url)->acceptJson()->asJson();
        });
    }
}
