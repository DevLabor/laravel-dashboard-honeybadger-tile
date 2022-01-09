<?php

namespace DevLabor\HoneybadgerTile\Services;

use Illuminate\Support\Facades\Http;

class Honeybadger
{
    /**
     * Endpoint of Honeybadger data API
     * @var string
     */
    public static $baseUrl = 'https://app.honeybadger.io/v2/';

    /**
     * @param string $authToken
     *
     * @return array
     */
    public static function getProjects(string $authToken): array
    {
        $url = self::$baseUrl . "projects";

        return Http::withBasicAuth($authToken, '')->get($url)->json();
    }
}
