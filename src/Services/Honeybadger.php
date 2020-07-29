<?php

namespace DevLabor\HoneybadgerTile\Services;

use Illuminate\Support\Facades\Http;

class Honeybadger
{
    public static function getProjects(string $authToken): array
    {
        $url = "https://app.honeybadger.io/v2/projects";

        return Http::withBasicAuth($authToken, '')->get($url)->json();
    }
}
