<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ExternalApi\ExternalApiMusicServiceInterface;
use App\Services\ExternalApi\LastFM;
use Illuminate\Support\Facades\Config;


class AppServiceProvider extends ServiceProvider
{



    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(ExternalApiMusicServiceInterface::class, function ($app) {
            $config = config('musicServicesApi.LastFM');
            return new LastFM($config);
        });

        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
