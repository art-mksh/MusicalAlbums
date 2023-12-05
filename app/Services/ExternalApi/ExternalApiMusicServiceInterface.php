<?php

namespace App\Services\ExternalApi;

interface ExternalApiMusicServiceInterface
{
    public function getSuggestedAlbumsByName($albumName);
}
