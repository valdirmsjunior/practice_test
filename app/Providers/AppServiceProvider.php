<?php

namespace App\Providers;

use App\Interfaces\Api\CaminhaoRepositoryInterface;
use App\Interfaces\Api\ModeloRepositoryInterface;
use App\Interfaces\Api\MotoristaRepositoryInterface;
use App\Interfaces\Api\TransportadoraRepositoryInterface;
use App\Repositories\Api\CaminhaoRepository;
use App\Repositories\Api\ModeloRepository;
use App\Repositories\Api\MotoristaRepository;
use App\Repositories\Api\TransportadoraRepository;
use App\Services\Api\CaminhaoService;
use App\Services\Api\ModeloService;
use App\Services\Api\MotoristaService;
use App\Services\Api\TransportadoraService;
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
        $this->app->bind(MotoristaRepositoryInterface::class, MotoristaRepository::class);
        $this->app->bind(MotoristaService::class, function ($app) {
            return new MotoristaService($app->make(MotoristaRepositoryInterface::class));
        });
        $this->app->bind(ModeloRepositoryInterface::class, ModeloRepository::class);
        $this->app->bind(ModeloService::class, function ($app) {
            return new ModeloService($app->make(ModeloRepositoryInterface::class));
        });
        $this->app->bind(CaminhaoRepositoryInterface::class, CaminhaoRepository::class);
        $this->app->bind(CaminhaoService::class, function ($app) {
            return new CaminhaoService($app->make(CaminhaoRepositoryInterface::class));
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
