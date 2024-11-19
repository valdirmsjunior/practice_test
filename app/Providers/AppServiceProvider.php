<?php

namespace App\Providers;

use App\Interfaces\API\TransportadoraRepositoryInterface;
use App\Repositories\API\TransportadoraRepository;
use App\Services\API\TransportadoraService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TransportadoraRepositoryInterface::class, TransportadoraRepository::class);
        $this->app->bind(TransportadoraService::class, function ($app) {
            return new TransportadoraService($app->make(TransportadoraRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
