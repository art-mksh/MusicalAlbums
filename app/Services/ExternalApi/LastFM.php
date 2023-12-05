<?php

namespace App\Services\ExternalApi;

use Illuminate\Support\Facades\Http;
use App\Services\ExternalApi\ExternalApiMusicServiceInterface;


class LastFM implements ExternalApiMusicServiceInterface
{
    protected $config;

    public function __construct(array $config)
    {

        $this->config = $config;
    }


    public function getSuggestedAlbumsByName($albumName)
    {

        $currentFunctionMethod = 'album.search';

        $response = Http::get($this->config['base_url'], [
            'method' => $currentFunctionMethod,
            'api_key' => $this->config['api_key'],
            'album' => $albumName,
            'format' => 'json'
        ]);

        return $response->json();
    }
}
