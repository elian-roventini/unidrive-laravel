<?php

namespace App\Services\Unidrive;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class UnidriveService
{
    public function __construct(protected string $baseUrl = 'https://api.unidrive.works')
    {
        $this->baseUrl = config('unidrive.api_url');
    }

    public function api(bool $withAuth = false): PendingRequest
    {
        $http = Http::baseUrl($this->baseUrl)->acceptJson()->asJson();

        if (!session()->has('token')) $withAuth = false;

        return $withAuth ? $http->withHeader('Authorization', session('token')) : $http;
    }
}
