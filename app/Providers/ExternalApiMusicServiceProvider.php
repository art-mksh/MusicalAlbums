<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ExternalApiServiceInterface;
use App\Services\LastFM;

class ExternalApiMusicServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
